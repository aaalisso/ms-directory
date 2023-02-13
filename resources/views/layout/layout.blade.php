<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://kit.fontawesome.com/21366aa9f0.css" crossorigin="anonymous"> -->
    <title>@yield('title')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css', 'resources/css/login_styles.css', 'resources/css/header_styles.css'])

</head>
<body>
    @extends('header')
    <div class="main-container" >
        @yield('content')
    </div>
</body>
</html>