<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  @yield('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"> -->

  @vite(['resources/js/app.js'])
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed">
  <!-- <div class="wrapper"> -->
  <nav class="main-header navbar navbar-expand navbar-dark mx-background-top-linear">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" data-auto-collapse-size="768">
          <i class="fas fa-bars"></i>
        </a>
      </li>
      <li class="nav-item-d-none d-sm-inline-block">
        <a href="admin" class="nav-link">Home</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!--sidebar header-->
    <a href="https://www.gob.pe/iiap" class="brand-link" target="_blank">
      <img src="./assets/iiap_logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">IIAP</span>
    </a>
    <!--sidebar user-box -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-overflow-x">

      <div class="user-panel mt-2">
        <ul id="user-panel" class="nav nav-pills nav-sidebar nav-child-ident flex-column " data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link user-panel-item">
              <div class="image">
                <img src="./assets/user_logo.png" class="img-circle elevation-2" alt="User Image">
              </div>
              <p>
                @auth
                {{ Auth::user()->email }}
                @endauth
              </p>
              <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="perfil" class="nav-link">
                  <i class="fa-regular fa-circle"></i>
                  <p>Perfil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('logout')}}" class="nav-link">
                  <i class="fa-regular fa-circle"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>

        <!-- <div class="info">
          <a href="#" class="d-block dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
           
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
          </a>
        </div> -->


      </div>
      <!--sidebar body-->
      <div class="mt-2">
        <ul id="navigation-panel" class="nav nav-pills nav-sidebar nav-child-ident flex-column" data-widget="treeview" role="menu" data-accordion="false">



          <li class="nav-header">TABLES</li>
          <li class="nav-item">
            <a href="ubigeo" class="nav-link">
              <i class="fa-sharp fa-solid fa-earth-americas"></i>
              <p>Ubigeo</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link">
              <p>Institucional<i class="right fas fa-angle-left"></i></p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="institution" class="nav-link">
                  <i class="fa-regular fa-building"></i>
                  <p>Institución</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="person" class="nav-link">
                  <i class="fa-solid fa-person"></i>
                  <p>Persona</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="institution_person" class="nav-link">
                  <i class="fa-solid fa-building-user"></i>
                  <p>Institución-Persona</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="user" class="nav-link">
              <i class="fa-solid fa-user"></i>
              <p>Usuario</p>
            </a>
          </li>
        </ul>
      </div>

    </div>

  </aside>


  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- </div> -->

  @yield('modals')

  @yield('js')
  <script>
    /** add active class and stay opened when selected */
    var url = window.location;
    const allLinks = document.querySelectorAll('.nav-item a');
    const currentLink = [...allLinks].filter(e => {
      return e.href == url;
    });

    if (currentLink.length > 0) { //this filter because some links are not from menu
      currentLink[0].classList.add("active");
      currentLink[0].closest(".nav-treeview").style.display = "block";
      currentLink[0].closest(".has-treeview").classList.add("active");
    }
  </script>

</body>

</html>