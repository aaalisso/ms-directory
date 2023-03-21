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
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="perfil" class="nav-link">
                                <i class="bi bi-person-fill-gear user_menu_btn"></i>
                                <p>Perfil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-left user_menu_btn"></i>
                                <p>Logout</p>
                            </a>
                            <form action="{{url('logout')}}" method="post" id="logout-form" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

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
                        <i class="bi bi-asterisk"></i>
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
                <li class="nav-item">
                    <a href="user" class="nav-link">
                        <!-- <i class="fa-solid fa-user"></i> -->
                        <p>Roles</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="user" class="nav-link">
                        <!-- <i class="fa-solid fa-user"></i> -->
                        <p>Permisos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="user" class="nav-link">
                        <!-- <i class="fa-solid fa-user"></i> -->
                        <p>Subscripciones</p>
                    </a>
                </li>
            </ul>
        </div>

    </div>

</aside>