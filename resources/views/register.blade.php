@extends('layout.main')

@section('title')
    Register
@endsection

@section('main')
    @if (Auth::check())
        <h1>You are logged in</h1>
    @else
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <section class="container">
            <div class="row d-flex flex-column min-vh-100 w-auto">
                <div class="col d-flex flex-grow-1 justify-content-center align-items-center">
                    <div class="bg-light p-5 rounded border border-primary">
                        <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                        <p class="text-light-50">Please enter your email and password!</p>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" />
                                <label class="form-label" for="name">Name</label>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" name="email" value="{{ old('email') }}" id="email" class="form-control" />
                                <label class="form-label" for="email">Email address</label>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" id="email" class="form-control" />
                                <label class="form-label" for="email">Password</label>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control" />
                                <label class="form-label" for="password_confirm">Password Confirmation</label>
                                @if ($errors->has('password_confirm'))
                                    <span class="text-danger">{{ $errors->first('password_confirm') }}</span>
                                @endif
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
                        </form>
                        <p class="text-light-50">or</p>
                        <a href="{{ route('login') }}" class="btn btn btn-primary btn-block">Sign In</a>
                    </div>
                </div>
            </div>
        </section>
    {{-- <form action="{{ route('register') }}" method="POST">
        @csrf
        Name : <input type="text" placeholder="Name" name="name" value="{{ old('name') }}"/><br/>
        Email : <input type="text" placeholder="Email" name="email" value="{{ old('email') }}"/><br/>
        Password : <input type="password" placeholder="Password" name="password"/><br/>
        Password Confirmation : <input type="password" placeholder="Password Confirmation" name="password_confirm"/><br/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button type="submit">Login</button>
    </form> --}}
    @endif
@endsection