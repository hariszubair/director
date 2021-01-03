@extends('layouts.master')

@section('content')
<style type="text/css">
  .select2-container .select2-selection--single .select2-selection__rendered {
        padding-left: 50px !important;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered {

    color: #9b757d !important;
  }
</style>
<link rel="stylesheet" href="{{asset('public/css/select2.min.css')}}">

 <!-- page content -->
        <div class="right_col" role="main" style="min-height: 800px">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <!-- <h3>Profile</h3> -->
              </div>

            </div>

            <div class="clearfix"></div>
 <form  method="post" action="./create_company_profile" >
                  {!! csrf_field() !!}
            <div class="row">
              
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profile</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                  <div class="item form-group">
                      <div class="col-md-3 col-sm-3  form-group has-feedback">
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" id="name" name="name"  placeholder="Name" required="required">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="item form-group">
                      <div class="col-md-3 col-sm-3  form-group has-feedback">
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                     <input type="tel" class="form-control number_only has-feedback-left" id="phone" name="phone" placeholder="Phone">
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="item form-group">
                      <div class="col-md-3 col-sm-3  form-group has-feedback">
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                     <input type="text" class="form-control has-feedback-left" id="company_name" name="company_name" placeholder="Company Name">
                      <span class="far fa-building form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                   <div class="item form-group">
                      <div class="col-md-3 col-sm-3  form-group has-feedback">
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                     <select type="text" class="form-control has-feedback-left js-example-basic-single" id="sector" name="sector" placeholder="Sector">
                      <option>Please Select a Sector</option>
                       @foreach($sector as $value)
                       <option value="{{$value}}">{{$value}}</option>
                       @endforeach
                     </select>
                      <span class="fas fa-bezier-curve form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="item form-group">
                      <div class="col-md-3 col-sm-3  form-group has-feedback">
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                      <select type="text" class="form-control has-feedback-left js-example-basic-single" id="industry" name="industry" placeholder="Sector">
                      <option>Please Select a Industry</option>
                       @foreach($industry as $value)
                       <option value="{{$value}}">{{$value}}</option>
                       @endforeach
                     </select>
                      <span class="fas fa-industry form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                   <div class="item form-group">
                      <div class="col-md-3 col-sm-3  form-group has-feedback">
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left number_only" id="sale_revenue" name="sale_revenue"  placeholder="Sale Revenue" required="required">
                      <span class="fas fa-dollar-sign form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="item form-group">
                      <div class="col-md-3 col-sm-3  form-group has-feedback">
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left number_only" id="market_cap" name="market_cap"  placeholder="Market Capital" required="required">
                      <span class="fas fa-funnel-dollar form-control-feedback left" aria-hidden="true"></span>
                    </div>

                  </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Committees </h2>
                    <button type="button" style="margin-left: 5px" class="btn btn-success" onclick="add_committee()" title="Add a committee"><i class="fas fa-plus" style="size: 2x"></i></button>
                    <div class="clearfix"></div>
                  </div>
                 <div class="x_content" id='committee_div'>
                  <div class="item form-group">
                    <button class="btn btn-success">Submit</button>
                  </div>
                  </div>

                </div>
              </div>
            </div>
                  </form>



          </div>
        </div>
        <!-- /page content -->

@endsection


@section('footer')

    <script src="{{asset('public/js/select2.min.js')}}"></script>
<script type="text/javascript">
   $(document).on('focus', '.select2.select2-container', function (e) {
  // only open on original attempt - close focus event should not fire open
  if (e.originalEvent && $(this).find(".select2-selection--single").length > 0) {
    $(this).siblings('select').select2('open');
  } 
});
  $(document).ready(function(){
  $('.js-example-basic-single').select2();
  $('.js-example-basic-multiple').select2();

});
  committee_counter=0;
  function add_committee ()
  {
    let html=`<div  style="height:330px" id="div_committee[`+committee_counter+`]"><div class="form-group col-md-6 col-sm-6 col-xs-12" ><div class="form-group"><label class="col-md-12 col-sm-12">Committee Name<span class="required">*</span></label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control" name="committee[`+committee_counter+`][name]" id="committee[`+committee_counter+`][name]" required></div></div></div>
      <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[`+committee_counter+`]"><div class="form-group"><label class="col-md-12 col-sm-12">Reference</label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><select class="form-control js-example-basic-multiple" name="committee[`+committee_counter+`][map][]" multiple="multiple" id="committee[`+committee_counter+`][map]" required><option value="">Please select a reference committee</option> <option value="ARC">Audit, Risk &amp; Compliance Committee</option>
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
    <div style="clear:both" class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[`+committee_counter+`]"><div class="form-group"><label class="col-md-12 col-sm-12">Chair Fee</label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control number_only" name="committee[`+committee_counter+`][chair_fee]" id="committee[`+committee_counter+`][chair_fee]" required></div></div></div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[`+committee_counter+`]"><div class="form-group"><label class="col-md-12 col-sm-12">Member Fee</label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control number_only" name="committee[`+committee_counter+`][member_fee]" id="committee[`+committee_counter+`][member_fee]" required></div></div></div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[`+committee_counter+`]"><div class="form-group"><label class="col-md-12 col-sm-12">No of meetings<span class="required">*</span></label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control number_only" name="committee[`+committee_counter+`][no_of_meetings]" id="committee[`+committee_counter+`][no_of_meetings]" required ></div></div></div>
    <div class="form-group col-md-12 col-sm-12 col-xs-12" >

    <button type="button" class="btn btn-danger" style="margin-bottom: 0" name="div_committee[`+committee_counter+`]" onclick="remove_committee($(this))"><i class="fas fa-minus " title="Remove company" type="button"></i></button>
    <hr style="clear: both;display: block; border: 1px solid black;">

    </div>
      `;
    $('#committee_div').prepend( html );
    $('.right_col').height($('.right_col').height()+330);
  $('.js-example-basic-multiple').select2({
     placeholder: "Select the Reference Committee"
  });

    committee_counter++;
    $('.number_only').on('input',function(event) {
 var patt=/^[\d]+$/gm;
              if(!patt.test($(this).val())) {
               $(this).val($(this).val().replace(/[^\d]/g, '')); 
              
    }
    });
  }
   function remove_committee (clicked)
  {
    clicked.parent().parent().remove()
  }
</script>
 

@endsection