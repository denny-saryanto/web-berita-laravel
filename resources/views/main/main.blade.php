@extends('layout.main')

@section('title', 'Home')

@section('main')
    <body class="hold-transition layout-top-nav">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-light navbar-white">
                <div class="container">
                    <a href="index3.html" class="navbar-brand">
                        <span class="brand-text font-weight-light">Laravel News</span>
                    </a>
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="index3.html" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="#" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link">Help</a>
                        </li>
                    </ul>
                    
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        @if (Auth::check())
                            <li class="nav-item d-none d-sm-inline-block mx-1">
                                <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block mx-1">
                                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                            </li>
                        @else
                            <li class="nav-item d-none d-sm-inline-block mx-1">
                                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block mx-1">
                                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Articles</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a>Home</a></li>
                                    <li class="breadcrumb-item active"><a>Articles</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <!-- Article -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            Title Article
                                        </h3>
                                        <p class="card-text">
                                            Some Text Content Article
                                        </p>
                                        <a href="#" class="card-link">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            Title Article
                                        </h3>
                                        <p class="card-text">
                                            Some Text Content Article
                                        </p>
                                        <a href="#" class="card-link">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!-- /.navbar -->
    </body>
@endsection