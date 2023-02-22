@extends('layout.layout')
@guest
@section('title', 'Restricted Zone')
@endsection
@endguest
@auth
@section('title', 'Admin Dashboard')
@endauth

@section('content')
@guest
<!-- <div class="container" style="background: red; width: 100vw; height: 100vh;">
</div> -->
@endguest
@auth
<div class="dashboard-box">
    <div class="sidebar-border-box">
        <div class="sidebar">
            <div class="menu-box">
                <div class="menu-tag">
                    <p>Menu</p>
                </div>
            </div>
            <a class="sidebar-item-group" href="ubigeo"><i class="bi bi-globe-americas"></i>
                <p>UBIGEO</p>
            </a>
            <a class="sidebar-item-group" href="person"><i class="bi bi-person-vcard"></i>
                <p>PERSONAS</p>
            </a>
            <a class="sidebar-item-group inconless" href="institution_person">INSTITUTO - PERSONA</a>
            <a class="sidebar-item-group" href="user"><i class="bi bi-people-fill"></i> USUARIOS</a>
            <a class="sidebar-item-group" href="institution"><i class="bi bi-buildings"></i> INSTITUCIÓN</></a>
        </div>
    </div>
    <div class="content-area">
        @yield('content-area')
    </div>
</div>
@endauth
@endsection