@extends('layouts.master')

@section('content')
<style type="text/css">
  .custom_text{
    font-weight: bold;
    font-size: 18px;
     color: #73879c
  }
</style>
  <div class="right_col" role="main" style="min-height: 800px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Packages</h3>
              </div>

            </div>

            <div class="clearfix"></div>


<div class="row" style="padding-top: 50px">
<div class="col-md-4">
<div class="card">
<div class="card-header" style="text-align: center;">
<strong class="card-title">Basic Package</strong>
</div>
<div class="card-body" style="text-align: center;    color: #238DB7 !important">
<p>
	<span style="vertical-align: 30px;font-size: : 1px">$</span>
	<span style="font-size: 350%">{{Auth::user()->hasRole('Director') ? '200' : '3000'}}</span>
</p>
<p class="custom_text">One Search.</p>
<p class="custom_text">Valid for one month.</p>
<form action="./payment" method="POST">
  @csrf
  <input type="" name="package" style="display: none" value="99">
  <button class="btn btn-success">Subscribe</button>
</form>
</div>
</div>

</div>
<div class="col-md-4">
<div class="card">
<div class="card-header" style="text-align: center;">
<strong class="card-title" >Gold Package</strong>
</div>
<div class="card-body" style="text-align: center;   color: #238DB7 !important">
<p>
	<span style="vertical-align: 30px;font-size: : 1px">$</span>
	<span style="font-size: 350%">{{Auth::user()->hasRole('Director') ? '400' : '6000'}}</span>
</p>
<p class="custom_text">Unlimited Searches.</p>
<p class="custom_text">Valid for 6 months.</p>
<form action="./payment" method="POST">
  @csrf
  <input type="" name="package" style="display: none" value="6">
  <button class="btn btn-success">Subscribe</button>
</form>

</div>
</div>

</div>
<div class="col-md-4">
<div class="card">
<div class="card-header" style="text-align: center;">
<strong class="card-title" >Platinum Package</strong>
</div>
<div class="card-body" style="text-align: center;   color: #238DB7 !important">
<p>
	<span style="vertical-align: 30px;font-size: : 1px">$</span>
	<span style="font-size: 350%">{{Auth::user()->hasRole('Director') ? '600' : '15000'}}</span>
</p>
<p class="custom_text">Unlimited Searches.</p>
<p class="custom_text">Valid for 12 months.</p>
<form action="./payment" method="POST">
  @csrf
  <input type="" name="package" style="display: none" value="12">
  <button class="btn btn-success">Subscribe</button>
</form>

</div>
</div>
</div>
</div>

</div>
</div>

@endsection()