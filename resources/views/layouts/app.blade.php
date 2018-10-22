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
              <h3 class="brand-text">Turf</h3>
            </a>
          </li>
         
        </ul>
      </div>
     
    </div>
  </nav>
  <div class="main-menu menu-fixed menu-dark menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      

  
        <li class="active"><a href="{{ url('/seeusers') }}"><i class="icon-shield"></i><span class="menu-title" data-i18n="nav.add_on_block_ui.main">See Users</span></a>
        </li>

        <li class="active"><a href="{{ route('homepoints') }}"><i class="icon-shield"></i><span class="menu-title" data-i18n="nav.add_on_block_ui.main">Increase points</span></a>
        </li>
        <li class=" nav-item" id="">
          
          
        <a href="{{ url('/admin/logout') }}"
        onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
          
        </li>
      
  
      </ul>
    </div>
  </div>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
   
@include('layouts.errors')

       @yield('content')
        
      
      </div>
     
      </div>
 
    </div>

    @include('layouts.footer')