@extends('layouts.master')

@section('content')
 <!-- page content -->
        <div class="right_col" role="main" style="min-height: 800px">
            <div class="page-title">
              <div class="title_left">
                <h3>Home</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">

                    
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
                  
                  <div class="x_content">
                   
                    @hasrole('Administrator')
            <div class="row" style="clear: both;">

                    <input type="" name="partial_director" id="partial_director" value="{{$partial_director}}" style="display: none;">
                    <input type="" name="complete_director" id="complete_director" value="{{$complete_director}}" style="display: none;">
                    <input type="" name="partial_company" id="partial_company" value="{{$partial_company}}" style="display: none;">
                    <input type="" name="complete_company" id="complete_company" value="{{$complete_company}}" style="display: none;">
                       
                         <div class="col-lg-6" >
                                <div class="au-card chart-percent-card" style="height: 450px">
                                    <div class="au-card-inner" style="text-align: center;">
                                        <h3 class="title-2 tm-b-4" style="font-size: 18px">Complete/In-Progress Directors</h3>
                                        <div class="row no-gutters">
                                            <canvas id="directors" >
                                                
                                            </canvas> 
                                        </div>
                                        <div style="padding-top: 10px;font-weight: bold; font-size: 22px">
                                        {{App\Models\User::whereHas("roles", function($q){ $q->where("name", "Director");})->count()}} Directors
                                      </div>
                                    </div>
                                   
                                </div>
                            </div>  
                            <div class="col-lg-6" >
                                <div class="au-card chart-percent-card" style="height: 450px">
                                    <div class="au-card-inner" style="text-align: center;">
                                        <h3 class="title-2 tm-b-4" style="font-size: 18px">Complete/In-Progress Companies</h3>
                                        <div class="row no-gutters">
                                            <canvas id="companies" >
                                                
                                            </canvas> 
                                        </div>
                                        <div style="padding-top: 10px;font-weight: bold; font-size: 22px">
                                         {{App\Models\User::whereHas("roles", function($q){ $q->where("name", "Company");})->count()}} Companies
                                         </div>
                                    </div>
                                   
                                </div>
                            </div>
                  
                      @endhasrole


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
</div>
@endsection


@section('footer')

<script src="{{ asset('public/js/Chart.bundle.min.js') }}"></script>
<script type="text/javascript">
$( document ).ready(function() {

  var unregistered_directors=$('#partial_director').val();
var registered_directors=$('#complete_director').val();

var directors = document.getElementById("directors").getContext('2d');
var myChart2 = new Chart(directors, {
  type: 'doughnut',
  data: {
    labels: ['Complete','In-Progress'],
    datasets: [{
      backgroundColor: [
        "#455c73",
        "#bdc3c7"
      ],
      data: [registered_directors,unregistered_directors]
    }]
  },

});
var unregistered_companies=$('#partial_company').val();
var registered_companies=$('#complete_company').val();

var companies = document.getElementById("companies").getContext('2d');
var myChart2 = new Chart(companies, {
  type: 'doughnut',
  data: {
    labels: ['Complete','In-Progress'],
    datasets: [{
      backgroundColor: [
        "#26b99a",
        "#9b59b6"
      ],
      data: [registered_companies,unregistered_companies]
    }]
  },

});
});
</script>
@endsection