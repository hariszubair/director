@extends('layouts.master')

@section('content')
<style type="text/css">
  .select2-container .select2-selection--single .select2-selection__rendered {
        padding-left: 50px !important;
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered {

    /*color: #9b757d !important;*/
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
                    <form  method="post" action="../edit_director_profile" >
                  {!! csrf_field() !!}
                     <input type="text" class="form-control has-feedback-left" id="id" name="id" placeholder="Company Name" value="{{$user->id}}" style="display: none;">

                  <div class="item form-group" title="Name">
                      <div class="col-md-3 col-sm-3  form-group has-feedback">
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                      <input type="text" class="form-control has-feedback-left" id="name" name="name"  placeholder="Name" required="required" value="{{$user->profile->name}}">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="item form-group"  title="Phone #">
                      <div class="col-md-3 col-sm-3  form-group has-feedback">
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                     <input type="tel" class="form-control number_only has-feedback-left" id="phone" name="phone" placeholder="Phone" value="{{$user->profile->phone}}">
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="item form-group">
                      <div class="col-md-3 col-sm-3  form-group has-feedback">
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
                     <input type="text" class="form-control has-feedback-left" id="company_name" name="company_name" placeholder="Company Name" value="{{$user->profile->company_name}}">
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
                       <option {{$user->profile->sector == $value ? 'selected' : ''}} value="{{$value}}">{{$value}}</option>
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
                       <option  {{$user->profile->industry == $value ? 'selected' : ''}} value="{{$value}}">{{$value}}</option>
                       @endforeach
                     </select>
                      <span class="fas fa-industry form-control-feedback left" aria-hidden="true"></span>
                    </div>
                  </div>
                   <div class="item form-group">
                      <div class="col-md-3 col-sm-3  form-group has-feedback">
                      </div>
                      <div class="col-md-6 col-sm-6  form-group has-feedback">
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
  $(document).ready(function(){
  $('.js-example-basic-single').select2();
});
</script>
 

@endsection