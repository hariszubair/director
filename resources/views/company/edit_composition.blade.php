@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{asset('public/css/select2.min.css')}}">

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Committe Composition</h3>
              </div>

            </div>

            <div class="clearfix"></div>
 <form class="" action="{{route('store_composition')}}" method="post" >
                      @csrf
                    <input type="" name="company_id" value="{{$id}}" style="display: none">

              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Committe Composition</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <input type="text" name="composition_member" id='composition_member' value="{{$composition_member}}" style="display: none"> 
                     <input type="text" name="arr_committee" id='arr_committee' value="{{$arr_committee}}" style="display: none"> 
                    @foreach($committees as $committee )
                    <div style="clear: both">
                       <div class="form-group col-md-4 col-sm-4 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Committee<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                               <input class="form-control" value="{{$committee->name}}" readonly name="[{{$committee->id}}][name]">  
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-4 col-sm-4 col-xs-12" >
                                   
                                        <div class="form-group">
                                           @php
                                           if($composition_chairman->where('committee_id',$committee->id)->first()){
                                           $chairman=$composition_chairman->where('committee_id',$committee->id)->first()->director_id;
                                            }
                                            else{
                                            $chairman='';
                                          }                                        @endphp
                                            <label class="col-md-12 col-sm-12"> Chairman<span class="required">*</span></label>

                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control js-example-basic-single" name="chairman[{{$committee->id}}]" id="chairman[{{$committee->id}}]" required>
                                                  <option value="">Select a chairman</option>
                                                  @foreach($companies as $company)
                                                  <option {{$chairman   == $company->director->id ? 'selected' :''}} value="{{$company->director->id}}">{{$company->director->name}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-4 col-sm-4 col-xs-12" >
                                   
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Members<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control js-example-basic-multiple {{$committee->id}}" name="member[{{$committee->id}}][]" id="member[{{$committee->id}}][]" required multiple="multiple">
                                                  @foreach($companies as $company)
                                                  <option value="{{$company->director->id}}">{{$company->director->name}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                      </div>
                                      @endforeach
                                     
            
                  </div>
                </div>
              </div>
               <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Other Committees <button class="btn btn-success" onclick="other_committee()" type="button"><i class="fas fa-plus " title="Add company" ></i></button></h2>
                     <input type="type" name="count_membership" id="count_membership" value="{{count($other_membership)}}" style="display: none">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id="other_committee_div">
                    @foreach($other_membership as $key=>$membership)
                    <div id="div_committee[{{$key}}]"> 
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Director<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control " name="other[{{$key}}][director_id]" id="other[{{$key}}][director_id]" required>
                                                  <option value="">Select a director</option>
                                                  @foreach($companies as $company)
                                                  <option {{$membership->director_id == $company->director->id ? 'selected' : ''}} value="{{$company->director->id}}">{{$company->director->name}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-4 col-sm-4 col-xs-12" >
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Type<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control" name="other[{{$key}}][type]" id="other[{{$key}}][type]" required>
                                                  <option value="">Select type</option>
                                                  <option   {{$membership->type == 'Former Executive' ? 'selected' : ''}} value="Former Executive">Former Executive</option>
                                                  <option  {{$membership->type == 'Current Executive' ? 'selected' : ''}} value="Current Executive">Current Executive</option>
                                                  <option  {{$membership->type == 'Former Director' ? 'selected' : ''}} value="Former Director">Former Director</option>
                                                  <option  {{$membership->type == 'Current Director' ? 'selected' : ''}} value="Current Director">Current Director</option>
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-4 col-sm-4 col-xs-12" >
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Organization<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                               <input class="form-control" name="other[{{$key}}][organization]" id="other[{{$key}}][organization]" required value="{{$membership->organization}}">
                                            </div>
                                        </div>
                                      </div>
    
    <div class="form-group col-md-12 col-sm-12 col-xs-12" >

    <button class="btn btn-danger" style="margin-bottom: 0" name="div_committee[{{$key}}]" onclick="remove_other_committee($(this))" type="button"><i class="fas fa-minus " title="Remove company" ></i></button>
    <hr style="clear: both;display: block; border: 1px solid black;">

    </div>
                  </div>
                  @endforeach
                </div>
              </div>
                                      <button>update</button>
                                    </div>

            </form>
            </div>
          </div>
       

        <!-- /page content -->

@endsection


@section('footer')

    <script src="{{asset('public/js/select2.min.js')}}"></script>
<script type="text/javascript">
 $(document).ready(function(){
  $('.js-example-basic-single').select2();
  $('.js-example-basic-multiple').select2();
  var arr_committee=JSON.parse($('#arr_committee').val())
// console.log(arr_committee);
var temp=[];
  var composition_member=JSON.parse($('#composition_member').val())
$.each(arr_committee, function( index, committee ) {
  $('#member['+committee+']').select2();

  $.each(composition_member, function( index, member ) {
  if(member.committee_id==committee){
    temp.push(member.director_id);
  }

});

$('.js-example-basic-multiple.'+committee).val(temp).trigger('change');
// console.log(temp)
temp=[];
});



 })
  var other_committee_counter=$('#count_membership').val();

  function other_committee ()
  {
    let html=`<div id="div_committee[`+other_committee_counter+`]"> 
    <div class="form-group col-md-4 col-sm-4 col-xs-12" >
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Director<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control " name="other[`+other_committee_counter+`][director_id]" id="other[`+other_committee_counter+`][director_id]" required>
                                                  <option value="">Select a director</option>
                                                  @foreach($companies as $company)
                                                  <option value="{{$company->director->id}}">{{$company->director->name}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group col-md-4 col-sm-4 col-xs-12" >
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Type<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                                <select class="form-control " name="other[`+other_committee_counter+`][type]" id="other[`+other_committee_counter+`][type]" required>
                                                  <option value="">Select type</option>
                                                  <option value="Former Executive">Former Executive</option>
                                                  <option value="Current Executive">Current Executive</option>
                                                  <option value="Former Director">Former Director</option>
                                                  <option value="Current Director">Current Director</option>
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                       <div class="form-group col-md-4 col-sm-4 col-xs-12" >
                                        <div class="form-group">
                                            <label class="col-md-12 col-sm-12">Organization<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12">
                                               <input class="form-control" name="other[`+other_committee_counter+`][organization]" id="other[`+other_committee_counter+`][organization]" required>
                                            </div>
                                        </div>
                                      </div>
    
    <div class="form-group col-md-12 col-sm-12 col-xs-12" >

    <button class="btn btn-danger" style="margin-bottom: 0" name="div_committee[`+other_committee_counter+`]" onclick="remove_other_committee($(this))" type="button"><i class="fas fa-minus " title="Remove company" ></i></button>
    <hr style="clear: both;display: block; border: 1px solid black;">

    </div>
      `;
    $('#other_committee_div').prepend( html );
    $('.js-example-basic-single').select2();
  $('.js-example-basic-multiple').select2();
    other_committee_counter++;
  }
   function remove_other_committee (clicked)
  {
    clicked.parent().parent().remove()
  }

</script>

@endsection


