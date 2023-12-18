<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Hub System - @yield('title')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        
        <!--https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200-->
        
        <link href="{{ asset('css/lib/main/googlefontscss2.css') }}" rel="stylesheet">
        <!-- Google Web Fonts -->
        
        <!--https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap-->
        <link href="{{ asset('css/lib/main/googlefontsswap.css') }}" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <!--https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css-->
        <link href="{{ asset('css/lib/main/cdnjsallmin.css') }}" rel="stylesheet">
        
        <!--https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css-->
        <link href="{{ asset('css/lib/main/cdnjsfontawesome.css') }}" rel="stylesheet">
        

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('css/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link  href="{{ asset('css/frontbootstrap.min.css')}}" rel="stylesheet">
        <!--rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" -->
        <link  href="{{ asset('css/lib/main/cdnjsallmin6awesom.css')}}" rel="stylesheet">
        

        <!-- Template Stylesheet -->
        <link href="{{ asset('css/frontstyle4.css')}}" rel="stylesheet">



        <!-- link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/ -->
        
        <link  href="{{ asset('css/lib/main/font-awesome.min.css')}}" rel="stylesheet">
        
        <!-- link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" -->
        
        <link  href="{{ asset('css/lib/main/fontmaterialicons.css')}}" rel="stylesheet">

        <!-- script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script -->
        <script src="{{ asset('css/lib/main/jquery.js')}}"></script>

        <style>
            body {
                overflow: hidden; /* Hide scrollbars */
            }
        </style>
        
        

    </head>

    <body>
        @auth()
        @include('layouts.page_templates.auth')
        @endauth

        @guest()
        @include('layouts.page_templates.guest')
        @endguest

    </body>
</html>