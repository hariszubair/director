@extends('layouts.master')

@section('content')
<style type="text/css">
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
<link rel="stylesheet" type="text/css" href="{{asset('public/css/buttons.dataTables.min.css')}}">

  <link rel="stylesheet" href="{{ asset('public/css/jquery.dataTables.min.css')}}">

<meta name="csrf-token" content="{{ csrf_token() }}">
 <!-- page content -->
        <div class="right_col" role="main" style="min-height:100%;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <!-- <h2>Search</h2> -->
                <h3>Companies</h3>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <table id="company" class="table table-bordered" width="100%" style="font-size: 12px;text-align: left">
                    <thead style="text-align: left;align-content: left">
                        <tr >
                          <th style="width: 5%">#</th>
                            <th class="th-sm" style="width: 15%">Name</th>
                            <th class="th-sm" style="width: 15%">Email</th>
                            <th class="th-sm" style="width: 15%">Phone</th>
                            <th class="th-sm" style="width: 15%">Company Name</th>
                            <th class="th-sm" style="width: 15%">Membership</th>
                            <th class="th-sm" style="width: 20%">Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: left;align-content: left">
                     
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
<script src="{{ asset('public/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('public/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('public/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('public/js/jszip.min.js')}}"></script>
<script src="{{asset('public/js/pdfmake.min.js')}}"></script>
<script src="{{asset('public/js/vfs_fonts.js')}}"></script>

     <script src="{{asset('public/js/dataTables.buttons.min.js')}}"></script>
     <script src="{{asset('public/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('public/js/buttons.print.min.js')}}"></script>
<script type="text/javascript">
   $( document ).ready(function() {
     $('#company').DataTable({
       dom: 'Bfrltip',
               buttons: [

           {
extend: 'excelHtml5',
text: '<i class="fa fa-file-excel-o"></i> Excel',
titleAttr: 'Export to Excel',
exportOptions: {
columns: ':not(:last-child,:first-child)',
}
},

{
extend: 'print',
exportOptions: {
columns: ':visible'
},
customize: function(win) {
$(win.document.body).find( 'table' ).find('td:last-child, th:last-child').remove();
}
}
        ],
        processing: true,
        serverSide: false,

        ajax: {
           headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
         url:'./ajax_companies' ,
           method: 'Post',
    },
        columns: [
      
       { "data": null,"sortable": false, 
       render: function (data, type, row, meta) {
                 return null;
                }
    },
       { "data": 'name','name':'name'},
       { "data": 'email','name':'email'},
       { "data": 'phone','name':'phone'},
       { "data": 'company_name','name':'company_name'},
      { "data": 'membership','name':'membership'},
      { "data": 'action','name':'action'},

        ],
        "order": [[ 1, "asc" ]],
        
        "initComplete": function( settings, json ) {
    $('.delete').click(function(){
    return confirm('Are you sure want to continue?');
});
  }
      
        
             
    });

});
  
</script>
   @endsection


