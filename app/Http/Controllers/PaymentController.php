<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use App\Models\Payment;
use App\Models\Profile;
use Carbon\Carbon;
class PaymentController extends Controller
{
     public function packages()
    {
            return view('packages');
    }
    public function payment(Request $request)
    {
    	 $package=$request->package;

            return view('stripe',compact('package'));
    }
     public function stripePost(Request $request)
    {
       
       // return $request;
    	$user=Auth::user();
       $strip_sk=config('stripe.sk');
    	switch ($request->membership) {
    			case '99':

                    if(Auth::user()->hasRole('Director')){
                        $amount=200;
                    }
                    else if(Auth::user()->hasRole('Company')){
                        $amount=3000;
                    }
    				$membership_type=99;
    				$membership_time=Carbon::now()->addDays(30)->toDateString();
    				break;
    			
    				break;
    				case '6':
                     if(Auth::user()->hasRole('Director')){
                        $amount=400;
                    }
                    else if(Auth::user()->hasRole('Company')){
                        $amount=6000;
                    }
    				$membership_type=6;
    				$membership_time=Carbon::now()->addDays(183)->toDateString();
    				break;
    				case '12':
                     if(Auth::user()->hasRole('Director')){
                        $amount=600;
                    }
                    else if(Auth::user()->hasRole('Company')){
                        $amount=15000;
                    }
    				$membership_type=12;
    				$membership_time=Carbon::now()->addDays(365)->toDateString();
    				break;
    		}	
    	$description=$user->name.'('.$user->email.') paid $'.$amount.'.';
        Stripe\Stripe::setApiKey($strip_sk);
        Stripe\Charge::create ([
                "amount" => $amount *100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => $description 
        ]);
        Payment::create(['user_id'=>$user->id,'description'=>$description,'amount'=>$amount *100]);
        Profile::where('user_id',Auth::user()->id)->update(['membership_type'=>$membership_type, 'membership_time'=>$membership_time]);

         // UserInfo::where('user_id',Auth::id())->update(['membership'=>'0']);
  		
        return redirect('/');
    }
     public function close_browser()
    {
            return view('close_browser');

    }
}
