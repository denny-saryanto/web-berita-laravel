<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
    </head>
    <body>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            Email : <input type="email" name="email"/><br/>
            Password : <input type="password" name="password"/><br/>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <button type="submit">Login</button>
        </form>
    </body>
</html>