@extends('layout.layout')
@section('title', 'Login')
@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="usuario@correo.com" id="email" class="form-control lowcase" name="email" autofocus>
                                @if ($errors->has(__('email')))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="********" id="password" class="form-control" name="password" autocomplete="on">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                            @if(\Session::has('message'))
                            <div class="alert alert-info">
                                {{\Session::get('message')}}
                            </div>
                            @endif
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-outline-primary">Iniciar Sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection