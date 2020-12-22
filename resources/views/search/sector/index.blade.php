@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{asset('public/css/select2.min.css')}}">

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Companies</h3>
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
                            <th class="th-sm" style="width: 10%">Company Name</th>
                            <th class="th-sm" style="width: 10%">Index</th>
                            <th class="th-sm" style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: left;align-content: left">
                      @foreach($companies as $key=>$company)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$company->name}}</td>
                          <td>{{$company->index}}</td>
                          <td style="padding: 0">

                             <form class="" action="{{route('result_company')}}" method="post" target="_blank">
                      @csrf
                   
                                <input name="company_id" id="company_id" required value="{{$company->id}}" style="display: none">
                        <button class="btn btn-success" >View</button>
                     
                  </form>
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


