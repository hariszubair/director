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
        <div class="right_col" role="main">
          <div class="">
          

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Basic Company Detail</h2>
                  
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <table style="width: 100%">
                        <tbody>
                        <tr>
                          <td>Name: </td>
                          <td>{{$company->name}}</td>
                        </tr>
                        <tr>
                          <td>Code: </td>
                          <td>{{$company->code}}</td>
                        </tr>
                        <tr>
                          <td>Index: </td>
                          <td>{{$company->index}}</td>
                        </tr>
                        <tr>
                          <td>Industry: </td>
                          <td>{{$company->industry}}</td>
                        </tr>
                        <tr>
                          <td>Sector: </td>
                          <td>{{$company->sector}}</td>
                        </tr>
                        <tr>
                          <td>No. of employees: </td>
                          <td>{{$company->no_of_employees}}</td>
                        </tr>
                        <tr>
                          <td>Director Fee Pool: </td>
                          <td>{{$company->dir_fee_pool}}</td>
                        </tr>
                        <tr>
                          <td>Director Fee Pool Last Updated: </td>
                          <td>{{$company->dir_fee_pool_updated}}</td>
                        </tr>
                        <tr>
                          <td>Minimum share for Chief Executive: </td>
                          <td>{{$company->min_share_c_e}}</td>
                        </tr>
                        <tr>
                          <td>Time to achieve minimum share for Chief Executive: </td>
                          <td>{{$company->min_share_time_c_e}}</td>
                        </tr>
                        <tr>
                          <td>Minimum share for Chair: </td>
                          <td>{{old('min_share_chair')}}</td>
                        </tr>
                        <tr>
                          <td>Time to achieve minimum share for Chair in months: </td>
                          <td>{{$company->min_share_time_chair}}</td>
                        </tr>
                        <tr>
                          <td>Minimum share for other executives: </td>
                          <td>{{$company->min_share_o_e}}</td>
                        </tr>
                        <tr>
                          <td>Time to achieve minimum share for other executives: </td>
                          <td>{{$company->min_share_time_o_e}}</td>
                        </tr>
                        <tr>
                          <td>Minimum share for other directors: </td>
                          <td>{{$company->min_share_n_e}}</td>
                        </tr>
                        <tr>
                          <td>Time to achieve minimum share for other directors: </td>
                          <td>{{$company->min_share_time_n_e}}</td>
                        </tr>
                        </tbody>
                      </table>
                                     
            
                  </div>
                </div>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                   <div class="x_title">
                    <h2>Company Financials </h2>
                   
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <table style="width: 100%">
                        <tbody>
                        <tr>
                          <td>Sale Revenue: </td>
                          <td>{{$company->financial->sale_revenue}}</td>
                        </tr>
                        <tr>
                          <td>Underlying Profit: </td>
                          <td>{{$company->financial->underlying_profit}}</td>
                        </tr>
                        <tr>
                          <td>Average Capital Invested: </td>
                          <td>{{$company->financial->a_c_i}}</td>
                        </tr>
                        <tr>
                          <td>ROCI: </td>
                          <td>{{$company->financial->roci}}</td>
                        </tr>
                        <tr>
                          <td>Weight Share: </td>
                          <td>{{$company->financial->weight_share}}</td>
                        </tr>
                        <tr>
                          <td>BASIC EPS(EARNING PER SHARE): </td>
                          <td>{{$company->financial->basic_eps}}</td>
                        </tr>
                        <tr>
                          <td>Free Cashflow: </td>
                          <td>{{$company->financial->free_cashflow}}</td>
                        </tr>
                        <tr>
                          <td>Market Captilization: </td>
                          <td>{{$company->financial->market_cap}}</td>
                        </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
             <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                   <div class="x_title">
                    <h2>Committes </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" id='committee_div'>
                    <table class="table table-bordered" width="100%">
                        <thead>
                          <tr>
                            <th>Committee Name</th>
                            <th>Chair Fee</th>
                            <th>Member Fee</th>
                            <th>No. of Meetings</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($company->committee as $key=>$committee)
                          <tr>
                            <th>
                              {{$committee->name}}
                            </th>
                            <td>${{$committee->chair_fee}}</td>
                            <td>${{$committee->member_fee}}</td>
                            <td>{{$committee->no_of_meetings}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                                      </div>
                </div>
              </div>
            </div>
            <div class="row page-break-avoid" >
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Committe Composition</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <table class="table table-bordered" width="100%" style=" table-layout:fixed;">
                      <thead>
                        <tr>
                        <th  style="text-wrap:normal;word-wrap:break-word">Director</th>
                    @foreach($committees as $committee)
                    <th  style="text-wrap:always;word-wrap:break-word">{{$committee->name}}</th>
                    @endforeach
                    </tr>
                      </thead>
                    <tbody>
                      @foreach($director_committee as $director)
                      <tr>
                        <td style="text-wrap:always;word-wrap:break-word">{{$director['name']}}</td>
                         @foreach($committees as $committee )
                           <td style="text-wrap:always">{{isset($director[$committee->name]) ? $director[$committee->name] : '-'}}</td>
                        @endforeach                        
                      </tr>
                      @endforeach
                      
                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>
            <div class="row page-break-avoid">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  
                  <div class="x_content" >
                    @foreach($company->company_director as $key=>$director)
                  <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                   <div class="x_title">
                    <h3>{{$director->director->name}} </h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <table style="width: 100%" style="font-size: 12px">
                        <tbody>
                       
                        <tr>
                          <td>Gender: </td>
                          <td>{{$director->director->gender}}</td>
                        </tr>
                        <tr>
                          <td>Age: </td>
                          <td>{{$director->director->age}}</td>
                        </tr>
                        <tr>
                          <td>Qualification: </td>
                          <td>{{$director->director->qualification}}</td>
                        </tr>
                        <tr>
                          <td>Institute: </td>
                          <td>{{$director->director->Institute}}</td>
                        </tr>
                        <tr>
                          <td>Status: </td>
                          <td>{{$director->status}}</td>
                        </tr><tr>
                          <td>Board: </td>
                          <td>{{$director->board}}</td>
                        </tr><tr>
                          <td>Non Executive Type: </td>
                          <td>{{$director->ned_type}}</td>
                        </tr><tr>
                          <td>Independent/ Non Independent: </td>
                          <td>{{$director->independent_type}}</td>
                        </tr>
                        <tr>
                          <td>Joining Date: </td>
                          <td>{{$director->joining_date}}</td>
                        </tr>
                        <tr>
                          <td>Leaving Date: </td>
                          <td>{{$director->leaving_date}}</td>
                        </tr>
                        <tr>
                          <td>Fee: </td>
                          <td>{{$director->director_fee}}</td>
                        </tr>
                        <tr>
                          <td>Superannuation: </td>
                          <td>{{$director->superannuation}}</td>
                        </tr>
                        <tr>
                          <td>Other fee: </td>
                          <td>{{$director->other_fee}}</td>
                        </tr>
                        <tr>
                          <td>Committee fee: </td>
                          <td>{{$director->committee_fee}}</td>
                        </tr>
                        <tr>
                          <td>Vested Share: </td>
                          <td>{{$director->vested_share}}</td>
                        </tr>
                        <tr>
                          <td>Unvested Share: </td>
                          <td>{{$director->unvested_share}}</td>
                        </tr>
                        <tr>
                          <td>Superannuation: </td>
                          <td>{{$director->superannuation}}</td>
                        </tr>
                        </tbody>
                      </table>
              </div>
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
