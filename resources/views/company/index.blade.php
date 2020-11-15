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
<meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('public/css/jquery.dataTables.min.css')}}">
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Company</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><a href="{{route('create_company')}}"><i class="fas fa-plus btn btn-success" title="Add company" ></i></a></h2>
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
                        <table id="company" class="table table-bordered" width="100%" style="font-size: 12px;text-align: left">
                    <thead style="text-align: left;align-content: left">
                        <tr >
                          <th style="width: 5%">#</th>
                            <th class="th-sm" style="width: 25%">Name</th>
                            <th class="th-sm" style="width: 10%">Code</th>
                            <th class="th-sm" style="width: 15%">index</th>
                            <th class="th-sm" style="width: 25%">industry</th>
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
<script type="text/javascript">
   $( document ).ready(function() {
     $('#company').DataTable({
        processing: true,
        serverSide: false,

        ajax: {
           headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
         url:'./ajax_index' ,
           method: 'Post',
    },
        columns: [
      
       { "data": null,"sortable": false, 
       render: function (data, type, row, meta) {
                 return null;
                }
    },
       { "data": 'name','name':'name'},
       { "data": 'code','name':'code'},
       { "data": 'index','name':'index'},
      { "data": 'industry','name':'industry'},
      { "data": 'action','name':'action'},
      { "data": 'id','name':'id'},

        ],
        "columnDefs": [
            {
                "targets": [ 6 ],
                "visible": false,
                "searchable": false
            },
        ],
        "order": [[ 6, "desc" ]]
     
        
             
    });

});
</script>
@endsection