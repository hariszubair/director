@extends('layouts.master')

@section('content')
    <link href="{{ asset('public/css/ion.rangeSlider.min.css')}}" rel="stylesheet">

<link rel="stylesheet" href="{{asset('public/css/select2.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
 <!-- page content -->
        <div class="right_col" role="main" style="min-height:100%;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Custom Search</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <!-- <h2>Search</h2> -->
                  If you don’t want any industry or sector or index, then don’t select anything from the sector, industry, index drop-down
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="" action="{{route('result_custom')}}" method="post" >
                      @csrf
                     <div class="col-md-12 col-sm-12 col-xs-12 form-group " >
                              <label class="col-md-4 col-sm-4 col-xs-12"  style="line-height: 35px;clear: both ">Sector:</label>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                  <select class="form-control js-example-basic-single" name="sector" id="sector"  tabindex="1" style="width: 100%">
                                  <option value="">Select Sector Name</option>

                                  @foreach($sector_industry as $sector_industry)
                                  <option  value="{{$sector_industry->sector}}"> {{$sector_industry->sector}}</option>
                                  @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group " >
                              <label class="col-md-4 col-sm-4 col-xs-12"  style="line-height: 35px;clear: both ">Industry:</label>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                  <select class="form-control js-example-basic-single" name="industry" id="industry"  tabindex="2" style="width: 100%">
                                 </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group " >
                              <label class="col-md-4 col-sm-4 col-xs-12"  style="line-height: 35px;clear: both ">Index:</label>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                  <select class="form-control js-example-basic-single" name="index" id="index"   tabindex="3" style="width: 100%">
                                    <option value="">Select Index</option>
                                    <option {{old('index') == 'ASX-50' ? 'selected' : ''  }} >ASX-50</option>
                                    <option {{old('index') == 'ASX-100' ? 'selected' : ''  }}>ASX-100</option>
                                    <option {{old('index') == 'ASX-200' ? 'selected' : ''  }}>ASX-200</option>
                                    <option {{old('index') == 'ASX-300' ? 'selected' : ''  }}>ASX-300</option>
                                 </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group " >
                              <label class="col-md-4 col-sm-4 col-xs-12"  style="line-height: 35px;clear: both ">Revenue:</label>
                               
                              <div class="col-md-8 col-sm-8 col-xs-12">
                        

                                <select id="range" class="form-control" name="range">
                                  <option value="">Please select revenue</option>
                                  <option  value="1/2-2">1/2 to 2 times</option>
                                  <option value="1/3-3">1/3 to 3 times</option>
                                  <option value="1/4-4">1/4 to 4 times</option>
                                  <option value="0">Custom Range</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group " id="custom_range" style="display: none">
                              <label class="col-md-4 col-sm-4 col-xs-12"  style="line-height: 35px;clear: both "></label>
                               
                              <div class="col-md-8 col-sm-8 col-xs-12" style="display: inline-flex;">
                        
<input  name="range_min" id="range_min" class="form-control number_only" style="width: 40%;margin-right: 5%" value="{{old('range_min') ? old('range_min')  : '0'  }}"> <span style="padding-top: 10px">to</span> <input  name="range_max" id="range_max" class="form-control number_only" style="width: 40%;margin-left: 5%" value="{{old('range_max') ? old('range_max')  : '0'  }}"> 
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group " >
                              <label class="col-md-4 col-sm-4 col-xs-12"  style="line-height: 35px;clear: both ">Revenue & Market Cap</label>
                               
                              <div class="col-md-8 col-sm-8 col-xs-12" style="padding-top: 10px">
                        
                                <input type="radio" id="and_operator" name="operator" value="1" {{old('operator')==1 ? 'checked'  : ''  }}>
