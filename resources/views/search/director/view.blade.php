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
                    <h2>Peronal Info</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"> 
                    <div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Name<span class="required">*</span></label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control" value="{{$director->director->name}}" disabled></div></div></div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Gender<span class="required">*</span></label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
        <input class="form-control" value="{{$director->director->gender}}" readonly>
   
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Age</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control" value="{{$director->director->age}}" disabled>
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Qualification</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control"  value="{{$director->director->qualification}}" disabled>
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Institute</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control"  value="{{$director->director->institute}}" disabled>
    </div>
    </div>
    </div>
    
   

    <hr style="clear: both;display: block; border: 1px solid black;">
    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          

         <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Company Info</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"> 
                    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Company Name</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
     <input data-toggle="datepicker" class="form-control" value="{{$director->company_name}}" disabled>
    </div>
    </div>
    </div>
                    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Status</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
        <input class="form-control" value="{{$director->status}}" readonly>
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Board</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
        <input class="form-control" value="{{$director->board}}" readonly>
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Non Executive Type</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
        <input class="form-control" value="{{$director->ned_type}}" readonly>
    </div>
    </div>
    </div>
     <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Independent/ Non Independent</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
        <input class="form-control" value="{{$director->independent_type}}" readonly>
    </div>
    </div>
    </div>
     <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Joining Date</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input data-toggle="datepicker" class="form-control" value="{{$director->joining_date}}" disabled>
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Leaving Date</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input data-toggle="datepicker" class="form-control" value="{{$director->leaving_date}}" disabled  >
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Fee</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control decimal_only" value="{{$director->director_fee}}" disabled > 
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Superannuation</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input  class="form-control number_only" value="{{$director->superannuation}}" disabled >
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Other fee</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control number_only" value="{{$director->other_fee}}" disabled >
    </div>
    </div>
    </div>
     <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Committee fee</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control number_only" value="{{$director->committee_fee}}" disabled >
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Vested Share</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control number_only" value="{{$director->vested_share}}" disabled >
    </div>
    </div>
    </div>
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
    <div class="form-group">
    <label class="col-md-12 col-sm-12">Unvested Share</label>
    <div class="col-md-12 col-sm-12" style="display: inline-flex;">
    <input class="form-control number_only" value="{{$director->unvested_share}}" disabled >
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
                    <h2>Committee Member</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"> 
                    <table class="table table-bordered" width="100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Membership Type</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($director->director_committee as $key=>$committee)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$committee->name}}</td>
                          <td>{{$committee->type}}</td>
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


