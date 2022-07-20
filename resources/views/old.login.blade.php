@extends('layout.main')

@section('title')
    Login
@endsection

@section('main')
    @if (Auth::check())
        <h1> You are logged in </h1>
    @else
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <section class="container">
            <div class="row d-flex flex-column min-vh-100 w-auto">
                <div class="col d-flex flex-grow-1 justify-content-center align-items-center">
                    <div class="bg-light p-5 rounded border border-primary">
                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                        <p class="text-light-50">Please enter your email and password!</p>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="text" name="email" value="{{ old('email') }}" id="form2Example1" class="form-control" />
                                <label class="form-label" for="form2Example1">Email address</label>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" id="form2Example2" class="form-control" />
                                <label class="form-label" for="form2Example2">Password</label>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                        </form>
                        <p class="text-light-50">or</p>
                        <a href="{{ route('register') }}" class="btn btn btn-primary btn-block">Register</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection