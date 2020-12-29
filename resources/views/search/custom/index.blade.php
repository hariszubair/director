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
                    <p><font size="2" color="red">* are preselected companies</font></p>
                    <div class="btn-group pull-left" role="group">

     <button id="btnHidden" class="btn btn-default"  type="button" style="margin:5px">Filtered</button>
     <button id="btnAll" class="btn btn-default"  type="button" style="margin:5px">All</button>
                            <div class="col-md-12 form-row form-inline">
                                 <button type="button" id="none" class="btn btn-primary" title="Uncheck All" style="float: right;margin: 5px">
                                    <i class="far fa-square"></i>
                                </button>
                                 <button type="button" id="all" class="btn btn-primary" title="Check All" style="float: right;margin: 5px">
                                  <i class="far fa-check-square"></i>
                                </button>
                              

                               
                            </div>
                     
  </div>  <span id='text_message'><b>{{$count_companies}} companies are selected</b></span>
  <input type="" id='selected_companies' value="{{$count_companies}}" style="display: none">
   <form class="" action="{{route('result_custom_final')}}" method="post" target="_blank">
    @csrf
    <div style="max-height: 500px;overflow: scroll;">

                    <table id="company" class="table table-bordered" width="100%" style="font-size: 12px;text-align: left;">
                    <thead style="text-align: left;align-content: left">
                        <tr >
                            <th class="th-sm" style="width: 25%">Company Name</th>
                            <th class="th-sm" style="width: 15%">Sector</th>
                            <th class="th-sm" style="width: 15%">Industry</th>
                            <th class="th-sm" style="width: 20%">Revenue</th>
                            <th class="th-sm" style="width: 20%">Market Cap</th>
                            <th class="th-sm" style="width: 10%">Available</th>
                            <th class="th-sm" style="width: 5%">Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: left;align-content: left">
                      @foreach($companies as $key=>$company)
                        <tr>
                          <td>{{$company['name']}} ({{$company['index']}}) <font color="red" size="4">{{$company['action']== 1 ? '*': '' }}</font></td>
                          <td>{{$company['sector']}}</td>
                          <td>{{$company['industry']}}</td>
                          <td>${{$company['revenue']}}</td>
                          <td>${{$company['market_cap']}}</td>
                          <td>{{$company['action']== 1 ? 'Available' : 'x' }}</td>
                          <td>
                          <input name="company_id[]" class="selected_companies" type="checkbox" {{$company['action']== 1 ? 'checked' : '' }} value="{{$company['id']}}" ></td>
                        </tr>
                      @endforeach
                    </tbody>
                    
                </table>
                 
</div>
<button type="submit" class="btn btn-success" >Proceed</button>
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
       $(document).ready(function(){
   $('#company').DataTable( {
    dom:'ft',
     "pageLength": -1,
        "order": [[ 3, "asc" ]],
        rowCallback: function( row, data, index ) {
    if (data[3] === 'x' && $("#btnHidden").hasClass("active")) {
        $(row).hide();
    }
    else{
       $(row).show();
    }
},
"columnDefs": [
            {
                "targets": [5],
                "visible": false,
                "searchable": false
            },
            
        ]
   
    } );

});
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
/*
**
**          Hidde un hide rows
*/

$("#btnHidden").addClass("active");
$("#btnHidden").focus();

 
 $("#btnAll").on('click', function () {
       $("#btnHidden").removeClass("active");
       $("#btnAll").addClass("active");
$('#company').DataTable().draw()
});
 
$("#btnHidden").on('click', function () {
       $("#btnAll").removeClass("active");
       $("#btnHidden").addClass("active");
$('#company').DataTable().draw()
});
 $('#all').click(function(){
  $('input[type="checkbox"]').prop('checked', true)
       $('#text_message').html('<b>'+$('input[type="checkbox"]:checked').length+ ' companies are selected.</b>')

      });
      $('#none').click(function(){
       $('input[type="checkbox"]').prop('checked', false)
       $('#text_message').html('<b>0 company is selected.</b>')
      });
      $(".selected_companies").change(function(){
        if($('input[type="checkbox"]:checked').length < 2){
           $('#text_message').html('<b>'+$('input[type="checkbox"]:checked').length+ ' company is selected.</b>')
        }
        else{
           $('#text_message').html('<b>'+$('input[type="checkbox"]:checked').length+ ' companies are selected.</b>')
        }
       
        $('#selected_companies').val($('input[type="checkbox"]:checked').length);
});
</script>
@endsection

