<style>
table,th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
.page-break-avoid {
    page-break-inside: avoid;
}
.page-break {
    page-break-after: always;
}
</style>
 <!-- page content -->
        <div class="right_col" role="main" style="min-height:100%;">
          <div class="">
            

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <!-- <h2>Search</h2> -->
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" >
                    <div class="col-md-12 col-sm-12" >
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Company Details</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                <table class="table table-bordered" width="100%" >
                  <thead>
                    <tr>
                       <th></th>
                    <th>25th percentile</th>
                    <th>50th percentile</th>
                    <th>75th percentile</th>
                    <th>Average</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>Market Cap</th>
                      <td>${{number_format($percentile_market_cap['25'])}}</td>
                      <td>${{number_format($percentile_market_cap['50'])}}</td>
                      <td>${{number_format($percentile_market_cap['75'])}}</td>
                      <td>${{number_format(($percentile_market_cap['25']+$percentile_market_cap['50']+$percentile_market_cap['75'])/3)}}</td>
                    </tr>
                     <tr>
                      <th>Revenue</th>
                      <td>${{number_format($percentile_revenue['25'])}}</td>
                      <td>${{number_format($percentile_revenue['50'])}}</td>
                      <td>${{number_format($percentile_revenue['75'])}}</td>
                      <td>${{number_format(($percentile_revenue['25']+$percentile_revenue['50']+$percentile_revenue['75'])/3)}}</td>
                    </tr>
                    <tr>
                      <th>EPS</th>
                      <td>{{$percentile_basic_eps['25']}}</td>
                      <td>{{$percentile_basic_eps['50']}}</td>
                      <td>{{$percentile_basic_eps['75']}}</td>
                      <td>{{round(($percentile_basic_eps['25']+$percentile_basic_eps['50']+$percentile_basic_eps['75'])/3 , 2)}}</td>
                    </tr>
                    <tr>
                      <th>No. of employees</th>
                      <td>{{number_format($percentile_no_of_employees['25'])}}</td>
                      <td>{{number_format($percentile_no_of_employees['50'])}}</td>
                      <td>{{number_format($percentile_no_of_employees['75'])}}</td>
                      <td>{{number_format(($percentile_no_of_employees['25']+$percentile_no_of_employees['50']+$percentile_no_of_employees['75'])/3)}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
           @foreach($comb_committee_names as $key=>$committee)
                 <div class="col-md-12 col-sm-12 page-break-avoid">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{ucwords($committee)}} </h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" >
                <table class="table table-bordered" width="100%" >
                  <thead>
                    <tr>
                       <th style="width: 20%"></th>
                    <th>25th percentile</th>
                    <th>50th percentile</th>
                    <th>75th percentile</th>
                    <th>Average</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>Chair fee</th>
                      <td>${{number_format($percentile_comb_chair_fee[$committee]['25'])}}</td>
                      <td>${{number_format($percentile_comb_chair_fee[$committee]['50'])}}</td>
                      <td>${{number_format($percentile_comb_chair_fee[$committee]['75'])}}</td>
                      <td>${{number_format(($percentile_comb_chair_fee[$committee]['25']+$percentile_comb_chair_fee[$committee]['50']+$percentile_comb_chair_fee[$committee]['75'])/3)}}</td>
                    </tr>
                     <tr>
                      <th>Member Fee</th>
                      <td>${{number_format($percentile_comb_member_fee[$committee]['25'])}}</td>
                      <td>${{number_format($percentile_comb_member_fee[$committee]['50'])}}</td>
                      <td>${{number_format($percentile_comb_member_fee[$committee]['75'])}}</td>
                      <td>${{number_format(($percentile_comb_member_fee[$committee]['25']+$percentile_comb_member_fee[$committee]['50']+$percentile_comb_member_fee[$committee]['75'])/3)}}</td>
                    </tr>
                    <tr>
                      <th>No. of Meetings</th>
                      <td>{{number_format($percentile_comb_no_of_meetings[$committee]['25'])}}</td>
                      <td>{{number_format($percentile_comb_no_of_meetings[$committee]['50'])}}</td>
                      <td>{{number_format($percentile_comb_no_of_meetings[$committee]['75'])}}</td>
                      <td>{{number_format(($percentile_comb_no_of_meetings[$committee]['25']+$percentile_comb_no_of_meetings[$committee]['50']+$percentile_comb_no_of_meetings[$committee]['75'])/3)}}</td>
                    </tr>
                    <tr>
                      <th>No. of Directors</th>
                      <td>{{number_format($percentile_comb_no_of_directors[$committee]['25'])}}</td>
                      <td>{{number_format($percentile_comb_no_of_directors[$committee]['50'])}}</td>
                      <td>{{number_format($percentile_comb_no_of_directors[$committee]['75'])}}</td>
                      <td>{{number_format(($percentile_comb_no_of_directors[$committee]['25']+$percentile_comb_no_of_directors[$committee]['50']+$percentile_comb_no_of_directors[$committee]['75'])/3)}}</td>
                    </tr>
                  </tbody>
                  
                </table>
                   <b>Your Company Data:</b> <br> 
                   <b>Chair Fee:</b> ${{number_format($personal_com[$committee]['chair_fee'])}}, <b>Member Fee:</b> ${{number_format($personal_com[$committee]['member_fee'])}}, <b>No. of meetings:</b> {{number_format($personal_com[$committee]['no_of_meetings'])}}
                <hr style="clear: both;display: block; border: 1px solid black;">

              </div>
            </div>
          </div>
                @endforeach
                    @foreach($committee_names as $key=>$committee)
                 <div class="col-md-12 col-sm-12 page-break-avoid">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>{{ucwords($key)}}</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" >
                <table class="table table-bordered" width="100%" >
                  <thead>
                    <tr>
                       <th style="width: 20%"></th>
                    <th>25th percentile</th>
                    <th>50th percentile</th>
                    <th>75th percentile</th>
                    <th>Average</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>Chair fee</th>
                      <td>${{number_format($percentile_chair_fee[$committee]['25'])}}</td>
                      <td>${{number_format($percentile_chair_fee[$committee]['50'])}}</td>
                      <td>${{number_format($percentile_chair_fee[$committee]['75'])}}</td>
                      <td>${{number_format(($percentile_chair_fee[$committee]['25']+$percentile_chair_fee[$committee]['50']+$percentile_chair_fee[$committee]['75'])/3)}}</td>
                    </tr>
                     <tr>
                      <th>Member Fee</th>
                      <td>${{number_format($percentile_member_fee[$committee]['25'])}}</td>
                      <td>${{number_format($percentile_member_fee[$committee]['50'])}}</td>
                      <td>${{number_format($percentile_member_fee[$committee]['75'])}}</td>
                      <td>${{number_format(($percentile_member_fee[$committee]['25']+$percentile_member_fee[$committee]['50']+$percentile_member_fee[$committee]['75'])/3)}}</td>
                    </tr>
                    <tr>
                      <th>No. of Meetings</th>
                      <td>{{number_format($percentile_no_of_meetings[$committee]['25'])}}</td>
                      <td>{{number_format($percentile_no_of_meetings[$committee]['50'])}}</td>
                      <td>{{number_format($percentile_no_of_meetings[$committee]['75'])}}</td>
                      <td>{{number_format(($percentile_no_of_meetings[$committee]['25']+$percentile_no_of_meetings[$committee]['50']+$percentile_no_of_meetings[$committee]['75'])/3)}}</td>
                    </tr>
                    <tr>
                      <th>No. of Directors</th>
                      <td>{{number_format($percentile_no_of_directors[$committee]['25'])}}</td>
                      <td>{{number_format($percentile_no_of_directors[$committee]['50'])}}</td>
                      <td>{{number_format($percentile_no_of_directors[$committee]['75'])}}</td>
                      <td>{{number_format(($percentile_no_of_directors[$committee]['25']+$percentile_no_of_directors[$committee]['50']+$percentile_no_of_directors[$committee]['75'])/3)}}</td>
                    </tr>
                  </tbody>
                </table>
                <hr style="clear: both;display: block; border: 1px solid black;">
                
              </div>
            </div>
          </div>
                @endforeach
                 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
