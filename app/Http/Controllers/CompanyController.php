<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyReference;
use App\Models\CompanyFinancial;
use App\Models\Committee;
use App\Models\Director;
use App\Models\CompanyDirector;
use Yajra\Datatables\Datatables;
use App\Models\CommitteeComposition;
use App\Models\OtherMembership;
use \Carbon\Carbon;
class CompanyController extends Controller
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
        return view('company.index');
    }
    public function create()
    {
    	$company_reference=CompanyReference::all();
        return view('company.create',compact('company_reference'));
    }
    public function store(Request $request)
    {
        // return $request;   
        $financial=$request->financial;
    	$committee=[];
		$input=$request->all();
		$reference=CompanyReference::find($request->name);
		$input['name']=$reference->name;
		$input['code']=$reference->code;
        $input['industry']=$reference->industry;
        $input['sector']=$reference->sector;
        $input['index']=$reference->ASX_code;
         $input['dir_fee_pool_updated']=(isset($input['dir_fee_pool_updated']) ? Carbon::parse($input['dir_fee_pool_updated'])->format('Y-m-d') : NULL);

    	$company=Company::create($input);
    	 $financial['company_id']=$company->id;
        CompanyFinancial::insert($financial);
         if($request->director_company)
        {
            $temp=[];
            $record=[];
            foreach ($request->director_company as $key => $value) {
                // return $value;
            $director=Director::create($request->director[$key]);
            $temp['company_name']=$company->name;
            $temp['company_id']=$company->id;
            $temp['director_name']=$director->name;
            $temp['director_id']=$director->id;
            $temp['ned_type']=(isset($value['ned_type']) ? $value['ned_type'] : NULL);
            $temp['independent_type']=(isset($value['independent_type']) ? $value['independent_type'] : NULL);
            $temp['status']=(isset($value['status']) ? $value['status'] : NULL);
            $temp['board']=(isset($value['board']) ? $value['board'] : NULL);
            $temp['joining_date']=(isset($value['joining_date']) ? Carbon::parse($value['joining_date'])->format('Y-m-d') : NULL);
            $temp['leaving_date']=(isset($value['leaving_date']) ? Carbon::parse($value['leaving_date'])->format('Y-m-d') : NULL);
            $temp['director_fee']=(isset($value['director_fee']) ? $value['director_fee'] : NULL);
            $temp['superannuation']=(isset($value['superannuation']) ? $value['superannuation'] : NULL);
            $temp['other_fee']=(isset($value['other_fee']) ? $value['other_fee'] : NULL);
            $temp['vested_share']=(isset($value['vested_share']) ? $value['vested_share'] : NULL);
            $temp['unvested_share']=(isset($value['unvested_share']) ? $value['unvested_share'] : NULL);
            $temp['committee_fee']=(isset($value['committee_fee']) ? $value['committee_fee'] : NULL);
            $temp['total_fee']=(isset($value['total_fee']) ? $value['total_fee'] : NULL);
            array_push($record,$temp);
        }
            CompanyDirector::insert($record);
        }
         if($request->committee)
        {
            $temp=[];
            foreach ($request->committee as $key => $value) {
            $temp['name']=$value['name'];
            $temp['company_name']=$company->name;
            $temp['company_id']=$company->id;
            $temp['chair_fee']=$value['chair_fee'];
            $temp['member_fee']=$value['member_fee'];
            $temp['no_of_meetings']=$value['no_of_meetings'];
            $temp['created_at']=\Carbon\Carbon::now();
            $temp['updated_at']=\Carbon\Carbon::now();
            array_push($committee,$temp);
        }
            Committee::insert($committee);
        }   
        
        return redirect()->route('create_composition' , $company->id);
    }
    public function ajax_index(){
        $companies=Company::select('*');
        return Datatables::of($companies)->addColumn('action', function ($row) {
               return $temp='<a href="edit_company/'.$row->id.'" class="btn btn-primary"><i class="fas fa-edit"></i></a><a href="view_company/'.$row->id.'" class="btn btn-success"><i class="fas fa-eye"></i></a>';
               // <a href="delete_company/'.$row->id.'" class="btn btn-danger"><i class="fas fa-trash"></i></a>
        })
        ->escapeColumns([])->make(true);

    }   
    public function edit($id){
    $company=Company::with('committee','financial','company_director.director')->find($id);
        $company_reference=CompanyReference::all();
        return view('company.edit',compact('company_reference','company')); 
    }
    public function update(Request $request, $id){
            $committee=[];
        $input=$request->all();
       $reference=CompanyReference::find($request->name);
        $input['name']=$reference->name;
        $input['code']=$reference->code;
        $input['industry']=$reference->industry;
        $input['sector']=$reference->sector;
        $input['index']=$reference->ASX_code;
         $input['dir_fee_pool_updated']=(isset($input['dir_fee_pool_updated']) ? Carbon::parse($input['dir_fee_pool_updated'])->format('Y-m-d') : NULL);
        $company=Company::find($id);
        $company->update($input);
        CompanyFinancial::where('company_id',$id)->update($request->financial);

        // Director::whereIn('id',CompanyDirector::where('company_id',$id)->pluck('director_id'))->delete();
        //     CompanyDirector::where('company_id',$id)->delete();
        //  if($request->director_company)
        // {
            
        //     $temp=[];
        //     $record=[];
        //     foreach ($request->director_company as $key => $value) {
        //     $director=Director::create($request->director[$key]);
        //     $temp['company_name']=$company->name;
        //     $temp['company_id']=$company->id;
        //     $temp['director_name']=$director->name;
        //     $temp['director_id']=$director->id;
        //     $temp['ned_type']=(isset($value['ned_type']) ? $value['ned_type'] : NULL);
        //     $temp['independent_type']=(isset($value['independent_type']) ? $value['independent_type'] : NULL);
        //     $temp['status']=(isset($value['status']) ? $value['status'] : NULL);
        //     $temp['board']=(isset($value['board']) ? $value['board'] : NULL);
        //     $temp['joining_date']=(isset($value['joining_date']) ? Carbon::parse($value['joining_date'])->format('Y-m-d') : NULL);
        //     $temp['leaving_date']=(isset($value['leaving_date']) ? Carbon::parse($value['leaving_date'])->format('Y-m-d') : NULL);
        //     $temp['director_fee']=(isset($value['director_fee']) ? $value['director_fee'] : NULL);
        //     $temp['superannuation']=(isset($value['superannuation']) ? $value['superannuation'] : NULL);
        //     $temp['other_fee']=(isset($value['other_fee']) ? $value['other_fee'] : NULL);
        //     $temp['vested_share']=(isset($value['vested_share']) ? $value['vested_share'] : NULL);
        //     $temp['unvested_share']=(isset($value['unvested_share']) ? $value['unvested_share'] : NULL);
        //     $temp['committee_fee']=(isset($value['committee_fee']) ? $value['committee_fee'] : NULL);
        //     $temp['total_fee']=(isset($value['total_fee']) ? $value['total_fee'] : NULL);
        //     array_push($record,$temp);
        // }
        //     CompanyDirector::insert($record);
        // }
        //     Committee::where('company_id',$id)->delete();

        // if($request->committee)
        // {
        //     $temp=[];
        //     foreach ($request->committee as $key => $value) {
        //     $temp['name']=$value;
        //     $temp['company_name']=$request->name;
        //     $temp['company_id']=$company->id;
        //     $temp['created_at']=\Carbon\Carbon::now();
        //     $temp['updated_at']=\Carbon\Carbon::now();
        //     array_push($committee,$temp);
        // }
        //     Committee::insert($committee);
        // }
        return redirect()->route('view_company',['id'=>$id]);


        $company=Company::with('committee')->find($id);
        $company_reference=CompanyReference::all();
        return view('company.edit',compact('company_reference','company')); 
    }
    public function view($id){
          $company=Company::with('committee','financial','company_director.director')->find($id);

            $composition_chairman=CommitteeComposition::where('company_id',$id)->where('type','Chairman')->get();
         $composition_member=CommitteeComposition::where('company_id',$id)->where('type','Member')->get(['director_id','committee_id']);
        $other_membership=OtherMembership::whereIn('director_id',CompanyDirector::where('company_id',$id)->pluck('director_id'))->get();
        $arr_committee=Committee::where('company_id',$id)->pluck('id');
        $committees=Committee::where('company_id',$id)->get();
          $companies= CompanyDirector::where('company_id',$id)->with('director')->with('committee')->get();
        return view('company.view',compact('company','composition_chairman','composition_member','other_membership','arr_committee','committees','companies')); 
    }
    public function delete($id){
        $company=Company::with('committee')->find($id);
        Committee::where('company_id',$id)->delete();
        $company->delete();
        return redirect()->back();
    }
    public function store_director(Request $request)
    {
         if($request->director_company)
        {
            
            $temp=[];
            $record=[];
            foreach ($request->director_company as $key => $value) {
            $director=Director::create($request->director[$key]);
            $temp['company_name']=$request->company_name;
            $temp['company_id']=$request->company_id;
            $temp['director_name']=$director->name;
            $temp['director_id']=$director->id;
            $temp['ned_type']=(isset($value['ned_type']) ? $value['ned_type'] : NULL);
            $temp['independent_type']=(isset($value['independent_type']) ? $value['independent_type'] : NULL);
            $temp['status']=(isset($value['status']) ? $value['status'] : NULL);
            $temp['board']=(isset($value['board']) ? $value['board'] : NULL);
            $temp['joining_date']=(isset($value['joining_date']) ? Carbon::parse($value['joining_date'])->format('Y-m-d') : NULL);
            $temp['leaving_date']=(isset($value['leaving_date']) ? Carbon::parse($value['leaving_date'])->format('Y-m-d') : NULL);
            $temp['director_fee']=(isset($value['director_fee']) ? $value['director_fee'] : NULL);
            $temp['superannuation']=(isset($value['superannuation']) ? $value['superannuation'] : NULL);
            $temp['other_fee']=(isset($value['other_fee']) ? $value['other_fee'] : NULL);
            $temp['vested_share']=(isset($value['vested_share']) ? $value['vested_share'] : NULL);
            $temp['unvested_share']=(isset($value['unvested_share']) ? $value['unvested_share'] : NULL);
            $temp['committee_fee']=(isset($value['committee_fee']) ? $value['committee_fee'] : NULL);
            $temp['total_fee']=(isset($value['total_fee']) ? $value['total_fee'] : NULL);
            array_push($record,$temp);
        }
            CompanyDirector::insert($record);
        }
        return redirect()->back();
    }
    public function update_director(Request $request, $id)
    {
        $temp=explode('-',  $id);
        $director_id=$temp[1];
        $director_company_id=$temp[0];
         foreach ($request->director as $key => $value) {
        Director::find($director_id)->update($value);
         }
         foreach ($request->director_company as $key => $value) {

        
         $value['joining_date']=(isset($value['joining_date']) ? Carbon::parse($value['joining_date'])->format('Y-m-d') : NULL);
            $value['leaving_date']=(isset($value['leaving_date']) ? Carbon::parse($value['leaving_date'])->format('Y-m-d') : NULL);

        CompanyDirector::find($director_company_id)->update($value);
    }
        return redirect()->back();
    }
     public function delete_director( $id)
    {
        $temp=explode('-',  $id);
        $director_id=$temp[1];
        $director_company_id=$temp[0];
        Director::find($director_id)->delete();
        // CompanyDirector::find($director_company_id)->delete();
        return redirect()->back();
    }
    public function store_committee(Request $request)
    {
        // return $request;
         if($request->committee)
        {
            $committee=[];
            $temp=[];
            foreach ($request->committee as $key => $value) {
            $temp['name']=$value['name'];
            $temp['company_name']=$request->company_name;
            $temp['company_id']=$request->company_id;
            $temp['chair_fee']=$value['chair_fee'];
            $temp['member_fee']=$value['member_fee'];
            $temp['no_of_meetings']=$value['no_of_meetings'];
            array_push($committee,$temp);
        }
            Committee::insert($committee);
        }
        return redirect()->back();
    }
    public function update_committee(Request $request, $id)
    {
        // return $request;

         foreach ($request->committee as $key => $value) {
        Committee::find($id)->update(['name'=>$value['name'],'chair_fee'=>$value['chair_fee'],'member_fee'=>$value['member_fee'],'no_of_meetings'=>$value['no_of_meetings'] ]);
         }
        return redirect()->back();
    }
     public function delete_committee( $id)
    {
        Committee::find($id)->delete();
        // CompanyDirector::find($director_company_id)->delete();
        return redirect()->back();
    }
     public function create_composition($id)
    {
        // return $id;
        $committees=Committee::where('company_id',$id)->get();
        $companies= CompanyDirector::where('company_id',$id)->with('director')->with('committee')->get();
        // $director=
        return view('company.composition',compact('companies','committees'));
    }
     public function store_composition(Request $request)
    {

        // return $request;
             OtherMembership::whereIn('director_id',CompanyDirector::where('company_id',$request->company_id)->pluck('director_id'))->delete();
        CommitteeComposition::where('company_id', $request->company_id)->delete();

        if($request->other){
            $directors=[];
            foreach ($request->other as $key => $value) {

                array_push($directors, $value['director_id']);
            }
            OtherMembership::insert($request->other);
           
        }
       if($request->chairman){

        foreach ($request->chairman as $key => $chairman) {
            $committee=Committee::find($key);
            $director=Director::find($chairman);
            $input['name']=$committee->name;
            $input['company_name']=$committee->company_name;
            $input['company_id']=$committee->company_id;
            $input['committee_id']=$key;
            $input['director_id']=$director->id;
            $input['director_name']=$director->name;
            $input['type']='Chairman';
            CommitteeComposition::create($input);
        }

        
         foreach ($request->member as $key => $member) {
            $committee=Committee::find($key);
            foreach ($member as $value) {
            $director=Director::find($value);
            $input['name']=$committee->name;
            $input['company_name']=$committee->company_name;
            $input['company_id']=$committee->company_id;
            $input['committee_id']=$key;
            $input['director_id']=$director->id;
            $input['director_name']=$director->name;
            $input['type']='Member';
            CommitteeComposition::create($input);
            }
            
        }
        }
        return redirect()->back();



    }
     public function edit_composition($id)
    {
        // return $id;

         $composition_chairman=CommitteeComposition::where('company_id',$id)->where('type','Chairman')->get();
         $composition_member=CommitteeComposition::where('company_id',$id)->where('type','Member')->get(['director_id','committee_id']);
        $other_membership=OtherMembership::whereIn('director_id',CompanyDirector::where('company_id',$id)->pluck('director_id'))->get();
        $committees=Committee::where('company_id',$id)->get();
        $arr_committee=Committee::where('company_id',$id)->pluck('id');
        $companies= CompanyDirector::where('company_id',$id)->with('director')->with('committee')->get();
        // $director=
        return view('company.edit_composition',compact('companies','committees','composition_chairman','composition_member','other_membership','arr_committee','id'));
    }
    
    
}