<label for="and_operator">And</label>
<input type="radio" id="or_operator" name="operator" value="0" {{old('operator')==0 ? 'checked'  : ''  }}>
<label for="or_operator">Or</label><br>
                             <!--    <select id="operator" class="form-control" name="operator">
                                  <option value="">Please select and/or operator</option>
                                  <option value="1">AND</option>
                                  <option value="0">OR</option>
                                </select> -->
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group " >
                              <label class="col-md-4 col-sm-4 col-xs-12"  style="line-height: 35px;clear: both ">Market Cap:</label>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                        <select id="range_mar_cap" class="form-control" name="range_mar_cap">
                                  <option value="">Please select market cap</option>
                                  <option value="1/2-2">1/2 to 2 times</option>
                                  <option value="1/3-3">1/3 to 3 times</option>
                                  <option value="1/4-4">1/4 to 4 times</option>
                                  <option value="0">Custom Range</option>
                                </select>
                            </div>
                        </div>
                          <div class="col-md-12 col-sm-12 col-xs-12 form-group "  id="custom_range_mar_cap" style="display: none">
                              <label class="col-md-4 col-sm-4 col-xs-12"  style="line-height: 35px;clear: both "></label>
                              <div class="col-md-8 col-sm-8 col-xs-12" style="display: inline-flex;">
                        
<input  name="range_mar_cap_min" id="range_mar_cap_min" class="form-control number_only" style="width: 40%;margin-right: 5%" value="{{old('range_mar_cap_min') ? old('range_mar_cap_min')  : '0'  }}"> <span style="padding-top: 10px">to</span> <input  name="range_mar_cap_max" id="range_mar_cap_max" class="form-control number_only" style="width: 40%;margin-left: 5%" value="{{old('range_mar_cap_max') ? old('range_mar_cap_max')  : '0'  }}"> 
                            </div>
                        </div>
                  
                     <div class="col-md-12 col-sm-12 col-xs-12 form-group " >
                              <div class="col-md-8 col-sm-8 col-xs-12">
                            @if(Auth::user()->profile->membership_type != null)

                        <button  class="custom_button">Submit</button>
                        @else
                        <span style="font-size: 20px">Please pay to proceed</span>
                        @endif
                      </div>
                    </div>
                  </form>
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
      $(document).on('focus', '.select2.select2-container', function (e) {
  // only open on original attempt - close focus event should not fire open
  if (e.originalEvent && $(this).find(".select2-selection--single").length > 0) {
    $(this).siblings('select').select2('open');
  } 
});
     
 $(document).ready(function(){
  $('.js-example-basic-single').select2();
  if('<?php echo old('sector'); ?>'){
  $('#sector').val('<?php echo old('sector'); ?>').trigger('change');
}
if('<?php echo old('range'); ?>'){
  if('<?php echo old('range'); ?>' == 0){
    $('#custom_range').show();
  }
  else{
    $('#custom_range').hide();
  }
  $('#range').val('<?php echo old('range'); ?>');
}

if('<?php echo old('range_mar_cap'); ?>'){
  if('<?php echo old('range_mar_cap'); ?>' == 0){
    $('#custom_range_mar_cap').show();
  }
  else{
    $('#custom_range_mar_cap').hide();
  }
  $('#range_mar_cap').val('<?php echo old('range_mar_cap'); ?>');
}
  
});
 $('#sector').on('change', function (e) {
     $.ajax({url: "./search_industry",
      data: {sector:$('#sector').val()},
      type:'POST',
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
       success: function(result){
       $('#industry').empty();
       $('#industry').append($("<option value=''>Please Select a Industry</option>"));

        $.each(result, function( index, value ) {
       $('#industry').append($("<option value='"+value+"'>"+value+"</option>"))
        });
  },
   complete: function (data) {
      if('<?php echo old('industry'); ?>'){
// $('')
$('#industry').val('<?php echo old('industry'); ?>').trigger('change');

}
     }
});
});
 $('#range').on('change', function (e) {
  if($('#range').val()==0){
    $('#custom_range').show();
  }
  else{
    $('#custom_range').hide();
  }
  

 });
  $('#range_mar_cap').on('change', function (e) {

  if($('#range_mar_cap').val()==0){
    $('#custom_range_mar_cap').show();
  }
  else{
    $('#custom_range_mar_cap').hide();
  }
  

 });
</script>
@endsection


