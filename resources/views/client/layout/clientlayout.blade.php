<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.includes.header')
</head>
@include('client.includes.navbar')
<body>
    <div class="container">
        @include('client.includes.search')
        @yield('content')
    </div>

</body>

</html>
