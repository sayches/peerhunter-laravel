<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PeerHunter') }}</title>
        <script src="{{ URL::asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{ URL::asset('css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/adminlte.css')}}"/>
        <link rel="stylesheet" href="{{ URL::asset('css/adminlte.min.css')}}"/>
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ URL::asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('plugins/jqvmap/jqvmap.min.css') }}">

        <link rel="stylesheet" href="{{ URL::asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('plugins/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('plugins/summernote/summernote-bs4.css') }}">
        <!--        <link rel="stylesheet" href="{{ URL::asset('css/app.css')}}"/>-->

        <link rel="stylesheet" href="{{ URL::asset('plugins/fontawesome-free/css/all.min.css')}}"/>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <script src="{{ URL::asset('js/app.js') }}" defer></script>

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
      
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
            
                </ul>

                <ul class="navbar-nav ml-auto">     
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ ucfirst(Auth::user()->name) }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>

            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="{{ URL::asset('img/AdminLTELogo.png') }}" alt="Sayches" class="brand-image img-circle elevation-3"
                         style="opacity: .8">
                    <span class="brand-text font-weight-light">Sayches</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ URL::asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{ ucfirst(Auth::user()->name) }}</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <li class="nav-item has-treeview menu-open">
                                <a href="{{ route('home') }}" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                             
                            </li>
                         
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        User Management
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('user') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Users</p>
                                    </a>
                            </li>
                                                
                            </ul>
                                    </li>
                                        
                        </ul>
                    </nav>
<!-- /.sidebar-menu -->
</div>
                <!-- /.sidebar -->
</aside>
            @yield('content')       
        </div>

<script src="{{ URL::asset('plugins/jquery/jquery.min.js    ')}}"></script>        
        <script src="{{ URL::asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>       
        <script>
$.widget.bridge('uibutton', $.ui.button)
        </script>       
        <script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ URL::asset('plugins/chart.js/Chart.min.js')}}"></script>
        <script src="{{ URL::asset('plugins/sparklines/sparkline.js')}}"></script>
        <script src="{{ URL::asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>

        <script src="{{ URL::asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
        <script src="{{ URL::asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
        <script src="{{ URL::asset('plugins/moment/moment.min.js')}}"></script>

        <script src="{{ URL::asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{ URL::asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <script src="{{ URL::asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
        <script src="{{ URL::asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <script src="{{ URL::asset('js/adminlte.js')}}"></script>
    </body>
    @extends('layouts.footer')
</html>

