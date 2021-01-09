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
                    <h2>Peronal Info</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"> 
                    <div>
                      <table style="width: 100%">
                        <tbody>
                        <tr>
                          <td>Name: </td>
                          <td>{{$director->director->name}}</td>
                        </tr>
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
                        </tbody>
                      </table>
   
    
   

    <hr style="clear: both;display: block; border: 1px solid black;">
    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          

         <div class="row page-break-avoid">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Company Info</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

 <table  style="width: 100%">
                        <tbody>
                        <tr>
                          <td>Company Name: </td>
                          <td>{{$director->company_name}}</td>
                        </tr>
                        <tr>
                          <td>Status: </td>
                          <td>{{$director->Status}}</td>
                        </tr>
                        <tr>
                          <td>Board: </td>
                          <td>{{$director->board}}</td>
                        </tr>
                        <tr>
                          <td>Non Executive Type: </td>
                          <td>{{$director->ned_type}}</td>
                        </tr>
                        <tr>
                          <td>Independent/ Non Independent:</td>
                          <td>{{$director->independent_type}}</td>
                        </tr>
                        <tr>
                          <td>Joining Date: </td>
                          <td>{{$director->joining_date}}</td>
                        </tr><tr>
                          <td>Leaving Date: </td>
                          <td>{{$director->leaving_date}}</td>
                        </tr><tr>
                          <td>Fee: </td>
                          <td>{{$director->director_fee}}</td>
                        </tr><tr>
                          <td>Superannuation: </td>
                          <td>{{$director->superannuation}}</td>
                        </tr><tr>
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
                        </tbody>
                      </table>
            </div>
                </div>
              </div>
    <hr style="clear: both;display: block; border: 1px solid black;">


</div>
              <div class="row page-break-avoid">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Committee Member</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"> 
                    <table class="table table-bordered" width="100%"  >
                      <thead >
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Membership Type</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($director->director_committee as $key=>$committee)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$committee->name}}</td>
                          <td>{{$committee->type}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
    <hr style="clear: both;display: block; border: 1px solid black;">


            </div>
             <div class="row page-break-avoid">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Other Membership</h2>
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"> 
                    <table class="table table-bordered page-break-avoid" width="100%">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Membership Type</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($director->other_membership as $key=>$membership)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$membership->organization}}</td>
                          <td>{{$membership->type}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

    <hr style="clear: both;display: block; border: 1px solid black;">

            </div>
            </div>
        </div>
        <!-- /page content -->



