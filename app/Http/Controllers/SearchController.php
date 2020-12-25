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
use DB;

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

            $composition_chairman=CommitteeComposition::where('company_id',$request->company_id)->where('type','Chairman')->get();
         $composition_member=CommitteeComposition::where('company_id',$request->company_id)->where('type','Member')->get(['director_id','committee_id']);
        $other_membership=OtherMembership::whereIn('director_id',CompanyDirector::where('company_id',$request->company_id)->pluck('director_id'))->get();
        $arr_committee=Committee::where('company_id',$request->company_id)->pluck('id');
        $committees=Committee::where('company_id',$request->company_id)->get();
          $companies= CompanyDirector::where('company_id',$request->company_id)->with('director')->with('committee')->get();
        return view('company.view',compact('company','composition_chairman','composition_member','other_membership','arr_committee','committees','companies')); 
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
            $companies=$companies->whereHas('financial', function ($query) use($request) {

              if($request->range != '0;0'){
                  $range=explode(';', $request->range);
                  $min_range=($range[0]/100) * 3918200000;
                  $max_range=($range[1]/100) * 3918200000;
                  $query= $query->where('sale_revenue', '>=', $min_range)->where('sale_revenue', '<=', $max_range);
              }
              if($request->range_mar_cap != '0;0'){
                  $range=explode(';', $request->range_mar_cap);
                  $min_range=($range[0]/100) * 4430000000;
                  $max_range=($range[1]/100) * 4430000000;
                  $query= $query->where('market_cap', '>=', $min_range)->where('market_cap', '<=', $max_range);
              }
              return $query;
          });
        }

         $companies= $companies->pluck('id')->toArray();
      $company= Company::select('id','name','index')->get();
      $tempcompany= [];
      foreach ($company as $key =>$value) {
        $tempcompany[$key]['id']=$value->id;
        $tempcompany[$key]['name']=$value->name;
        $tempcompany[$key]['index']=$value->index;
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
        return view('search.custom.index',compact('companies'));

      return $tempcompany;
     
    }
}
