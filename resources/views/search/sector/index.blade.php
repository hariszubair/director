@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{asset('public/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/css/jquery.dataTables.min.css')}}">

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
                       <form class="" action="{{route('result_sector_final')}}" method="post" >
                      @csrf

                    <table id="company" class="table table-bordered" width="100%" style="font-size: 12px;text-align: left">
                    <thead style="text-align: left;align-content: left">
                        <tr >
                          <th style="width: 5%">#</th>
                            <th class="th-sm" style="width: 10%">Company Name</th>
                            <th class="th-sm" style="width: 10%">Sector</th>
                            <th class="th-sm" style="width: 10%">Industry</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: left;align-content: left">
                      @foreach($companies as $key=>$company)
                        <input name="company_id[]" id="company_id" required value="{{$company->id}}" type="checkbox" checked style="display: none;">
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$company->name}} ({{$company->index}})</td>
                          <td>{{$company->sector}}</td>
                          <td>{{$company->industry}}</td>
                       
                        </tr>
                      @endforeach
                    </tbody>
                    
                </table>
                 @if(Auth::user()->profile->membership_type != null)
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group " >
                              <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="" name="sector" id="sector" value="{{$request->sector}}" style="display: none;">
                                <input type="" name="industry" id="industry" value="{{$request->industry}}" style="display: none;">

                <button type="submit" class="btn btn-success" >Proceed</button>
                      </div>
                    </div>
                            @else
                            <a href="#" class="btn btn-success">Please Pay to View</a>
                            
                            @endif
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
<script src="{{ asset('public/js/jquery.dataTables.min.js')}}"></script>

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
    $('#company').DataTable( {

    });
});
</script>
@endsection


