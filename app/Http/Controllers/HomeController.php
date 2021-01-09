<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SectorIndustry;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\UserCommittee;
use App\Models\Attachment;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
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
       
        if($user->hasRole(['DataEntry'])){
        return view('company.index');
        }
        if($user->hasRole(['Administrator'])){
             $partial_director=User::whereHas('roles', function ($query) {
    $query->where('name', 'Director');
        })->doesntHave('profile')->count();
         $complete_director=User::whereHas('roles', function ($query) {
    $query->where('name', 'Director');
        })->has('profile')->count();
         
          $partial_company=User::whereHas('roles', function ($query) {
             $query->where('name', 'Company');
        })->doesntHave('profile')->count();
           $complete_company=User::whereHas('roles', function ($query) {
             $query->where('name', 'Company');
        })->has('profile')->count();
        return view('dashboard',compact('sector','partial_director','complete_director','partial_company','complete_company'));
        }
        else{
        return view('home',compact('sector'));

        }
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
        $company=User::find($request->id);
        Profile::where('user_id',$request->id)->first()->update($input);
        $company->name=$request->name;
        $company->save();
        UserCommittee::where('user_id',$request->id)->delete();    
        if(count($request->committee) > 0){
             $committees=$request->committee;
            foreach ($committees as $key => $committee) {
                $committee['map']=json_encode($committee['map']);
                $committee['user_id']=$request->id;
                 UserCommittee::create($committee);
            }
        }
        if($user->hasRole('Company')){
        
        return redirect()->route('home');
        }
        else if($user->hasRole('Administrator')){
        
        return redirect()->route('companies');
        }

    }
    public function edit_director_profile(Request $request)
    {
       $input=$request->all();
        $user=Auth::user();

        $director=User::find($request->id);

        Profile::where('user_id',$request->id)->first()->update($input);
        $director->name=$request->name;
        $director->save();
        if($user->hasRole('Director')){
        
        return redirect()->route('home');
        }
        else if($user->hasRole('Administrator')){
        
        return redirect()->route('directors');
        }

    }
     public function reports()
    {
            return view('reports');

    }   
    public function ajax_reports(){
        $user=Auth::user();
         $reports=Attachment::where('user_id',$user->id);
        return Datatables::of($reports)->addColumn('view', function ($row) use($user){
               return '<a class="btn btn-success" href="./storage/app/public/'.$row->path.'" target="_blank">View</a>';
        })->addColumn('generated_on', function ($row) use($user){
            return Carbon::parse($row->created_at)->format('d-m-Y h:i:s');
        })
        ->escapeColumns([])->make(true);

    } 
}
