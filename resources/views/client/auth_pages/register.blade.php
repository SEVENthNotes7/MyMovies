<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YourMovies-Register</title>
</head>

<body>
    <div class="container">
        <form action="{{ route('register.account') }}" method="POST">
            @csrf
            @if (session('message'))
                <span>{{ session('message') }}</span>
            @endif
            <h1>Register New Account</h1>
            <label for="fname">First Name:</label>
            <input type="text" name="firstname"><br>
            @if ($errors->has('firstname'))
                <span>{{ $errors->first('firstname') }}</span><br>
            @endif
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname"><br>
            @if ($errors->has('lastname'))
                <span>{{ $errors->first('lastname') }}</span><br>
            @endif
            <label for="email">Email:</label>
            <input type="text" name="email"><br>
            @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span><br>
            @endif
            <label for="newpassword">New Password:</label>
            <input type="password" name="newpassword"><br>
            @if ($errors->has('newpassword'))
                <span>{{ $errors->first('newpassword') }}</span><br>
            @endif
            <label for="confirmpassword">Confirm Password:</label>
            <input type="password" name="confirmpassword"><br>
            @if ($errors->has('confirmpassword'))
                <span>{{ $errors->first('confirmpassword') }}</span><br>
            @endif
            <button type="submit">Register</button>
        </form>
        <a href="{{ route('cancel.register') }}">back To login</a>
    </div>
</body>

</html>
