<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Register</title>
    </head>
    <body>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <h1>Register</h1>
        @if($errors->any())
            @foreach ($errors->all() as $err)
                <p>{{ $err }}</p>
            @endforeach
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            Name : <input type="text" placeholder="Name" name="name" value="{{ old('name') }}"/><br/>
            Email : <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"/><br/>
            Password : <input type="password" placeholder="Password" name="password"/><br/>
            Password Confirmation : <input type="password" placeholder="Password Confirmation" name="password_confirm"/><br/>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <button type="submit">Login</button>
        </form>
    </body>
</html>