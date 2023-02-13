@extends('layout.layout')
@section('content')
@vite(['resources/css/main_background.css'])
<div class="login-box">
    <div class="left-box">
        <h1>{{__('Sign in')}}</h1>
        <form action="{{route('authenticate')}}" method="POST">
            @csrf
            <label for="username">Correo</label>
            <div class="forms-group">
                <div class="input-icon-box">
                    <span class="input-icon"><i class="bi bi-envelope-at-fill"></i></span>
                </div>
                <input id="email" name="email" type="text" class="input-box" placeholder="correo@gmail.com" autocomplete="off">
            </div>
            <label for="password">Contraseña</label>
            <div class="forms-group">
                <div class="input-icon-box">
                    <span class="input-icon"><i class="bi bi-key-fill"></i></i></span>
                </div>
                <input id="password" name="password" type="password" class="input-box" placeholder="**********" autocomplete="off">
            </div>
            <button type="submit" class="button _2">
                <span>{{__('Sign in')}}</span>
                <div class="back"></div>
            </button>

        </form>
    </div>
    <div class="right-box">
        <span class="right-title">Inicia Sesión con</span>
        <div class="social-btn-group">
            <a class="social-btn btn-twitter" href="#">
                <i class="bi bi-twitter"></i>
                <p>Twitter</p>
            </a>
            <a class="social-btn btn-google" href="#">
                <i class="bi bi-google"></i>
                <p>Google</p>
            </a>
            <a class="social-btn btn-facebook" href="#">
                <i class="bi bi-facebook"></i>
                <p>Google</p>
            </a>
        </div>
    </div>

    <div class="or">OR</div>


    </a>
</div>
</div>
@endsection