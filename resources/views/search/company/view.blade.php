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
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" style="clear: both">
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Director Fee Pool</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="dir_fee_pool" id="dir_fee_pool" value="{{$company->dir_fee_pool}}" tabindex="5" readonly>
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
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" style="clear: both">
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Minimum share for Chair</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_chair" id="min_share_chair" value="{{old('min_share_chair')}}" tabindex="5" readonly>
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for Chair in months</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_time_chair" id="min_share_time_chair" value="{{old('min_share_time_chair')}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' tabindex="6" readonly>
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
                                            <label class="col-md-12 col-sm-12">Minimum share for other directors</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_n_e" id="min_share_n_e" value="{{$company->min_share_n_e}}" tabindex="9" readonly>
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for other directors</label>
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
                    <table class="table table-bordered" width="100%">
                        <thead>
                          <tr>
                            <th>Committee Name</th>
                            <th>Chair Fee</th>
                            <th>Member Fee</th>
                            <th>No. of Meetings</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($company->committee as $key=>$committee)
                          <tr>
                            <th>
                              {{$committee->name}}
                            </th>
                            <td>${{$committee->chair_fee}}</td>
                            <td>${{$committee->member_fee}}</td>
                            <td>{{$committee->no_of_meetings}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                                      </div>
                </div>
              </div>
            </div>
            <div class="row">
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
                   
                    <table class="table table-bordered" width="100%">
                      <thead>
                        <th>Director</th>
                    @foreach($committees as $committee )
                    <th>{{$committee->name}}</th>
                    @endforeach
                      </thead>
                    <tbody>
                      @foreach($director_committee as $director)
                      <tr>
                        <th>{{$director['name']}}</th>
                         @foreach($committees as $committee )
                           <td>{{isset($director[$committee->name]) ? $director[$committee->name] : '-'}}</td>
                        @endforeach                        
                      </tr>
                      @endforeach
                      <tr>
                        
                      </tr>
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                   <div class="x_title">
                    <h2>Directors <span>Click on arrow sign to view director's details</span></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" >
                    @foreach($company->company_director as $key=>$director)
                  <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                   <div class="x_title">
                    <h2>{{$director->director->name}} </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" style="display: none">
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
                <input class="form-control" readonly  value="{{$director->unvested_share}}">
                </div>
                </div>
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">

                <hr style="clear: both;display: block; border: 1px solid black;">
                </div>
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
      </div>
       
        <!-- /page content -->

@endsection


@section('footer')
    <script src="{{asset('public/js/select2.min.js')}}"></script>

<script type="text/javascript">
 $(document).ready(function(){
  $('.js-example-basic-single').select2();
  $('.js-example-basic-multiple').select2();
  // var arr_committee=JSON.parse($('#arr_committee').val())
// console.log(arr_committee);
var temp=[];
  // var composition_member=JSON.parse($('#composition_member').val())
// console.log(composition_member);

// $.each(arr_committee, function( index, committee ) {
//   $('#member['+committee+']').select2();

// //   $.each(composition_member, function( index, member ) {
// //   if(member.committee_id==committee){
// //     temp.push(member.director_id);
// //   }

// // });

// $('.js-example-basic-multiple.'+committee).val(temp).trigger('change');
// // console.log(temp)
// temp=[];
// });
});
</script>
@endsection
