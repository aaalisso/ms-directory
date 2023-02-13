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
    @vite(['resources/js/app.js', 'resources/css/login_styles.css', 'resources/css/header_styles.css', 'resources/css/main_background.css'])

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    @extends('header')
    <div class="main-container">
        <div class="login-box">
            <div class="left-box">
                <h1>{{__('Sign in')}}</h1>
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <label for="email">Correo</label>
                    <div class="forms-group">
                        <div class="input-icon-box">
                            <span class="input-icon"><i class="bi bi-envelope-at-fill"></i></span>
                        </div>
                        <input id="email" name="email" type="text" class="input-box" placeholder="correo@gmail.com">
                    </div>
                    <label for="password"> Contraseña</label>
                    <div class="forms-group">
                        <div class="input-icon-box">
                            <span class="input-icon"><i class="bi bi-key-fill"></i></i></span>
                        </div>
                        <input id="password" name="password" type="password" class="input-box" placeholder="**********" autocomplete="on">
                    </div>
                    <button type="submit" class="button _2">
                        <span>{{__('Sign in')}}</span>
                        <div class="back"></div>
                    </button>

                </form>
            </div>
            <div class="right-box">
                <span class="right-title">Sign up with <br> Social Network</span>
            </div>
            <div class="or">OR</div>
        </div>
    </div>


</body>

</html>