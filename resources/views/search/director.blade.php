@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{asset('public/css/select2.min.css')}}">

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Director Search</h3>
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
                    <form class="" action="{{route('result_director')}}" method="post" >
                      @csrf
                     <div class="col-md-12 col-sm-12 col-xs-12 form-group " >
                              <label class="col-md-4 col-sm-4 col-xs-12"  style="line-height: 35px;clear: both ">Name:</label>
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                  <select class="form-control js-example-basic-single" name="director_name" id="director_name" required>
                                  <option value="">Select Director Name</option>

                                  @foreach($directors as $director)
                                  <option value="{{$director->name}}"> {{$director->name}}</option>
                                  @endforeach
                                 </select>
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
    <script type="text/javascript">
      $(document).on('focus', '.select2.select2-container', function (e) {
  // only open on original attempt - close focus event should not fire open
  if (e.originalEvent && $(this).find(".select2-selection--single").length > 0) {
    $(this).siblings('select').select2('open');
  } 
});
      document.addEventListener('invalid', (function () {
  return function (e) {
    e.preventDefault();
    document.getElementById("director_name").focus();
  };
})(), true);
 $(document).ready(function(){
  $('.js-example-basic-single').select2();

});
</script>
@endsection


