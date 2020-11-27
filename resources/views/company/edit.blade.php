@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{asset('public/css/select2.min.css')}}">

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left" style="display: inline-flex;">
                <h3>Edit Company </h3> <a href="{{route('edit_composition',['id'=>$company->id])}}" class="btn btn-primary"> Edit committee</a>
              </div>

            </div>

            <div class="clearfix"></div>
             <form method="POST" action="{{route('update_company',['id'=>$company->id])}}" accept-charset="UTF-8" id="update_form">
                  <input name="_method" type="hidden" value="PATCH">
                  @csrf
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Basic Company Detail</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                        <div class="form-group">
                                   
                                            <label class="col-md-12 col-sm-12">Name<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control js-example-basic-single" name="name" id="name" required tabindex="1">
                                                  <option value="">Please select an option</option>
                                                 @foreach($company_reference as $reference)
                                                 <option {{$company->code==$reference->code ? 'selected' : ''}} value="{{$reference->id}}">{{$reference->name}}</option>
                                                 @endforeach
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                     
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                       <div class="form-group">
                                            <label class="col-md-12 col-sm-12">No. of employees<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input type='text' id="no_of_employees" name="no_of_employees" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  class="form-control" required value="{{$company->no_of_employees}}" tabindex="4">
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" style="clear: both">
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Director Fee Pool</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="dir_fee_pool" id="dir_fee_pool" value="{{$company->dir_fee_pool}}" tabindex="5">
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Director Fee Pool Last Updated</label>
                                            <div class="col-md-12 col-sm-12">
                                               <input data-toggle="datepicker" class="form-control" name="dir_fee_pool_updated" id="dir_fee_pool" placeholder="dd-mm-yyyy" autocomplete="off" data-inputmask-alias="dd-mm-yyyy"  data-val="true" type="text" value="{{$company->dir_fee_pool_updated}}" readonly>
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" style="clear: both">
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Minimum share for Chief Executive</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_c_e" id="min_share_c_e" value="{{$company->min_share_c_e}}" tabindex="5">
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for Chief Executive</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_time_c_e" id="min_share_time_c_e" value="{{$company->min_share_time_c_e}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' tabindex="6" >
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" style="clear: both">
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Minimum share for Chair</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_chair" id="min_share_chair" value="{{$company->min_share_chair}}" tabindex="5">
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for Chair in months</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_time_chair" id="min_share_time_chair" value="{{$company->min_share_time_chair}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' tabindex="6">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Minimum share for other executives</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_o_e" id="min_share_o_e" value="{{$company->min_share_o_e}}" tabindex="7">
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for other executives</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_time_o_e" id="min_share_time_o_e" value="{{$company->min_share_time_o_e}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' tabindex="8">
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Minimum share for other directors</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_n_e" id="min_share_n_e" value="{{$company->min_share_n_e}}" tabindex="9">
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for other directors</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_time_n_e" id="min_share_time_n_e" value="{{$company->min_share_time_n_e}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' tabindex="10">
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
                     <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Year<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control" name="financial[year]" id="financial[year]"tabindex="11" required >
                                                  <option>{{$company->financial->year}}</option>
                                                </select>

                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Sale Revenue<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="financial[sale_revenue]" id="financial[sale_revenue]"  tabindex="12" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$company->financial->sale_revenue}}">
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Underlying Profit</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="financial[underlying_profit]" id="financial[underlying_profit]" value="{{$company->financial->underlying_profit}}" tabindex="13" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Average Capital Invested</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="financial[a_c_i]" id="financial[a_c_i]" value="{{$company->financial->a_c_i}}" tabindex="14" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">ROCI</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="financial[roci]" id="financial[roci]" value="{{$company->financial->roci}}" tabindex="15" step=".01">
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Weight Share<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="financial[weight_share]" id="financial[weight_share]" value="{{$company->financial->weight_share}}"tabindex="16" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">BASIC EPS(EARNING PER SHARE)<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="financial[basic_eps]" id="financial[basic_eps]" value="{{$company->financial->basic_eps}}" tabindex="17" required   step=".01">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Free Cashflow</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input type="number" class="form-control" name="financial[free_cashflow]" id="financial[free_cashflow]" value="{{$company->financial->free_cashflow}}" tabindex="18"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Market Captilization<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="financial[market_cap]" id="financial[market_cap]" value="{{$company->financial->market_cap}}" tabindex="19" required>
                                            </div>
                                        </div>
                                      </div>
             <button class="btn btn-success" type="submit">Update</button>

                  </div>
                </div>
              </div>
            </div>
          </form>
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                   <div class="x_title">
                    <h2>Director <button class="btn btn-success" onclick="add_director()" type="button"><i class="fas fa-plus " title="Add Director" ></i></button></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id='director_div'>
                    @foreach($company->company_director as $key=>$director)
                     <form method="POST" action="{{route('update_director',['id'=>$director->id.'-'.$director->director->id])}}" accept-charset="UTF-8" id="update_form">
                  <input name="_method" type="hidden" value="PATCH">
                  @csrf
                <div id="div_director[{{$key}}]">
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Name<span class="required">*</span></label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" name="director[{{$key}}][name]" id="director[{{$key}}][name]" required value="{{$director->director->name}}"></div></div></div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Gender<span class="required">*</span></label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <select class="form-control" name="director[{{$key}}][gender]" id="director[{{$key}}][gender]" required>
                <option value="">Please select an option</option>
                <option {{$director->director->gender == 'Male' ? 'selected' :'' }} >Male</option>
                <option {{$director->director->gender == 'Female' ? 'selected' :'' }} >Female</option>
                <option {{$director->director->gender == 'Not Specified' ? 'selected' :'' }}>Not Specified</option>
                </select>
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Age</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" name="director[{{$key}}][age]" id="director[{{$key}}][age]" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57" value="{{$director->director->age}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Qualification</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" name="director[{{$key}}][qualification]" id="director[{{$key}}][qualification]" value="{{$director->director->qualification}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Institute</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" name="director[{{$key}}][institute]" id="director[{{$key}}][institute]" value="{{$director->director->institute}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Status</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <select class="form-control" name="director_company[{{$key}}][status]" id="director_company[{{$key}}][status]" required="">
                <option {{$director->status == 'Active' ? 'selected' :'' }}>Active</option>
                <option {{$director->status == 'Former' ? 'selected' :'' }}>Former</option>
                </select>
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Board</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <select class="form-control" name="director_company[{{$key}}][board]" id="director_company[{{$key}}][board]" required="">
                <option value="">Please select an option</option>
                <option {{$director->board == 'Chairman' ? 'selected' :'' }}>Chairman</option>
                <option {{$director->board == 'Member' ? 'selected' :'' }}>Member</option>
                </select>
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Non Executive Type</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <select class="form-control" name="director_company[{{$key}}][ned_type]" id="director_company[{{$key}}][ned_type]" required="">
                <option value="">Please select an option</option>
                <option {{$director->ned_type == 'Non-Executive Chairman' ? 'selected' :'' }}>Non-Executive Chairman</option>
                <option {{$director->ned_type == 'Non-Executive Director' ? 'selected' :'' }}>Non-Executive Director</option>
                </select>
                </div>
                </div>
                </div>
                 <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Independent/ Non Independent</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <select class="form-control" name="director_company[{{$key}}][independent_type]" id="director_company[{{$key}}][independent_type]" >
                <option value="">Please select an option</option>
                <option {{$director->independent_type == 'Independent' ? 'selected' :'' }}>Independent</option>
                <option {{$director->independent_type == 'Non Independent' ? 'selected' :'' }}>Non Independent</option>
                </select>
                </div>
                </div>
                </div>
                 <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Joining Date</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input data-toggle="datepicker" class="form-control" name="director_company[{{$key}}][joining_date]" id="director_company[{{$key}}][joining_date]" placeholder="dd-mm-yyyy" autocomplete="off" data-inputmask-alias="dd-mm-yyyy" data-val="true" type="text" value="{{$director->joining_date}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Leaving Date</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input data-toggle="datepicker" class="form-control" name="director_company[{{$key}}][leaving_date]" id="director_company[{{$key}}][leaving_date]" placeholder="dd-mm-yyyy" autocomplete="off" data-inputmask-alias="dd-mm-yyyy" data-val="true" type="text" value="{{$director->leaving_date}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Fee</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" name="director_company[{{$key}}][director_fee]" id="director_company[{{$key}}][director_fee]" type="number" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57"  value="{{$director->director_fee}}"> 
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Superannuation</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" name="director_company[{{$key}}][superannuation]" id="director_company[{{$key}}][superannuation]" type="number" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57"  value="{{$director->superannuation}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Other fee</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" name="director_company[{{$key}}][other_fee]" id="director_company[{{$key}}][other_fee]" type="number" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57"  value="{{$director->other_fee}}">
                </div>
                </div>
                </div>
                 <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Committee fee</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" name="director_company[{{$key}}][committee_fee]" id="director_company[{{$key}}][committee_fee]" type="number" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57"  value="{{$director->committee_fee}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Vested Share</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" name="director_company[{{$key}}][vested_share]" id="director_company[{{$key}}][vested_share]" type="number" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57"  value="{{$director->vested_share}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                <label class="col-md-12 col-sm-12">Unvested Share</label>
                <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                <input class="form-control" name="director_company[{{$key}}][unvested_share]" id="director_company[{{$key}}][unvested_share]" type="number" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57"  value="{{$director->unvested_share}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                 <button class="btn btn-success" >Update</button>
                </div>

               
                </div>
              </form>
               <form action="{{route('delete_director',['id'=>$director->id.'-'.$director->director->id])}}" method="post" name='delete_director'>
                    @method('DELETE')
                    @csrf
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                 <button class="btn btn-danger" ><i class="fas fa-minus " title="Remove Director" type="submit"></i></button>
               </div>
              </form>
               <hr style="clear: both;display: block; border: 1px solid black;">
                @endforeach
                  </div>
                </div>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                   <div class="x_title">
                    <h2>Committes <button class="btn btn-success" onclick="add_committee()" type="button"><i class="fas fa-plus " title="Add company" ></i></button></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <input type="type" name="count_committee" id="count_committee" value="{{count($company->committee)}}" style="display: none">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id='committee_div'>
                 
                    @foreach($company->committee as $key=>$committee)
                     <form method="POST" action="{{route('update_committee',['id'=>$committee->id])}}" accept-charset="UTF-8">
                  <input name="_method" type="hidden" value="PATCH">
                  @csrf
                  <div id="div_committee[{{$key}}]">
                     <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                      <div class="form-group">
                        <label class="col-md-12 col-sm-12">Committee Name<span class="required">*</span></label>
                        <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                          <input class="form-control" name="committee[{{$key}}][name]" id="commitee[{{$key}}][name]" required value="{{$committee->name}}">

                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                      <div class="form-group">
                        <label class="col-md-12 col-sm-12">Chair Fee</label>
                        <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                          <input class="form-control" name="committee[{{$key}}][chair_fee]" id="commitee[{{$key}}][chair_fee]"  value="{{$committee->chair_fee}}">

                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                      <div class="form-group">
                        <label class="col-md-12 col-sm-12">Member Fee</label>
                        <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                          <input class="form-control" name="committee[{{$key}}][member_fee]" id="commitee[{{$key}}][member_fee]"  value="{{$committee->member_fee}}">

                        </div>
                      </div>
                    </div>
                     <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                      <div class="form-group">
                        <label class="col-md-12 col-sm-12">No of Meetings<span class="required">*</span></label>
                        <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                          <input class="form-control" name="committee[{{$key}}][no_of_meetings]" id="commitee[{{$key}}][no_of_meetings]" required value="{{$committee->no_of_meetings}}">

                        </div>
                      </div>
                    </div>
                     <div class="form-group col-md-6 col-sm-6 col-xs-12" >

                 <button class="btn btn-success"  name="div_committee[`+committee_counter+`]" ><i class="fas fa-plus " title="Add Committee" type="button"></i></button>
               </div>
                  </div>

                  </form>
                   <form action="{{route('delete_committee',['id'=>$committee->id])}}" method="post" name='delete_committee'>
                    @method('DELETE')
                    @csrf
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                 <button class="btn btn-danger" ><i class="fas fa-minus " title="Remove Committee" type="submit"></i></button>
               </div>
              </form>
               <hr style="clear: both;display: block; border: 1px solid black;">
                    @endforeach
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
       

        <!-- /page content -->

@endsection



@section('footer')
    <script src="{{asset('public/js/select2.min.js')}}"></script>

<script type="text/javascript">
  var committee_counter=$('#count_committee').val();
  var director_counter=$('#count_director').val();  
 $(document).ready(function(){
  $('.js-example-basic-single').select2();
   $('[data-toggle="datepicker"]').datepicker({
        autoHide:'true',
        format: 'dd-mm-yyyy'
       });
              $(":input[data-inputmask-mask]").inputmask();
  $(":input[data-inputmask-alias]").inputmask();
  $(":input[data-inputmask-regex]").inputmask("Regex");
  var start = 1900;
var end = new Date().getFullYear();
  
var options = "";
for(var y = end ; y >=start; y--){
  options += "<option>"+ y +"</option>";
}
document.getElementById("financial[year]").innerHTML += options;
 })
  function add_committee ()
  {
    let html =`
     <form method="POST" action="{{route('store_committee')}}" accept-charset="UTF-8" >@csrf
      <input class="form-control" name="company_id"  value="<?php echo $company->id ?>" style="display:none">
      <input class="form-control" name="company_name"  value="<?php echo $company->name ?>" style="display:none">
      <div id="div_committee[`+committee_counter+`]"><div class="form-group col-md-6 col-sm-6 col-xs-12" ><div class="form-group"><label class="col-md-12 col-sm-12">Committee Name<span class="required">*</span></label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control" name="committee[`+committee_counter+`][name]" id="committee[`+committee_counter+`][name]" required></div></div></div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[`+committee_counter+`]"><div class="form-group"><label class="col-md-12 col-sm-12">Chair Fee</label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control" name="committee[`+committee_counter+`][chair_fee]" id="committee[`+committee_counter+`][chair_fee]"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' type='number'></div></div></div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[`+committee_counter+`]"><div class="form-group"><label class="col-md-12 col-sm-12">Member Fee</label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control" name="committee[`+committee_counter+`][member_fee]" id="committee[`+committee_counter+`][member_fee]" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  type='number'></div></div></div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[`+committee_counter+`]"><div class="form-group"><label class="col-md-12 col-sm-12">No of meetings<span class="required">*</span></label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control" name="committee[`+committee_counter+`][no_of_meetings]" id="committee[`+committee_counter+`][no_of_meetings]" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'  type='number'></div></div></div>
    <div class="form-group col-md-12 col-sm-12 col-xs-12" >

    <button class="btn btn-danger" style="margin-bottom: 0" name="div_committee[`+committee_counter+`]" onclick="remove_committee($(this))"><i class="fas fa-minus " title="Remove company" type="button"></i></button>
    <button class="btn btn-success" style="margin-bottom: 0" name="div_committee[`+committee_counter+`]" ><i class="fas fa-plus " title="Add Committee" type="button"></i></button>
    <hr style="clear: both;display: block; border: 1px solid black;">

    </div>

    </form>
    `;

    $('#committee_div').prepend( html );
    committee_counter++;
  }
  function add_director ()
  {
    let html =`
    <form method="POST" action="{{route('store_director')}}" accept-charset="UTF-8" >@csrf
      <input class="form-control" name="company_id"  value="<?php echo $company->id ?>" style="display:none">
      <input class="form-control" name="company_name"  value="<?php echo $company->name ?>" style="display:none">
    <div id="div_director[`+director_counter+`]" >
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Name<span class="required">*</span></label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control" name="director[`+director_counter+`][name]" id="director[`+director_counter+`][name]" required></i></div></div></div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Gender<span class="required">*</span></label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <select class="form-control" name="director[`+director_counter+`][gender]" id="director[`+director_counter+`][gender]" required>
    <option value="">Please select an option</option>
    <option>Male</option>
    <option>Female</option>
    <option>Not Specified</option>
    </select>
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Age</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control" name="director[`+director_counter+`][age]" id="director[`+director_counter+`][age]" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Qualification</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control" name="director[`+director_counter+`][qualification]" id="director[`+director_counter+`][qualification]">
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Institute</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control" name="director[`+director_counter+`][institute]" id="director[`+director_counter+`][institute]">
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Status</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <select class="form-control" name="director_company[`+director_counter+`][status]" id="director_company[`+director_counter+`][status]" required>
    <option>Active</option>
    <option>Former</option>
    </select>
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Board</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <select class="form-control" name="director_company[`+director_counter+`][board]" id="director_company[`+director_counter+`][board]" required>
    <option value="">Please select an option</option>
    <option>Chairman</option>
    <option>Member</option>
    </select>
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Non Executive Type</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <select class="form-control" name="director_company[`+director_counter+`][ned_type]" id="director_company[`+director_counter+`][ned_type]" required>
    <option value="">Please select an option</option>
    <option>Non-Executive Chairman</option>
    <option>Non-Executive Director</option>
    </select>
    </div>
    </div>
    </div>
     <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Independent/ Non Independent</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <select class="form-control" name="director_company[`+director_counter+`][independent_type]" id="director_company[`+director_counter+`][independent_type]" >
    <option value="">Please select an option</option>
    <option>Independent</option>
    <option>Non Independent</option>
    </select>
    </div>
    </div>
    </div>
     <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Joining Date</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input data-toggle="datepicker" class="form-control" name="director_company[`+director_counter+`][joining_date]" id="director_company[`+director_counter+`][joining_date]" placeholder="dd-mm-yyyy" autocomplete="off" data-inputmask-alias="dd-mm-yyyy"  data-val="true" type="text" >
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Leaving Date</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input data-toggle="datepicker" class="form-control" name="director_company[`+director_counter+`][leaving_date]" id="director_company[`+director_counter+`][leaving_date]" placeholder="dd-mm-yyyy" autocomplete="off" data-inputmask-alias="dd-mm-yyyy"  data-val="true" type="text" >
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Fee</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control" name="director_company[`+director_counter+`][director_fee]" id="director_company[`+director_counter+`][director_fee]" type='number' onkeypress='return event.charCode >= 48 && event.charCode <= 57'> 
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Superannuation</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input  class="form-control" name="director_company[`+director_counter+`][superannuation]" id="director_company[`+director_counter+`][superannuation]"  type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Other fee</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control" name="director_company[`+director_counter+`][other_fee]" id="director_company[`+director_counter+`][other_fee]"  type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
    </div>
    </div>
    </div>
     <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Committee fee</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control" name="director_company[`+director_counter+`][committee_fee]" id="director_company[`+director_counter+`][committee_fee]"  type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Vested Share</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control" name="director_company[`+director_counter+`][vested_share]" id="director_company[`+director_counter+`][vested_share]"  type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Unvested Share</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control" name="director_company[`+director_counter+`][unvested_share]" id="director_company[`+director_counter+`][unvested_share]"  type="number" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
    </div>
    </div>
    </div>
    <div class="form-group col-md-12 col-sm-12 col-xs-12" >
    
    <button class="btn btn-danger" style="margin-bottom: 0" name="div_director[`+director_counter+`]" onclick="remove_director($(this))"><i class="fas fa-minus " title="Remove Director" type="button"></i></button>
    <button class="btn btn-success" style="margin-bottom: 0" name="div_director[`+director_counter+`]" ><i class="fas fa-plus " title="Add director"></i></button>
    </div>

    <hr style="clear: both;display: block; border: 1px solid black;">
    </div>
    </form>
    `;




    $('#director_div').prepend( html );
    director_counter++;
    $('[data-toggle="datepicker"]').datepicker({
        autoHide:'true',
        format: 'dd-mm-yyyy'
       });
              $(":input[data-inputmask-mask]").inputmask();
  $(":input[data-inputmask-alias]").inputmask();
  $(":input[data-inputmask-regex]").inputmask("Regex");
  }
  function remove_committee (clicked)
  {
    clicked.closest('div').parent().parent().remove()
  }
  function remove_director (clicked)
  {
    clicked.parent().parent().remove()
  }

 $('form[name="delete_committee"]').on('submit', function() {
    if(confirm('Do you really want to delete the committee?\n It will delete all the details of this committe related to company (i.e. no. of meetings, directors linked to this committee, chair fee etc.).')) {
        return true;
    }

    return false;
});
 $('form[name="delete_director"]').on('submit', function() {
    if(confirm('Do you really want to delete the director?\n It will delete all the details of this director related to company and committee.')) {
        return true;
    }

    return false;
});

</script>
@endsection 