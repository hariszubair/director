@extends('layouts.master')

@section('content')

<link rel="stylesheet" href="{{asset('public/css/select2.min.css')}}">

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>View Company</h3>
              </div>

            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Basic Company Detail</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                   <!--  <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                        <div class="form-group">
                                   
                                            <label class="col-md-12 col-sm-12">Name</label>
                                            <div class="col-md-12 col-sm-12">
                                              <input class="form-control" type="" value="{{$company->name}}" readonly>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                        <div class="form-group">
                                   
                                            <label class="col-md-12 col-sm-12">Code</label>
                                            <div class="col-md-12 col-sm-12">
                                              <input class="form-control" type="" value="{{$company->code}}" readonly>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Index</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="index" id="index"  value="{{$company->index}}" tabindex="2" readonly>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Industry</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="industry" id="industry" required value="{{$company->industry}}" tabindex="3" readonly>
                                                  
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Sector</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control"  required value="{{$company->sector}}" tabindex="3" readonly>
                                                  
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                       <div class="form-group">
                                            <label class="col-md-12 col-sm-12">No. of employees</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input type='text' id="no_of_employees" name="no_of_employees" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  class="form-control" required value="{{$company->no_of_employees}}" tabindex="4" readonly>
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Minimum share for Chief Executive</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_c_e" id="min_share_c_e" value="{{$company->min_share_c_e}}" tabindex="5" readonly>
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for Chief Executive</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_time_c_e" id="min_share_time_c_e" value="{{$company->min_share_time_c_e}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' tabindex="6" readonly>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Minimum share for other executives</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_o_e" id="min_share_o_e" value="{{$company->min_share_o_e}}" tabindex="7" readonly>
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for other executives</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_time_o_e" id="min_share_time_o_e" value="{{$company->min_share_time_o_e}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' tabindex="8" readonly>
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Minimum share for non executives</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_n_e" id="min_share_n_e" value="{{$company->min_share_n_e}}" tabindex="9" readonly>
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for non executives</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_time_n_e" id="min_share_time_n_e" value="{{$company->min_share_time_n_e}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' tabindex="10" readonly>
                                            </div>
                                        </div>
                                      </div>
                                     
            
                  </div>
                </div>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                   <div class="x_title">
                    <h2>Company Financials </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                     <input type="type" name="count_director" id="count_director" value="{{count($company->company_director)}}" style="display: none">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <div class="form-group col-md-6 col-sm-6 col-xs-12" style="display: none">
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Year<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" readonly value="{{$company->financial->year}}">
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Sale Revenue<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" readonly value="{{$company->financial->sale_revenue}}">
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Underlying Profit<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" readonly value="{{$company->financial->underlying_profit}}">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Average Capital Invested<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" value="{{$company->financial->a_c_i}}" readonly>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">ROCI<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control"  value="{{$company->financial->roci}}" readonly >
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Weight Share<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" value="{{$company->financial->weight_share}}" readonly>
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">BASIC EPS(EARNING PER SHARE)<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" value="{{$company->financial->basic_eps}}" readonly>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Free Cashflow<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" value="{{$company->financial->free_cashflow}}" readonly>
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Market Captilization<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" value="{{$company->financial->market_cap}}" readonly>
                                            </div>
                                        </div>
                                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                   <div class="x_title">
                    <h2>Director </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id='director_div'>
                    @foreach($company->company_director as $key=>$director)
                <div id="div_director[{{$key}}]">
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Name<span class="required">*</span></label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" value="{{$director->director->name}}" readonly></div></div></div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Gender<span class="required">*</span></label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                   <input class="form-control" value="{{$director->director->gender}}" readonly>
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Age</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" readonly value="{{$director->director->age}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Qualification</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" readonly value="{{$director->director->qualification}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Institute</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" readonly value="{{$director->director->institute}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Status</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                   <input class="form-control" readonly value="{{$director->status}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Board</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                  <input class="form-control" readonly value="{{$director->board}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Non Executive Type</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                  <input class="form-control" readonly value="{{$director->ned_type}}">
                </div>
                </div>
                </div>
                 <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Independent/ Non Independent</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                  <input class="form-control" readonly value="{{$director->independent_type}}">
                </div>
                </div>
                </div>
                 <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Joining Date</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" readonly value="{{$director->joining_date}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Leaving Date</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" readonly value="{{$director->leaving_date}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Fee</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control"readonly value="{{$director->director_fee}}"> 
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Superannuation</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" readonly  value="{{$director->superannuation}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Other fee</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" readonly value="{{$director->other_fee}}">
                </div>
                </div>
                </div>
                 <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Committee fee</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" readonly value="{{$director->committee_fee}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Vested Share</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" readonly  value="{{$director->vested_share}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Unvested Share</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" readonly  value="{{$director->vested_share}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">

                <hr style="clear: both;display: block; border: 1px solid black;">
                </div>
                @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
              <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                   <div class="x_title">
                    <h2>Committes </h2>
                   <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id='committee_div'>

                    @foreach($company->committee as $key=>$committee)
                     <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[{{$key}}]">
                      <div class="form-group">
                        <label class="col-md-12 col-sm-12">Committee Name<span class="required">*</span></label>
                        <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                          <input class="form-control" name="committee[{{$key}}]" id="commitee[{{$key}}]" required value="{{$committee->name}}" readonly>
                          
                        </div>
                      </div>
                    </div>
                      <div class="form-group col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group">
                        <label class="col-md-12 col-sm-12">Chair Fee<span class="required">*</span></label>
                        <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                          <input class="form-control" value="{{$committee->chair_fee}}" readonly>
                         
                        </div>
                      </div>
                    </div>
                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                      <div class="form-group">
                        <label class="col-md-12 col-sm-12">Member Fee<span class="required">*</span></label>
                        <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                          <input class="form-control"  value="{{$committee->member_fee}}" readonly>
                        </div>
                      </div>
                    </div>
                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                      <div class="form-group">
                        <label class="col-md-12 col-sm-12">No of Meetings<span class="required">*</span></label>
                        <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                          <input class="form-control" value="{{$committee->no_of_meetings}}" readonly>
                        </div>
                      </div>
                    </div>
                     <div class="form-group col-md-12 col-sm-12 col-xs-12">

                <hr style="clear: both;display: block; border: 1px solid black;">
                </div>
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Committe Composition</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <input type="text" name="composition_member" id='composition_member' value="{{$composition_member}}" style="display: none"> 
                     <input type="text" name="arr_committee" id='arr_committee' value="{{$arr_committee}}" style="display: none"> 
                    @foreach($committees as $committee )
                    <div style="clear: both">
                       <div class="form-group col-md-4 col-sm-4 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Committee<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                               <input class="form-control" value="{{$committee->name}}" readonly name="[{{$committee->id}}][name]">  
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-4 col-sm-4 col-xs-12" >
                                   
                                        <div class="form-group">
                                           @php
                                           if($composition_chairman->where('committee_id',$committee->id)->first()){
                                           $chairman=$composition_chairman->where('committee_id',$committee->id)->first()->director_name;
                                            }
                                            else{
                                            $chairman='';
                                          }                                        @endphp
                                            <label class="col-md-12 col-sm-12"> Chairman<span class="required">*</span></label>

                                            <div class="col-md-12 col-sm-12">
                                               <input class="form-control" value="{{$chairman}}" readonly>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-4 col-sm-4 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Members<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control js-example-basic-multiple" multiple="multiple" readonly>
                                                  @foreach($companies as $company)
                                                  <option value="{{$company->director->id}}">{{$company->director->name}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                      </div>
                                      @endforeach
                  </div>
                </div>
              </div>
      <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Other Committees </h2>
                     <input type="type" name="count_membership" id="count_membership" value="{{count($other_membership)}}" style="display: none">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="other_committee_div">
                    @foreach($other_membership as $key=>$membership)
                    <div id="div_committee[{{$key}}]" style="width: 100%;clear: both"> 
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Director<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control js-example-basic-single" readonly>
                                                  <option value="">Select a director</option>
                                                  @foreach($companies as $company)
                                                  <option {{$membership->director_id == $company->director->id ? 'selected' : ''}} value="{{$company->director->id}}">{{$company->director->name}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-4 col-sm-4 col-xs-12" >
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Type<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control js-example-basic-single" readonly>
                                                  <option value="">Select type</option>
                                                  <option   {{$membership->type == 'Former Executive' ? 'selected' : ''}} value="Former Executive">Former Executive</option>
                                                  <option  {{$membership->type == 'Current Executive' ? 'selected' : ''}} value="Current Executive">Current Executive</option>
                                                  <option  {{$membership->type == 'Former Director' ? 'selected' : ''}} value="Former Director">Former Director</option>
                                                  <option  {{$membership->type == 'Current Director' ? 'selected' : ''}} value="Current Director">Current Director</option>
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-4 col-sm-4 col-xs-12" >
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Organization<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                               <input class="form-control" readonlyx   value="{{$membership->organization}}">
                                            </div>
                                        </div>
                                      </div>
  
                  </div>
                  @endforeach
                </div>
              </div>
                                    </div>

          </div>
        </div>
       
        <!-- /page content -->

@endsection
