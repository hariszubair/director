@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{asset('public/css/select2.min.css')}}">

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Company</h3>
              </div>

            </div>

            <div class="clearfix"></div>
             <form method="POST" action="{{route('update_company',['id'=>$company->id])}}" accept-charset="UTF-8" id="update_form">
                  <input name="_method" type="hidden" value="PATCH">
                  @csrf
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Basic Company Detail</h2>
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
                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                        <div class="form-group">
                                   
                                            <label class="col-md-12 col-sm-12">Name<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control js-example-basic-single" name="name" id="name" required tabindex="1">
                                                  <option value="">Please select an option</option>
                                                 @foreach($company_reference as $reference)
                                                 <option {{$company->code==$reference->code ? 'selected' : ''}} value="{{$reference->id}}">{{$reference->name}}</option>
                                                 @endforeach
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Index<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="index" id="index" required value="{{$company->index}}" tabindex="2">
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Industry<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="industry" id="industry" required value="{{$company->industry}}" tabindex="3">
                                                  
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                       <div class="form-group">
                                            <label class="col-md-12 col-sm-12">No. of employees<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <input type='text' id="no_of_employees" name="no_of_employees" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  class="form-control" required value="{{$company->no_of_employees}}" tabindex="4">
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Minimum share for Chief Executive</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_c_e" id="min_share_c_e" value="{{$company->min_share_c_e}}" tabindex="5">
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for Chief Executive</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_time_c_e" id="min_share_time_c_e" value="{{$company->min_share_time_c_e}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' tabindex="6" >
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Minimum share for other executives</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_o_e" id="min_share_o_e" value="{{$company->min_share_o_e}}" tabindex="7">
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for other executives</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_time_o_e" id="min_share_time_o_e" value="{{$company->min_share_time_o_e}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' tabindex="8">
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Minimum share for non executives</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_n_e" id="min_share_n_e" value="{{$company->min_share_n_e}}" tabindex="9">
                                            </div>
                                        </div>
                                      </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Time to achieve minimum share for non executives</label>
                                            <div class="col-md-12 col-sm-12">
                                                <input class="form-control" name="min_share_time_n_e" id="min_share_time_n_e" value="{{$company->min_share_time_n_e}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57' tabindex="10">
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
                    <h2>Committes <button class="btn btn-success" onclick="add_committee()" type="button"><i class="fas fa-plus " title="Add company" ></i></button></h2>
                    <input type="type" name="count_committee" id="count_committee" value="{{count($company->committee)}}" style="display: none">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id='committee_div'>

                    @foreach($company->committee as $key=>$committee)
                     <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee[{{$key}}]">
                      <div class="form-group">
                        <label class="col-md-12 col-sm-12">Committee Name<span class="required">*</span></label>
                        <div class="col-md-12 col-sm-12" style="display: inline-flex;">
                          <input class="form-control" name="committee[{{$key}}]" id="commitee[{{$key}}]" required value="{{$committee->name}}">
                          <button class="btn btn-danger" style="margin-bottom: 0" name="div_committee[{{$key}}]" onclick="remove_committee($(this))"><i class="fas fa-minus " title="Add company" type="button"></i></button>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
             <button class="btn btn-success" type="submit">Update</button>
          </form>

          </div>
        </div>
       

        <!-- /page content -->

@endsection



@section('footer')
    <script src="{{asset('public/js/select2.min.js')}}"></script>

<script type="text/javascript">
  var counter=$('#count_committee').val();  
 $(document).ready(function(){
  $('.js-example-basic-single').select2();
 })
  function add_committee ()
  {
    $('#committee_div').append( ' <div class="form-group col-md-6 col-sm-6 col-xs-12" id="div_committee['+counter+']"><div class="form-group"><label class="col-md-12 col-sm-12">Committee Name<span class="required">*</span></label><div class="col-md-12 col-sm-12" style="display: inline-flex;"><input class="form-control" name="committee['+counter+']" id="commitee['+counter+']" required><button class="btn btn-danger" style="margin-bottom: 0" name="div_committee['+counter+']" onclick="remove_committee($(this))"><i class="fas fa-minus " title="Add company" type="button"></i></button></div></div></div>' );
    counter++;
  }
  function remove_committee (clicked)
  {
    clicked.closest('div').parent().parent().remove()
  }
</script>
@endsection 