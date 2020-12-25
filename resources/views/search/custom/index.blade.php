@extends('layouts.master')

@section('content')
<style type="text/css">
        input:focus, select:focus, textarea:focus,  option:focus {
            background-color: #E5E4DE ;
            }
            body
{
    counter-reset: Serial;           /* Set the Serial counter to 0 */
}


tr td:first-child:before
{
  counter-increment: Serial;      /* Increment the Serial counter */
  content: counter(Serial); /* Display the counter */
}
 </style>
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
                     
  </div>  
  <form id='form_companies' method="POST">

                    <table id="company" class="table table-bordered" width="100%" style="font-size: 12px;text-align: left">
                    <thead style="text-align: left;align-content: left">
                        <tr >
                          <th style="width: 5%">#</th>
                            <th class="th-sm" style="width: 30%">Company Name</th>
                            <th class="th-sm" style="width: 20%">Index</th>
                            <th class="th-sm" style="width: 10%">Available</th>
                            <th class="th-sm" style="width: 5%">Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: left;align-content: left">
                      @foreach($companies as $key=>$company)
                        <tr>
                          <td></td>
                          <td>{{$company['name']}}</td>
                          <td>{{$company['index']}}</td>
                          <td>{{$company['action']== 1 ? 'Available' : 'x' }}</td>
                          <td><input type="checkbox" {{$company['action']== 1 ? 'checked' : '' }} ></td>
                        </tr>
                      @endforeach
                    </tbody>
                    
                </table>
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
                "targets": [ 3 ],
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
          var allInputs = $( "form#form_companies :input[type='checkbox']" ).filter(function(){
        return  $(this).is(':visible') ;
    });;
          allInputs.prop('checked', true);
          
           // $( "input" ).value()="on";
      });
      $('#none').click(function(){
          var allInputs = $( "form#form_companies :input[type='checkbox'] " ).filter(function(){
        return  $(this).is(':visible') ;
    });
          allInputs.prop('checked', false);
          
           // $( "input" ).value()="on";
      });
</script>
@endsection


