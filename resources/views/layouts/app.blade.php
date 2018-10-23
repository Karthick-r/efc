<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Turf</title>


  <link rel="shortcut icon" type="image/x-icon" href="">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Muli:300,400,500,700"
  rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">

  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN ROBUST CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
  <!-- END ROBUST CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/core/menu/menu-types/vertical-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('vendors/css/tables/datatable/datatables.min.css')}}">

  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('csnew/css/style.css')}}">
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="">
                <img class="brand-logo" alt="robust admin logo" style="width:3vw" src="https://images.unsplash.com/photo-1531415074968-036ba1b575da?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=472642856008b6ddb3e596e45ca4263d&auto=format&fit=crop&w=1347&q=80">

              <h3 class="brand-text mb-2">Turf</h3>



            </a>
          </li>
         
        </ul>
      </div>
      <div class="container mt-1">
       
        
        <a href="{{ url('/admin/logout') }}" class=" btn btn-primary" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();" style="float:right"><i class="icon-shield"></i><span class="menu-title" data-i18n="nav.add_on_block_ui.main">Logout</span></a>
     
      <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}


    </form>
    <h1 class="" >
        <i class="fas fa-volleyball-ball"></i>
      Turf
      </h1>
  </div>

   
    </div>
  </nav>



  <div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      

  
        <li class="active"><a href="{{ url('/admin/seeusers') }}"><i class="icon-shield"></i><span class="menu-title" data-i18n="nav.add_on_block_ui.main">See Users</span></a>
        </li>


        <li><a href="{{ route('showmt') }}"><i class="icon-shield"></i><span class="menu-title" data-i18n="nav.add_on_block_ui.main">Matches</span></a>
        </li>

        <li><a href="{{ route('showtr') }}"><i class="icon-shield"></i><span class="menu-title" data-i18n="nav.add_on_block_ui.main">Tournaments</span></a>
        </li>


        <li><a href="{{ route('showtm') }}"><i class="icon-shield"></i><span class="menu-title" data-i18n="nav.add_on_block_ui.main">Teams</span></a>
        </li>
        <li><a href="{{ route('upcmng') }}"><i class="icon-shield"></i><span class="menu-title" data-i18n="nav.add_on_block_ui.main">Upcoming Matches</span></a>
        </li>
        <li><a href="{{ route('showpoints') }}"><i class="icon-shield"></i><span class="menu-title" data-i18n="nav.add_on_block_ui.main">Increase Reward points</span></a>
 

      
  
      </ul>
    </div>
  </div>
   <div class="row">
    <div class="col-lg-3 col-xl-3 col-xs-3 col-md-3">

    </div>

    <div class="col-lg-7 col-xl-7 col-xs-7 col-md-7 mt-2">

        <div class="container">
            @if(Session::has('success'))
                  <div class="alert alert-success">
          
                    {{ Session::get('success') }}
                  </div>
                  @endif
          </div>
<div class="card">   
  <div class="card-body">     
        @yield('content')
  </div>
</div>
  </div>

    @include('layouts.footer')
