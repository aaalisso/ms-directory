<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootsrap 4 CDN-->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

    <title>@yield('title')</title>
    @vite(['resources/js/app.js'])

</head>

<body>
    @include('layout.header')
    <div class="main-container">
        @yield('content')
    </div>
</body>

</html>