<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YourMovies-Login</title>
</head>

<body>
    <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            @if (session('message'))
                <span>{{ session('message') }}</span>
            @endif
            <h1>lgon</h1>
            <label>email</label>
            <input type="text" name="email"><br>
            <label>password</label>
            <input type="password" name="password"><br>
            <button type="submit">Login</button>
        </form>
        <a href="{{ route('view.register') }}">Register new account</a>
    </div>
</body>

</html>
