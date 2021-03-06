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
                <h3>Reports</h3>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <table id="company" class="table table-bordered" width="100%" style="font-size: 12px;text-align: left">
                    <thead style="text-align: left;align-content: left">
                        <tr >
                          <th style="width: 5%">#</th>
                            <th class="th-sm" style="width: 15%">Title</th>
                            <th class="th-sm" style="width: 15%">Generated On</th>
                            <th class="th-sm" style="width: 15%">View</th>
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
<script type="text/javascript">
   $( document ).ready(function() {
     $('#company').DataTable({
        processing: true,
        serverSide: false,

        ajax: {
           headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
         url:'./ajax_reports' ,
           method: 'Post',
    },
        columns: [
      
       { "data": null,"sortable": false, 
       render: function (data, type, row, meta) {
                 return null;
                }
    },
       { "data": 'title','name':'title'},
       { "data": 'generated_on','name':'created_at'},
       { "data": 'view','name':'view'},
        ],
         "order": [[ 2, 'desc' ]]
      
        
             
    });

});
</script>
   @endsection


