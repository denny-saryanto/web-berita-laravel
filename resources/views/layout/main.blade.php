<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>@yield('title')</title>
    </head>
    <body class="hold-transition layout-top-nav">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-light navbar-white">
                <div class="container">
                    <a href="{{ route('articles') }}" class="navbar-brand">
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
                @yield('main')
            </div>
        </div>
    </body>
    
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('javascript')
</html>