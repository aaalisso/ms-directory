<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Admin')</title>

  @yield('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @vite(['resources/js/app.js'])
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed">
  <!-- <div class="wrapper"> -->
  @include('layout.header')

  @auth
  @include('layout.sidebar')
  <div class="content-wrapper">
    @yield('content')
  </div>
  @endauth
  @guest
  <div class="main-container">
    @yield('content')
  </div>
  @endguest



  @yield('modals')

  @yield('js')
  <script>
    $(function () {
    var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');

    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({'display': 'block'})
        .addClass('menu-open').prev('a')
        .addClass('active');
});
  </script>
  <script>
    $('#user_roles').on('hidden.bs.modal', function(e) {
      $('#role_user').html('');
    });
  </script>
</body>

</html>