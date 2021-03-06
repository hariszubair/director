@extends('layouts.master')

@section('content')
 <!-- page content -->
        <div class="right_col" role="main" style="min-height: 800px">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Home</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
               <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div class="" style="float: right;padding: 10px 10px 10px 0"><i class="far fa-building fa-3x" style="color: #bab8b8"></i>
                          </div>

                          <div class="count">{{App\Models\Company::count()}}</div>
<div >
                          <h3>Companies</h3></div>
                        </div>
                      </div>
                       <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div style="float: right;padding: 10px 10px 10px 0"><i class="fas fa-users fa-3x" style="color: #bab8b8"></i>
                          </div>
                          <div class="count">{{App\Models\Director::count()}}</div>

                          <h3>Directors</h3>
                        </div>
                      </div>
                       <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div style="float: right;padding: 10px 10px 10px 0"><i class="fas fa-bezier-curve fa-3x" style="color: #bab8b8"></i>
                          </div>
                          <div class="count">{{count($sector)}}</div>

                          <h3>Sectors</h3>
                        </div>
                      </div>
                       <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
                        <div class="tile-stats">
                          <div style="float: right;padding: 10px 10px 10px 0"><i class="fas fa-industry fa-3x" style="color: #bab8b8"></i>
                          </div>
                          <div class="count">{{App\Models\Industry::groupBy('industry')->count()}}</div>

                          <h3>Industries</h3>
                        </div>
                      </div>
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    @hasanyrole('Director|Company')
                    <h2>Search By Following</h2>
                     @endhasanyrole

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
                    
                    <ol style="list-style: none">
                    @hasanyrole('Director|Company')

                      <li>
                        <a href="search_director"><h2>Director Name</h2></a>
                      </li>
                      <li>
                        <a href="search_company"><h2>Company Name</h2></a>
                      </li>
                     @endhasanyrole
                    @hasrole('Company')
                      <li>
                        <a href="search_sector"><h2>Sector/Industry</h2></a>
                      </li>
                      <li>
                        <a href="search_custom"><h2>Customised</h2></a>
                      </li>
                      @endhasrole
                    </ol>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

@endsection


@section('footer')

<script src="{{ asset('public/js/Chart.bundle.min.js') }}"></script>
<script type="text/javascript">
$( document ).ready(function() {

  var unregistered=1
var registered=1

var directors = document.getElementById("directors").getContext('2d');
var myChart2 = new Chart(directors, {
  type: 'doughnut',
  data: {
    labels: ['Registered','Unregistered'],
    datasets: [{
      backgroundColor: [
        "#2ecc71",
        "red"
      ],
      data: [1,1]
    }]
  },

});
});
</script>
@endsection