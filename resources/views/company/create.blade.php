@extends('layouts.master')

@section('content')


<link rel="stylesheet" href="{{asset('public/css/select2.min.css')}}">
<style>
 input:focus, select:focus, textarea:focus,  option:focus {
            background-color: #E5E4DE ;
            }
}
</style>
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Company</h3>
              </div>

            </div>

            <div class="clearfix"></div>
                     <form class="" action="{{route('store_company')}}" method="post" >
                      @csrf
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
                                            <label class="col-md-12 col-sm-12">Name<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control js-example-basic-single" name="name" id="name" required tabindex="1">
                                                  <option value="">Please select an option</option>
                                                 @foreach($company_reference as $reference)
                                                 <option value="{{$reference->id}}">{{$reference->name}}</option>
                                                 @endforeach
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                      
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                       <div class="form-group">
                                            <label class="col-md-12 col-sm-12">No. of employees<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input type='text' id="no_of_employees" name="no_of_employees"  class="form-control number_only" required value="{{old('no_of_employees')}}" tabindex="4">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" style="clear: both">
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Director Fee Pool</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control number_only" name="dir_fee_pool" id="dir_fee_pool" value="{{old('dir_fee_pool')}}" tabindex="5">
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Director Fee Pool Last Updated</label>
                                            <div class="col-md-12 col-sm-12">
                                               <input data-toggle="datepicker" class="form-control" name="dir_fee_pool_updated" id="dir_fee_pool" placeholder="dd-mm-yyyy" autocomplete="off" data-inputmask-alias="dd-mm-yyyy"  data-val="true" type="text" value="{{old('dir_fee_pool_updated')}}" readonly>
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" style="clear: both">
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Minimum share for Chief Executive</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_c_e" id="min_share_c_e" value="{{old('min_share_c_e')}}" tabindex="5">
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for Chief Executive in months</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_time_c_e" id="min_share_time_c_e" value="{{old('min_share_time_c_e')}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' tabindex="6">
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" style="clear: both">
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Minimum share for Chair</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_chair" id="min_share_chair" value="{{old('min_share_chair')}}" tabindex="5">
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for Chair in months</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_time_chair" id="min_share_time_chair" value="{{old('min_share_time_chair')}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' tabindex="6">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Minimum share for other executives</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_o_e" id="min_share_o_e" value="{{old('min_share_o_e')}}" tabindex="7">
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for other executives in months</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_time_o_e" id="min_share_time_o_e" value="{{old('min_share_time_o_e')}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' tabindex="8">
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Minimum share for other directors</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_n_e" id="min_share_n_e" value="{{old('min_share_n_e')}}" tabindex="9">
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for other directors in months</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_time_n_e" id="min_share_time_n_e" value="{{old('min_share_time_n_e')}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' tabindex="10">
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
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Year<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control" name="financial[year]" id="financial[year]" tabindex="11" required> </select>
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Sale Revenue<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12 ">
                                                <input  class="form-control number_only" name="financial[sale_revenue]" id="financial[sale_revenue]" value="{{old('financial[sale_revenue]')}}"  tabindex="12" required >
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Underlying Profit</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input  class="form-control number_only" name="financial[underlying_profit]" id="financial[underlying_profit]" value="{{old('financial[underlying_profit]')}}" tabindex="13" >
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Average Capital Invested</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input  class="form-control decimal_only" name="financial[a_c_i]" id="financial[a_c_i]" value="{{old('financial[a_c_i]')}}" tabindex="14" >
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">ROCI</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input  class="form-control decimal_only" name="financial[roci]" id="financial[roci]" value="{{old('financial[roci]')}}" tabindex="15"  step=".01">
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">No. of Shares<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input   class="form-control number_only" name="financial[weight_share]" id="financial[weight_share]" value="{{old('financial[weight_share]')}}" tabindex="16" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">BASIC EPS(EARNING PER SHARE)<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input  class="form-control decimal_only" name="financial[basic_eps]" id="financial[basic_eps]" value="{{old('financial[basic_eps]')}}" tabindex="17" required   step=".01">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Free Cashflow</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control number_only" name="financial[free_cashflow]" id="financial[free_cashflow]" value="{{old('financial[free_cashflow]')}}" tabindex="18"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Market Captilization<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input  class="form-control number_only" name="financial[market_cap]" id="financial[market_cap]" value="{{old('financial[market_cap]')}}" tabindex="19" required>
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
                    <h2>Director <button class="btn btn-success" onclick="add_director()" type="button"><i class="fas fa-plus " title="Add Director" ></i></button></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id='director_div'>
                  </div>
                </div>
              </div>
            </div>
            
             <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                   <div class="x_title">
                    <h2>Committes <button class="btn btn-success" onclick="add_committee()" type="button"><i class="fas fa-plus " title="Add company" ></i></button></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id='committee_div'>
                  </div>
                </div>
              </div>
            </div>
            
            <button class="btn btn-success" type="submit">Submit</button>


                                    </form>

          </div>
        </div>
       

        <!-- /page content -->

@endsection



@section('footer')
    <script src="{{asset('public/js/select2.min.js')}}"></script>

<script type="text/javascript">
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
document.getElementById("financial[year]").innerHTML = options;

 })
  var committee_counter=0;
  var director_counter=0;

  function add_committee ()
  {
    let html=`<div id="div_committee[`+committee_counter+`]"><div class="form-group col-md-6 col-sm-6 col-xs-12" ><div class="form-group"><label class="col-md-12 col-sm-12">Committee Name<span class="required">*</span></label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control" name="committee[`+committee_counter+`][name]" id="committee[`+committee_counter+`][name]" required></div></div></div>
      <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[`+committee_counter+`]"><div class="form-group"><label class="col-md-12 col-sm-12">Reference</label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><select class="form-control" name="committee[`+committee_counter+`][map]" id="committee[`+committee_counter+`][map]" required><option value="">Please select a reference committee</option> <option value="ARC">Audit, Risk &amp; Compliance Committee</option>
<option value="AUC">Audit &amp; Compliance Committee</option>
<option value="AUD">Audit Committee</option>
<option value="AUR">Audit &amp; Risk Management Committee</option>
<option value="COG">Corporate Governance Committee</option>
<option value="NOM">Nomination Committee</option>
<option value="OHS">Health, Safety &amp; Environment Committee</option>
<option value="HRS">Human Resources Committee</option>
<option value="NOR">Nomination &amp; Remuneration Committee</option>
<option value="REM">Remuneration Committee</option>
<option value="RIS">Risk Committee</option>
<option value="ACQ">Mergers &amp; Acquisition Committee</option>
<option value="BOM">Board Meeting</option>
<option value="BOR">Review Committee</option>
<option value="COM">Compliance Committee</option>
<option value="FIN">Finance Committee</option>
<option value="INV">Investment Committee</option>
<option value="MAK">Marketing Committee</option>
<option value="NED">Non-executive/Independent Director Committee</option>
<option value="OTH">Other Committee</option>
<option value="PLN">Planning/Strategy Committee</option>
<option value="SBM">Special Board Meeting</option>
<option value="Board">Board</option></select></div></div></div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[`+committee_counter+`]"><div class="form-group"><label class="col-md-12 col-sm-12">Chair Fee</label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control number_only" name="committee[`+committee_counter+`][chair_fee]" id="committee[`+committee_counter+`][chair_fee]" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></div></div></div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[`+committee_counter+`]"><div class="form-group"><label class="col-md-12 col-sm-12">Member Fee</label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control number_only" name="committee[`+committee_counter+`][member_fee]" id="committee[`+committee_counter+`][member_fee]" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></div></div></div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[`+committee_counter+`]"><div class="form-group"><label class="col-md-12 col-sm-12">No of meetings<span class="required">*</span></label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control number_only" name="committee[`+committee_counter+`][no_of_meetings]" id="committee[`+committee_counter+`][no_of_meetings]" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'></div></div></div>
    <div class="form-group col-md-12 col-sm-12 col-xs-12" >

    <button class="btn btn-danger" style="margin-bottom: 0" name="div_committee[`+committee_counter+`]" onclick="remove_committee($(this))"><i class="fas fa-minus " title="Remove company" type="button"></i></button>
    <hr style="clear: both;display: block; border: 1px solid black;">

    </div>
      `;
    $('#committee_div').prepend( html );
    committee_counter++;
    $('.number_only').on('input',function(event) {
 var patt=/^[\d]+$/gm;
              if(!patt.test($(this).val())) {
               $(this).val($(this).val().replace(/[^\d]/g, '')); 
              
    }
    });
  }
  function add_director ()
  {
    let html =`<div id="div_director[`+director_counter+`]" >
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
    <select class="form-control" name="director_company[`+director_counter+`][independent_type]" id="director_company[`+director_counter+`][independent_type]">
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
    <input class="form-control decimal_only" name="director_company[`+director_counter+`][director_fee]" id="director_company[`+director_counter+`][director_fee]" > 
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Superannuation</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input  class="form-control number_only" name="director_company[`+director_counter+`][superannuation]" id="director_company[`+director_counter+`][superannuation]"   >
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Other fee</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control number_only" name="director_company[`+director_counter+`][other_fee]" id="director_company[`+director_counter+`][other_fee]"  onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
    </div>
    </div>
    </div>
     <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Committee fee</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control number_only" name="director_company[`+director_counter+`][committee_fee]" id="director_company[`+director_counter+`][committee_fee]"   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Vested Share</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control number_only" name="director_company[`+director_counter+`][vested_share]" id="director_company[`+director_counter+`][vested_share]"   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Unvested Share</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control number_only" name="director_company[`+director_counter+`][unvested_share]" id="director_company[`+director_counter+`][unvested_share]" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
    </div>
    </div>
    </div>
    <div class="form-group col-md-12 col-sm-12 col-xs-12" >
    
    <button class="btn btn-danger" style="margin-bottom: 0" name="div_director[`+director_counter+`]" onclick="remove_director($(this))"><i class="fas fa-minus " title="Remove company" type="button"></i></button>
    </div>

    <hr style="clear: both;display: block; border: 1px solid black;">
    </div>`;




    $('#director_div').prepend( html );
    director_counter++;
    $('[data-toggle="datepicker"]').datepicker({
        autoHide:'true',
        format: 'dd-mm-yyyy'
       });
              $(":input[data-inputmask-mask]").inputmask();
  $(":input[data-inputmask-alias]").inputmask();
  $(":input[data-inputmask-regex]").inputmask("Regex");
  $('.number_only').on('input',function(event) {
 var patt=/^[\d]+$/gm;
              if(!patt.test($(this).val())) {
               $(this).val($(this).val().replace(/[^\d]/g, '')); 
              
    }
    });

  $('.decimal_only').on('input',function(event) {
    // x.replace(/[^.\d]/g, '').replace(/^(\d*\.?)|(\d*)\.?/g, "$1$2")
         var patt=/^[\d\.]+$/gm;
              if(!patt.test($(this).val())) {
               $(this).val($(this).val().replace(/[^.\d]/g, '')); 
    }
    });
  }
  function remove_committee (clicked)
  {
    clicked.parent().parent().remove()
  }
  function remove_director (clicked)
  {
    clicked.parent().parent().remove()
  }
  $('.number_only').on('input',function(event) {
 var patt=/^[\d]+$/gm;
              if(!patt.test($(this).val())) {
               $(this).val($(this).val().replace(/[^\d]/g, '')); 
              
    }
    });

  $('.decimal_only').on('input',function(event) {
    // x.replace(/[^.\d]/g, '').replace(/^(\d*\.?)|(\d*)\.?/g, "$1$2")
         var patt=/^[\d\.]+$/gm;
              if(!patt.test($(this).val())) {
               $(this).val($(this).val().replace(/[^.\d]/g, '')); 
    }
    });
</script>
@endsection