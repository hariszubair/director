<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Eustaceai</title>

    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="{{ asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('public/css/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('public/css/nprogress.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/ion.rangeSlider.css')}}" rel="stylesheet">
    <!-- <link href="{{ asset('public/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet"> -->
    <!-- Custom Theme Style -->
    <link href="{{ asset('public/css/custom.min.css')}}" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('public/css/datepicker.min.css')}}">
    
  </head>

  <body class="nav-md">
            <a href="{{URL('packages')}}" class="btn btn-success" style="position: fixed;bottom: 10px;right: 10px">Pay</a>

    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Eustaceai</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              </div>
              <div class="profile_info">
                
                <h2><span>Welcome,</span> {{Auth::user()->name}}</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

