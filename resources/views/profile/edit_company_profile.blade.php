@extends('layouts.master')

@section('content')
<style type="text/css">
  .select2-container .select2-selection--single .select2-selection__rendered {
        padding-left: 50px !important;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered {

    /*color: #9b757d !important;*/
  }

footer {
     margin-left: 0px;
     bottom: 0 
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
 
            <div class="row">
              <form  method="post" action="../edit_company_profile" >
                  {!! csrf_field() !!}
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profile</h2>

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
                     <input type="text" class="form-control has-feedback-left" id="id" name="id" placeholder="Company Name" value="{{$user->id}}" style="display: none;">
                   
                  <div class="item form-group" title="Name">
                     <div class="col-md-3 col-sm-3  form-group has-feedback" style="text-align: right;padding-top: 10px;font-weight: bold">
                        Name:  
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" id="name" name="name"  placeholder="Name" required="required" value="{{$user->profile->name}}">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="item form-group" title="Phone #">
                      <div class="col-md-3 col-sm-3  form-group has-feedback" style="text-align: right;padding-top: 10px;font-weight: bold">
                        Phone:  
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                     <input type="tel" class="form-control number_only has-feedback-left" id="phone" name="phone" placeholder="Phone" value="{{$user->profile->phone}}">
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="item form-group" title="Company Name">
                      <div class="col-md-3 col-sm-3  form-group has-feedback" style="text-align: right;padding-top: 10px;font-weight: bold">
                        Company Name:  
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                     <input type="text" class="form-control has-feedback-left" id="company_name" name="company_name" placeholder="Company Name" value="{{$user->profile->company_name}}">
                      <span class="far fa-building form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="item form-group" title="Sale Revenue">
                     <div class="col-md-3 col-sm-3  form-group has-feedback" style="text-align: right;padding-top: 10px;font-weight: bold">
                        Sale Revenue:  
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left number_only" id="sale_revenue" name="sale_revenue"  placeholder="Sale Revenue" required="required" value="{{$user->profile->sale_revenue}}">
                      <span class="fas fa-dollar-sign form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="item form-group" title="Market Capital">
                     <div class="col-md-3 col-sm-3  form-group has-feedback" style="text-align: right;padding-top: 10px;font-weight: bold">
                        Market Cap:  
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left number_only" id="market_cap" name="market_cap"  placeholder="Market Capital" required="required" value="{{$user->profile->market_cap}}">
                      <span class="fas fa-funnel-dollar form-control-feedback left" aria-hidden="true"></span>
                    </div>

                  </div>
                   <div class="item form-group" title="Sector">
                      <div class="col-md-3 col-sm-3  form-group has-feedback" style="text-align: right;padding-top: 10px;font-weight: bold">
                        Sector:  
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                     <select type="text" class="form-control has-feedback-left js-example-basic-single" id="sector" name="sector" placeholder="Sector">
                      <option>Please Select a Sector</option>
                       @foreach($sector as $value)
                       <option {{$user->profile->sector == $value ? "selected" : ""}} value="{{$value}}">{{$value}}</option>
                       @endforeach
                     </select>
                      <span class="fas fa-bezier-curve form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="item form-group" title="Industry">
                      <div class="col-md-3 col-sm-3  form-group has-feedback" style="text-align: right;padding-top: 10px;font-weight: bold">
                        Industry:  
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                      <select type="text" class="form-control has-feedback-left js-example-basic-single" id="industry" name="industry" placeholder="Industry" title="Industry">
                      <option>Please Select a Industry</option>
                       @foreach($industry as $value)
                       <option {{$user->profile->industry == $value ? "selected" : ""}}  value="{{$value}}">{{$value}}</option>
                       @endforeach
                     </select>
                      <span class="fas fa-industry form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                    @if(Auth::user()->hasRole('Administrator'))
                  <div class="item form-group">
                      <div class="col-md-3 col-sm-3  form-group has-feedback" style="text-align: right;padding-top: 10px;font-weight: bold">
                        Membership Type:  
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <select type="text" class="form-control has-feedback-left js-example-basic-single" id="membership_type" name="membership_type" placeholder="Sector">
                      <option>Please Select a Membership type</option>
                       <option  {{$user->profile->membership_type == 100 ? 'selected' : ''}} value="100">Free Mode</option>
                       <option  {{$user->profile->membership_type == 1 ? 'selected' : ''}} value="1">One Time Search</option>
                       <option  {{$user->profile->membership_type == 6 ? 'selected' : ''}} value="6">Six Month</option>
                       <option  {{$user->profile->membership_type == 12 ? 'selected' : ''}} value="12">One Year</option>
                     </select>
                      <span class="fa fa-user-plus form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                   <div class="item form-group">
                      <div class="col-md-3 col-sm-3  form-group has-feedback" style="text-align: right;padding-top: 10px;font-weight: bold">
                        Membership Expiry:  
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                     <input type="date" class="form-control has-feedback-left" id="membership_time" name="membership_time" placeholder="Company Name" value="{{$user->profile->membership_time}}">
                      <span class="far fa-clock form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                  @endif
                  </div>
                </div>
              </div>
                <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Committees </h2>
                    <button type="button" style="margin-left: 5px" class="btn btn-success" onclick="add_committee()" title="Add a committee"> Add More</button>
                    <div class="clearfix"></div>
                  </div>
                 <div class="x_content" id='committee_div'>
                  @foreach($user->committees as  $key=>$committee)
                  <div   id="div_committee[{{$key}}]"><div class="form-group col-md-6 col-sm-6 col-xs-12" ><div class="form-group"><label class="col-md-12 col-sm-12">Committee Name<span class="required">*</span></label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control" name="committee[{{$key}}][name]" id="committee[{{$key}}][name]" required value="{{$committee->name}}"></div></div></div>
      <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[{{$key}}]"><div class="form-group"><label class="col-md-12 col-sm-12">Reference</label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><select class="form-control js-example-basic-multiple {{$key}}" name="committee[{{$key}}][map][]" multiple="multiple" id="committee[{{$key}}][map]" required><option value="">Please select a reference committee</option> <option value="ARC">Audit, Risk & Compliance Committee</option>
<option value="AUC">Audit & Compliance Committee</option>
<option value="AUD">Audit Committee</option>
<option value="AUR">Audit & Risk Management Committee</option>
<option value="COG">Corporate Governance Committee</option>
<option value="NOM">Nomination Committee</option>
<option value="OHS">Health, Safety & Environment Committee</option>
<option value="HRS">Human Resources Committee</option>
<option value="NOR">Nomination & Remuneration Committee</option>
<option value="REM">Remuneration Committee</option>
<option value="RIS">Risk Committee</option>
<option value="ACQ">Mergers & Acquisition Committee</option>
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
    <div style="clear:both" class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[{{$key}}]"><div class="form-group"><label class="col-md-12 col-sm-12">Chair Fee</label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control number_only" name="committee[{{$key}}][chair_fee]" id="committee[{{$key}}][chair_fee]" required value="{{$committee->chair_fee}}"></div></div></div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[{{$key}}]"><div class="form-group"><label class="col-md-12 col-sm-12">Member Fee</label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control number_only" name="committee[{{$key}}][member_fee]" id="committee[{{$key}}][member_fee]" required value="{{$committee->member_fee}}"></div></div></div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[{{$key}}]"><div class="form-group"><label class="col-md-12 col-sm-12">No of meetings<span class="required">*</span></label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control number_only" name="committee[{{$key}}][no_of_meetings]" id="committee[{{$key}}][no_of_meetings]" required value="{{$committee->no_of_meetings}}"></div></div></div>
    <div class="form-group col-md-12 col-sm-12 col-xs-12" >

    <button type="button" class="btn btn-danger" style="margin-bottom: 0" name="div_committee[{{$key}}]" onclick="remove_committee($(this))">Remove</button>
    <hr style="clear: both;display: block; border: 1px solid black;">

    </div>
                  <div style="clear: both">
                  </div>
                  </div>
                  @endforeach

                </div>
                    <button class="btn btn-success">Submit</button>

              </div>
            </div>
                  </form>

          </div>

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
  committee_counter=0;

  $(document).ready(function(){
      $('.js-example-basic-single').select2();
  $('.js-example-basic-multiple').select2();
    var committee=<?php echo $user->committees ?>;
    if(committee.length > 0){

      $.each( committee, function( key, value ) {
        committee_counter++
        console.log(value.map.replace(/[^a-zA-Z,]/g, '').split(','))
$('.js-example-basic-multiple.'+key).val(value.map.replace(/[^a-zA-Z,]/g, '').split(',')).trigger('change');
});
   
    }

});
  function add_committee ()
  {
    let html=`<div  id="div_committee[`+committee_counter+`]"><div class="form-group col-md-6 col-sm-6 col-xs-12" ><div class="form-group"><label class="col-md-12 col-sm-12">Committee Name<span class="required">*</span></label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control" name="committee[`+committee_counter+`][name]" id="committee[`+committee_counter+`][name]" required></div></div></div>
      <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[`+committee_counter+`]"><div class="form-group"><label class="col-md-12 col-sm-12">Reference</label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><select class="form-control js-example-basic-multiple `+committee_counter+`" name="committee[`+committee_counter+`][map][]" multiple="multiple" id="committee[`+committee_counter+`][map]" required><option value="">Please select a reference committee</option> <option value="ARC">Audit, Risk &amp; Compliance Committee</option>
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