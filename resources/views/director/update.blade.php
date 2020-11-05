@extends('layouts.master')

@section('content')
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
                    <h2>Committes </h2>
                   
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
                    @endforeach
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
       

        <!-- /page content -->

@endsection



