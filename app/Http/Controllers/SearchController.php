<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;
use App\Models\CompanyDirector;
use App\Models\CommitteeComposition;
use App\Models\Committee;
use App\Models\OtherMembership;
use App\Models\Company;
use App\Models\SectorIndustry;
use App\Models\CommitteeReference;
use DB;
use App\Models\User;
use App\Models\UserCommittee;
use Illuminate\Support\Facades\Auth;


class SearchController extends Controller
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
    public function search_director()
    {
    	$directors=Director::all(['id','name']);
        return view('search.director.search',compact('directors'));
    }
    public function result_director(Request $request)
    {
    	$directors=CompanyDirector::where('director_name',$request->director_name)->with('director_committee.committee','other_membership')->get();
        return view('search.director.index',compact('directors'));
    }
    public function view_director($id)
    {
        $director=CompanyDirector::with('director_committee.committee','other_membership','director')->find($id);
        return view('search.director.view',compact('director'));

    }
    public function search_company()
    {
    	$companies=Company::all(['id','name']);
        return view('search.company.search',compact('companies'));
    }
    public function result_company(Request $request)
    {
 			 $company=Company::with('committee','financial','company_director.director')->find( $request->company_id);
       $directors=Director::whereHas('committee_composition', function ( $query) use($request) {
    $query->where('company_id', '=', $request->company_id);
})->with('committee_composition.committee')->get();
        $committees=Committee::where('company_id',$request->company_id)->get();

       foreach ($directors as $key => $director) {
          // return $director;
          $director_committee[$key]['name']=$director->name;
          // return count($committees);  
          foreach ($committees as $key2 => $committee) {
              // return $committee;
                // return $director->committee_composition;
              foreach ($director->committee_composition as $key3 => $committee_composition) {
                // return $committee_composition;
                if($committee_composition->committee_id == $committee->id && $committee_composition->director_id == $director->id){
                // return $committee_composition;
                  $director_committee[$key][$committee_composition->committee->name]=$committee_composition->type;
                }
              }

           } 

       }
        // $composition=CommitteeComposition::where('company_id',$request->company_id)->get();
            // $composition_chairman=CommitteeComposition::where('company_id',$request->company_id)->where('type','Chairman')->get();
         // $composition_member=CommitteeComposition::where('company_id',$request->company_id)->where('type','Member')->get(['director_id','committee_id']);
        // $other_membership=OtherMembership::whereIn('director_id',CompanyDirector::where('company_id',$request->company_id)->pluck('director_id'))->get();
        // $arr_committee=Committee::where('company_id',$request->company_id)->pluck('id');
       // return count($committees);
          // $companies= CompanyDirector::where('company_id',$request->company_id)->with('director')->with('committee')->get();
          // return $company->company_director;
        return view('search.company.view',compact('company','committees','directors','director_committee')); 
    }

    public function search_sector()
    {
        $sector_industry=SectorIndustry::select('sector')->distinct()->get();
        return view('search.sector.search',compact('sector_industry'));
    }
    public function search_industry(Request $request)
    {

       return $sector_industry=SectorIndustry::select('industry')->distinct()->where('sector',$request->sector)->where('industry', '!=' ,'')->pluck('industry');
    }
     public function result_sector(Request $request)
    {
        // return $request;
              $companies=Company::where('sector',$request->sector)->where('industry',$request->industry)->get();
        return view('search.sector.index',compact('companies'));

    }
    public function search_custom()
    {
        $sector_industry=SectorIndustry::select('sector')->distinct()->get();
        return view('search.custom.search',compact('sector_industry'));
    }
    public function result_custom(Request $request)
    {
      // return $request;
        return $user=User::with('profile')->find(Auth::user()->id);
         $companies=Company::select('id');
        if($request->sector){
          $companies=$companies->where('sector',$request->sector);
        }
        if($request->industry){
          $companies=$companies->where('industry',$request->industry);
        }
        if($request->index){
          $companies=$companies->whereHas('reference', function ($query) use($request) {
          switch ($request->index) {
            case 'ASX-50':
              $query=$query->where('ASX50','Y');
              break;
            case 'ASX-100':
              $query=$query->where('ASX100','Y');
              break;
              case 'ASX-200':
              $query=$query->where('ASX200','Y');
              break;
              case 'ASX-300':
              $query=$query->where('ASX300','Y');
              break;
          }
    return $query;
          });
        }
        if($request->range != '0;0' || $request->range_mar_cap != '0;0'){
          $range=$request->range;
          $range_mar_cap=$request->range_mar_cap;
            $companies=$companies->whereHas('financial', function ($query) use($range,$user,$range_mar_cap) {
              if($range != '0;0'){
                  $range=explode(';', $range);
                  $min_range=($range[0]/100) * $user->profile->sale_revenue;
                  $max_range=($range[1]/100) * $user->profile->sale_revenue;

                  $query= $query->where('sale_revenue', '>=', $min_range)->where('sale_revenue', '<=', $max_range);
              }
              if($range_mar_cap != '0;0'){
                  $range=explode(';', $range_mar_cap);
                  $min_range=($range[0]/100) * $user->profile->market_cap;
                  $max_range=($range[1]/100) * $user->profile->market_cap;
                  $query= $query->where('market_cap', '>=', $min_range)->where('market_cap', '<=', $max_range);
              }
              return $query;
          });
        }

         $companies= $companies->pluck('id')->toArray();
         $count_companies=count($companies);
         // return count($companies);
      $company= Company::select('id','name','index','sector','industry')->with('financial')->get();
      $tempcompany= [];
      foreach ($company as $key =>$value) {
        $tempcompany[$key]['id']=$value->id;
        $tempcompany[$key]['name']=$value->name;
        $tempcompany[$key]['index']=$value->index;
        $tempcompany[$key]['sector']=$value->sector;
        $tempcompany[$key]['industry']=$value->industry;
        $tempcompany[$key]['revenue']=$value->financial->sale_revenue;
        $tempcompany[$key]['market_cap']=$value->financial->market_cap;
        // return $value->id;
        // return gettype($companies->);
        if(in_array($value->id, $companies)){
        $tempcompany[$key]['action']=1;
          // $value->put('action', 1);
        }
        else{
        $tempcompany[$key]['action']=0;
        }
      }
      $companies=$tempcompany;
        return view('search.custom.index',compact('companies','count_companies'));

      return $tempcompany;
     
    }
    public function result_sector_final(Request $request)
    {
         // $committee_ref=CommitteeReference::all();
     $user_committee= UserCommittee::where('user_id',Auth::user()->id)->get();
    $committee_ref=[];
    foreach ($user_committee as $key => $committee) {
     $comb_com[$committee->name]=[];

      $arr= explode(',', preg_replace('/[^a-zA-Z,]/', '', $committee->map)) ;
      foreach ($arr as $key => $value) {
        array_push($comb_com[$committee->name],$value);
        array_push($committee_ref,$value);
      }
    }
    $committee_ref=CommitteeReference::whereIn('code',$committee_ref)->get();
     // $comb_com['Compliance Committee']=['ARC','AUC','AUD'];
     $company= Company::whereIn('id',$request->company_id)->with('financial','committee.composition')->get(['id','no_of_employees']);
     $market_cap=[];
     $revenue=[];
     $basic_eps=[];
     $no_of_employees=[];
    $chair_fee=[];
    $member_fee=[];
    $no_of_meetings=[];
    $no_of_directors=[];
    $comb_chair_fee=[];
    $comb_member_fee=[];
    $comb_no_of_meetings=[];
    $comb_no_of_directors=[];
     $committee_names=[];
     $comb_committee_names=[];
     // return $company[0]->committee;
     // for market_cap and others
     foreach ($company as $key => $value) {
     $value->financial->preventAttrSet = true;
     $value->preventAttrSet = true;
     $market_cap[$key]=$value->financial->market_cap;
     $revenue[$key]=$value->financial->sale_revenue;
     $basic_eps[$key]=$value->financial->basic_eps;
     $no_of_employees[$key]=$value->no_of_employees;
     // return $value->committee;
     foreach ($value->committee as $key2 => $committee) {
     $committee->preventAttrSet = true;
     foreach ($committee_ref as $key3 => $ref) {
       if($committee->map == $ref->code){
        if(!isset($chair_fee[$ref->code])){
          $chair_fee[$ref->code]=[];
        }
        if(!isset($member_fee[$ref->code])){
          $member_fee[$ref->code]=[];
        }
        if(!isset($no_of_meetings[$ref->code])){
          $no_of_meetings[$ref->code]=[];
        }
        if(!isset($no_of_directors[$ref->code])){
          $no_of_directors[$ref->code]=[];
        }
        if($committee->chair_fee != 0 && $committee->chair_fee != Null){
        array_push($chair_fee[$ref->code], $committee->chair_fee);
        }
        if($committee->member_fee != 0 && $committee->member_fee != Null){

        array_push($member_fee[$ref->code], $committee->member_fee);
        }
          
        array_push($no_of_meetings[$ref->code], $committee->no_of_meetings);
        array_push($no_of_directors[$ref->code], $committee->composition->count());
        $committee_names[$ref->name]=$ref->code;

      }
     }
    foreach ($comb_com as $key4 => $com) {
            foreach ($com as $key5 => $single_com) {

              if($committee->map == $single_com){
        if(!isset($comb_chair_fee[$key4])){
          $comb_chair_fee[$key4]=[];
        }
        if(!isset($comb_member_fee[$key4])){
          $comb_member_fee[$key4]=[];
        }
        if(!isset($comb_no_of_meetings[$key4])){
          $comb_no_of_meetings[$key4]=[];
        }
        if(!isset($comb_no_of_directors[$key4])){
          $comb_no_of_directors[$key4]=[];
        }
        if($committee->chair_fee != 0 && $committee->chair_fee != Null){
        array_push($comb_chair_fee[$key4], $committee->chair_fee);
        }
        if($committee->member_fee != 0 && $committee->member_fee != Null){

        array_push($comb_member_fee[$key4], $committee->member_fee);
        }
          
        array_push($comb_no_of_meetings[$key4], $committee->no_of_meetings);
        array_push($comb_no_of_directors[$key4], $committee->composition->count());
        array_push($comb_committee_names, $key4);

      }
            }



         }     





     }
     }
      // $comb_chair_fee;
  $comb_committee_names=array_unique($comb_committee_names);
  $committee_names=array_unique($committee_names);
       

    // return $member_fee;
     $percentile_chair_fee=[];
     $percentile_member_fee=[];
     $percentile_no_of_meetings=[];
     $percentile_no_of_directors=[];
     $percentile_comb_chair_fee=[];
     $percentile_comb_member_fee=[];
     $percentile_comb_no_of_meetings=[];
     $percentile_comb_no_of_directors=[];
    // return $audit_no_of_meetings;
     for($i=25;$i<100;$i+=25){
      $percentile_market_cap[$i]=$this->get_percentile($i,$market_cap);
      $percentile_revenue[$i]=$this->get_percentile($i,$revenue);
      $percentile_basic_eps[$i]=$this->get_percentile($i,$basic_eps);
      $percentile_no_of_employees[$i]=$this->get_percentile($i,$no_of_employees);

       foreach ($committee_names as $key => $value) {
        if($chair_fee[$value] != Null){
         $percentile_chair_fee[$value][$i]=$this->get_percentile($i,$chair_fee[$value]);
        }
        else{
          $percentile_chair_fee[$value][$i]=0;
        }
        if($member_fee[$value] != Null){
      $percentile_member_fee[$value][$i]=$this->get_percentile($i,$member_fee[$value]);

        }
        else{
      $percentile_member_fee[$value][$i]=0;

        }
      $percentile_no_of_meetings[$value][$i]=$this->get_percentile($i,$no_of_meetings[$value]);
      $percentile_no_of_directors[$value][$i]=$this->get_percentile($i,$no_of_directors[$value]);
      }
      foreach ($comb_committee_names as $key => $value) {
        // return $comb_chair_fee[$value];
        if($comb_chair_fee[$value] != Null){
         $percentile_comb_chair_fee[$value][$i]=$this->get_percentile($i,$comb_chair_fee[$value]);
        }
        else{
          $percentile_comb_chair_fee[$value][$i]=0;
        }
        if($comb_member_fee[$value] != Null){
      $percentile_comb_member_fee[$value][$i]=$this->get_percentile($i,$comb_member_fee[$value]);

        }
        else{
      $percentile_comb_member_fee[$value][$i]=0;

        }
      $percentile_comb_no_of_meetings[$value][$i]=$this->get_percentile($i,$comb_no_of_meetings[$value]);
      $percentile_comb_no_of_directors[$value][$i]=$this->get_percentile($i,$comb_no_of_directors[$value]);
      }
     }
        return view('search.custom.view',compact('percentile_market_cap','percentile_revenue','percentile_basic_eps','percentile_no_of_employees','percentile_chair_fee','percentile_member_fee','percentile_no_of_meetings','percentile_no_of_directors','committee_names','percentile_comb_no_of_meetings','percentile_comb_no_of_directors','percentile_comb_member_fee','percentile_comb_chair_fee','comb_committee_names'));
    }


    public function result_custom_final(Request $request)
    {
      // $committee_ref=CommitteeReference::all();
     $user_committee= UserCommittee::where('user_id',Auth::user()->id)->get();
    $committee_ref=[];
    foreach ($user_committee as $key => $committee) {
     $comb_com[$committee->name]=[];

      $arr= explode(',', preg_replace('/[^a-zA-Z,]/', '', $committee->map)) ;
      foreach ($arr as $key => $value) {
        array_push($comb_com[$committee->name],$value);
        array_push($committee_ref,$value);
      }
    }
    $committee_ref=CommitteeReference::whereIn('code',$committee_ref)->get();
    
     // $comb_com['Compliance Committee']=['ARC','AUC','AUD'];
     $company= Company::whereIn('id',$request->company_id)->with('financial','committee.composition')->get(['id','no_of_employees']);
     $market_cap=[];
     $revenue=[];
     $basic_eps=[];
     $no_of_employees=[];
    $chair_fee=[];
    $member_fee=[];
    $no_of_meetings=[];
    $no_of_directors=[];
    $comb_chair_fee=[];
    $comb_member_fee=[];
    $comb_no_of_meetings=[];
    $comb_no_of_directors=[];
     $committee_names=[];
     $comb_committee_names=[];
     // return $company[0]->committee;
     // for market_cap and others
     foreach ($company as $key => $value) {
     $value->financial->preventAttrSet = true;
     $value->preventAttrSet = true;
     $market_cap[$key]=$value->financial->market_cap;
     $revenue[$key]=$value->financial->sale_revenue;
     $basic_eps[$key]=$value->financial->basic_eps;
     $no_of_employees[$key]=$value->no_of_employees;
     // return $value->committee;
     foreach ($value->committee as $key2 => $committee) {
     $committee->preventAttrSet = true;
     foreach ($committee_ref as $key3 => $ref) {
       if($committee->map == $ref->code){
        if(!isset($chair_fee[$ref->code])){
          $chair_fee[$ref->code]=[];
        }
        if(!isset($member_fee[$ref->code])){
          $member_fee[$ref->code]=[];
        }
        if(!isset($no_of_meetings[$ref->code])){
          $no_of_meetings[$ref->code]=[];
        }
        if(!isset($no_of_directors[$ref->code])){
          $no_of_directors[$ref->code]=[];
        }
        if($committee->chair_fee != 0 && $committee->chair_fee != Null){
        array_push($chair_fee[$ref->code], $committee->chair_fee);
        }
        if($committee->member_fee != 0 && $committee->member_fee != Null){

        array_push($member_fee[$ref->code], $committee->member_fee);
        }
          
        array_push($no_of_meetings[$ref->code], $committee->no_of_meetings);
        array_push($no_of_directors[$ref->code], $committee->composition->count());
        $committee_names[$ref->name]=$ref->code;

      }
     }
    foreach ($comb_com as $key4 => $com) {
           
            foreach ($com as $key5 => $single_com) {

              if($committee->map == $single_com){
        if(!isset($comb_chair_fee[$key4])){
          $comb_chair_fee[$key4]=[];
        }
        if(!isset($comb_member_fee[$key4])){
          $comb_member_fee[$key4]=[];
        }
        if(!isset($comb_no_of_meetings[$key4])){
          $comb_no_of_meetings[$key4]=[];
        }
        if(!isset($comb_no_of_directors[$key4])){
          $comb_no_of_directors[$key4]=[];
        }
        if($committee->chair_fee != 0 && $committee->chair_fee != Null){
        array_push($comb_chair_fee[$key4], $committee->chair_fee);
        }
        if($committee->member_fee != 0 && $committee->member_fee != Null){

        array_push($comb_member_fee[$key4], $committee->member_fee);
        }
          
        array_push($comb_no_of_meetings[$key4], $committee->no_of_meetings);
        array_push($comb_no_of_directors[$key4], $committee->composition->count());
        array_push($comb_committee_names, $key4);

      }
            }



         }     





     }
     }
     // return $comb_chair_fee;
 $comb_committee_names=array_unique($comb_committee_names);
  $committee_names=array_unique($committee_names);
       

    // return $member_fee;
     $percentile_chair_fee=[];
     $percentile_member_fee=[];
     $percentile_no_of_meetings=[];
     $percentile_no_of_directors=[];
     $percentile_comb_chair_fee=[];
     $percentile_comb_member_fee=[];
     $percentile_comb_no_of_meetings=[];
     $percentile_comb_no_of_directors=[];
    // return $audit_no_of_meetings;
     for($i=25;$i<100;$i+=25){
      $percentile_market_cap[$i]=$this->get_percentile($i,$market_cap);
      $percentile_revenue[$i]=$this->get_percentile($i,$revenue);
      $percentile_basic_eps[$i]=$this->get_percentile($i,$basic_eps);
      $percentile_no_of_employees[$i]=$this->get_percentile($i,$no_of_employees);

       foreach ($committee_names as $key => $value) {
        if($chair_fee[$value] != Null){
         $percentile_chair_fee[$value][$i]=$this->get_percentile($i,$chair_fee[$value]);
        }
        else{
          $percentile_chair_fee[$value][$i]=0;
        }
        if($member_fee[$value] != Null){
      $percentile_member_fee[$value][$i]=$this->get_percentile($i,$member_fee[$value]);

        }
        else{
      $percentile_member_fee[$value][$i]=0;

        }
      $percentile_no_of_meetings[$value][$i]=$this->get_percentile($i,$no_of_meetings[$value]);
      $percentile_no_of_directors[$value][$i]=$this->get_percentile($i,$no_of_directors[$value]);
      }
      foreach ($comb_committee_names as $key => $value) {
        // return $comb_chair_fee[$value];
        if($comb_chair_fee[$value] != Null){
         $percentile_comb_chair_fee[$value][$i]=$this->get_percentile($i,$comb_chair_fee[$value]);
        }
        else{
          $percentile_comb_chair_fee[$value][$i]=0;
        }
        if($comb_member_fee[$value] != Null){
      $percentile_comb_member_fee[$value][$i]=$this->get_percentile($i,$comb_member_fee[$value]);

        }
        else{
      $percentile_comb_member_fee[$value][$i]=0;

        }
      $percentile_comb_no_of_meetings[$value][$i]=$this->get_percentile($i,$comb_no_of_meetings[$value]);
      $percentile_comb_no_of_directors[$value][$i]=$this->get_percentile($i,$comb_no_of_directors[$value]);
      }
     }
        return view('search.custom.view',compact('percentile_market_cap','percentile_revenue','percentile_basic_eps','percentile_no_of_employees','percentile_chair_fee','percentile_member_fee','percentile_no_of_meetings','percentile_no_of_directors','committee_names','percentile_comb_no_of_meetings','percentile_comb_no_of_directors','percentile_comb_member_fee','percentile_comb_chair_fee','comb_committee_names'));
    }

    public function get_percentile($percentile, $array) {
    sort($array);
    $index = ($percentile/100) * count($array);
    if (floor($index) == $index) {
         $result = ($array[$index-1] + $array[$index])/2;
    }
    else {
        $result = $array[floor($index)];
    }
    return $result;
}

}
