<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SectorIndustry;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\UserCommittee;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();
         $sector = DB::table('sector_industries')
            ->select('sector')
            ->groupBy('sector')->where('sector','!=','')
            ->pluck('sector');
            $industry = DB::table('sector_industries')
            ->select('industry')
            ->groupBy('industry')->where('industry','!=','')
            ->pluck('industry');
        if($user->hasRole('Director') && !$user->profile){
            return view('profile.director_profile', compact('sector','industry'));
        }
        else if($user->hasRole('Company') && !$user->profile){
            return view('profile.company_profile', compact('sector','industry'));
            return 'Company';
        }
       
        if(\Auth::user()->hasRole(['DataEntry'])){
        return view('company.index');
        }
        return view('home',compact('sector'));
    }
    public function create_director_profile(Request $request)
    {
        // return $request;
        $user=Auth::user();
        $input=$request->all();
        $input['user_id']=$user->id;
        Profile::create($input);
         $user->name=$request->name;
        $user->save();
        return redirect()->route('home');

    }
    public function create_company_profile(Request $request)
    {
        $input=$request->all();
        $user=Auth::user();
        $input['user_id']=$user->id;
        Profile::create($input);
         $user->name=$request->name;
        $user->save();
        if(count($request->committee) > 0){
             $committees=$request->committee;
            foreach ($committees as $key => $committee) {
                $committee['map']=json_encode($committee['map']);
                $committee['user_id']=$user->id;
                 UserCommittee::create($committee);
            }
        }
        return redirect()->route('home');

    }
    public function edit_profile($id)
    {
        $user=User::with('committees','profile')->find($id);
         $sector = DB::table('sector_industries')
            ->select('sector')
            ->groupBy('sector')->where('sector','!=','')
            ->pluck('sector');
            $industry = DB::table('sector_industries')
            ->select('industry')
            ->groupBy('industry')->where('industry','!=','')
            ->pluck('industry');
        if($user->hasRole('Director') && $user->profile){

            return view('profile.edit_director_profile', compact('sector','industry','user'));
        }
        else if($user->hasRole('Company') && $user->profile){
            return view('profile.edit_company_profile', compact('sector','industry','user'));
        }
    }
    public function edit_company_profile(Request $request)
    {
       $input=$request->all();
        $user=Auth::user();
        Profile::where('user_id',$user->id)->first()->update($input);
        $user->name=$request->name;
        $user->save();
        UserCommittee::where('user_id',$user->id)->delete();    
        if(count($request->committee) > 0){
             $committees=$request->committee;
            foreach ($committees as $key => $committee) {
                $committee['map']=json_encode($committee['map']);
                $committee['user_id']=$user->id;
                 UserCommittee::create($committee);
            }
        }
        return redirect()->route('home');

    }
}
