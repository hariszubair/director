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
                                  <option value="{{$sector_industry->sector}}"> {{$sector_industry->sector}}</option>
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
                                    <option>ASX-50</option>
                                    <option>ASX-100</option>
                                    <option>ASX-200</option>
                                    <option>ASX-300</option>
                                 </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group " >
                              <label class="col-md-4 col-sm-4 col-xs-12"  style="line-height: 35px;clear: both "><br>Revenue:</label> <span style="font-size: 12px;padding-left: 10px" > Adjust the range by clicking the bar</span>
                               
                              <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" id="range_27" value="" name="range" />
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group " >
                              <label class="col-md-4 col-sm-4 col-xs-12"  style="line-height: 35px;clear: both ">Market Cap:</label>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" id="range_mar_cap" value="" name="range_mar_cap" />
                            </div>
                        </div>
                  
                     <div class="col-md-12 col-sm-12 col-xs-12 form-group " >
                              <div class="col-md-8 col-sm-8 col-xs-12">
                        <button class="btn btn-success">Submit</button>
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
    <script src="{{ asset('public/js/ion.rangeSlider.min.js')}}"></script>

    <script type="text/javascript">
      $(document).on('focus', '.select2.select2-container', function (e) {
  // only open on original attempt - close focus event should not fire open
  if (e.originalEvent && $(this).find(".select2-selection--single").length > 0) {
    $(this).siblings('select').select2('open');
  } 
});
     
 $(document).ready(function(){
  $('.js-example-basic-single').select2();
  $("#range").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 1000,
        from: 200,
        to: 800,
        prefix: "$"
    });
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
       $('#industry').append($("<option value="+value+">"+value+"</option>"))
        });
  }
});
});
</script>
@endsection


