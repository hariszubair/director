@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{asset('public/css/select2.min.css')}}">

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Director</h3>
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
                    <table id="company" class="table table-bordered" width="100%" style="font-size: 12px;text-align: left">
                    <thead style="text-align: left;align-content: left">
                        <tr >
                          <th style="width: 5%">#</th>
                            <th class="th-sm" style="width: 40%">Name</th>
                            <th class="th-sm" style="width: 40%">Company Name</th>
                            <th class="th-sm" style="width: 15%">View</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: left;align-content: left">
                      @foreach($directors as $key=>$director)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$director->director_name}}</td>
                          <td>{{$director->company_name}}</td>
                          <td>
                            <a class="btn btn-success" href="./view_director/{{$director->director_id}}" class="btn btn-green">view</a>
                           
                            
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                    
                </table>
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


