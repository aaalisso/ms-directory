<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- Scripts -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar_">
        <div class="container">
            <div class="navbar-brand navbar__title">
                <a href="/">Directorio</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar__item" aria-controls="navbar__item" aria-expanded="false" aria-label="{{__('Toggle navigation')}}">
                <p><i class="bi bi-three-dots"></i></p>
            </button>
            <div class="collapse navbar-collapse navbar navbar__items" id="navbar__item">
                <ul class=""></ul>
                <ul class="navbar-nav me-auto">
                    @guest
                    @if(Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="login" class="">{{__('Login')}}</a>
                    </li>
                    @endif
                    @if(Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="register" class="">{{__('Register')}}</a>
                    </li>
                    @endif
                    @else
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="content__area">
        <div class="sidebar" style="background-color: lightgray;">

            <a class="sidebar__item" href="ubigeo"><i class="bi bi-globe-americas"></i> UBIGEO</a>
            <a class="sidebar__item" href="person"><i class="bi bi-person-vcard"></i> PERSONAS</a>
            <a href="institution_person" class="sidebar__item">INSTITUTO - PERSONA</a>
            <a class="sidebar__item" href="user"><i class="bi bi-people-fill"></i> USUARIOS</></a>
            <a class="sidebar__item" href="institution"><i class="bi bi-buildings"></i> INSTITUCIÓN</></a>
            <!-- @if(session('status')) -->
            <!-- @endif -->
        </div>

        <main class="main__content" style="background-color: lightgray;">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
    </div>
</body>

</html>