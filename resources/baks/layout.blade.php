<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    @vite(['resources/js/app.js', 'resources/css/login_styles.css', 'resources/css/header_styles.css'])

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <title>@yield('title')</title>

</head>

<body>
    @extends('header')
    <div class="main-container">
        <div class="sidebar" style="background-color: lightgray;">

            <a class="sidebar__item" href="ubigeo"><i class="bi bi-globe-americas"></i> UBIGEO</a>
            <a class="sidebar__item" href="person"><i class="bi bi-person-vcard"></i> PERSONAS</a>
            <a href="institution_person" class="sidebar__item">INSTITUTO - PERSONA</a>
            <a class="sidebar__item" href="user"><i class="bi bi-people-fill"></i> USUARIOS</></a>
            <a class="sidebar__item" href="institution"><i class="bi bi-buildings"></i> INSTITUCIÓN</></a>
            @if(session('status'))
            @endif
        </div>

        <!-- <main class="main__content" style="background-color: lightgray;">
            @yield('content')
        </main> -->

    </div>
    @yield('scripts')
    </div>
</body>

</html>