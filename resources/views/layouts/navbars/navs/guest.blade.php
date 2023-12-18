<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('E-Invoice System Laravel - Free Frontend Preset for Laravel') }}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <!-- link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" /-->
    
    <link href="{{ asset('css/lib/guest/googleapimaterialicons.css') }}" rel="stylesheet">
    
    <!-- link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" -->
    
    <link href="{{ asset('css/lib/guest/font-awesome.min.css') }}" rel="stylesheet">
    
    
    <!-- CSS Files -->
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />
    
    <!--Excel Sheet Import-->
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"-->
    <link href="{{ asset('css/lib/guest/normalize.min.css') }}" rel="stylesheet">
    
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /-->
    <link href="{{ asset('css/lib/guest/bootstrap.min.css') }}" rel="stylesheet">
    
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" /-->
    <link href="{{ asset('css/lib/guest/bootstrap.css') }}" rel="stylesheet">
    
    <!-- link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" /-->
    
    <link href="{{ asset('css/lib/guest/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    
    <!--Excel Sheet Import-->
   
<!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />


        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

        <script>
        $(document).ready(function () {
          $('.date').datetimepicker({
            format: 'MM/DD/YYYY',
            locale: 'en'
          });
        </script>-->

    </head>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
<!--        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link">
            <i class="material-icons">dashboard</i> {{ __('Dashboard') }}
          </a>
        </li>-->
        <li class="nav-item{{ $activePage == 'register' ? ' active' : '' }}">
            <a  href="/register/3266c19c-19b4-11ee-be56-0242ac120002" class="nav-link">
            <i class="material-icons">person_add</i> {{ __('Register') }}
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
          <a href="{{ route('login') }}" class="nav-link">
            <i class="material-icons">fingerprint</i> {{ __('Login') }}
          </a>
        </li>
<!--        <li class="nav-item ">
          <a href="{{ route('profile.edit') }}" class="nav-link">
            <i class="material-icons">face</i> {{ __('Profile') }}
          </a>
        </li>-->
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->