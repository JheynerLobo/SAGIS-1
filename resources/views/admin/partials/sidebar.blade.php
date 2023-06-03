<!-- Main Sidebar -->
<head>
<script src="https://kit.fontawesome.com/b10d6908a2.js" crossorigin="anonymous"></script>
</head>
<aside class="main-sidebar sidebar-light-danger elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link navbar-danger text-light">
    <img src="{{ asset('img/logoSistemas.png') }}" alt="logo ing. de sistemas"
    style="height:70px; width:230px">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset(Auth::guard('admin')->user()->person->fullAsset()) }}" class="img-circle img-fluid"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.settings') }}" class="d-block">{{ Auth::guard('admin')->user()->person->fullName() }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search" data-highlight-class='text-dark'
                data-not-found-text='No encontrado'>
                <input class="form-control form-control-sidebar " type="search" placeholder="Buscar"
                    aria-label="Search" highlightClass="text-dark" style="height:20%">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                     <li class="nav-item">
                        <a href="{{ route('admin.home') }}" class="nav-link">
                        <i class="fa-sharp fa-solid fa-gauge-high"></i>
                            <p>
                                Dashboard
    
                            </p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="{{ route('admin.graduates.index') }}" class="nav-link">
                    <i class="fa-solid fa-user"></i>
                        <p>
                            Graduados

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.posts.index') }}" 
                    class="nav-link">
                    <i class="fa-sharp fa-solid fa-file"></i>
                        <p>
                            Contenidos informativos
                        </p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="fa-sharp fa-solid fa-chart-pie"></i>
                        <p>
                            Reportes
                            <em class="right fas fa-angle-down"></em>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.reports.statistics') }}" class="nav-link">
                                <em class="far fa-circle nav-icon"></em>
                                <p>Estadísticas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.reports.graduates') }}" class="nav-link">
                                <em class="far fa-circle nav-icon"></em>
                                <p>Reportes</p>
                            </a>
                        </li>
                    </ul>
                </li>

                
                <li class="nav-item">
                    <a href="{{ route('admin.experiences') }}" class="nav-link">
                    <i class="fas fa-video"></i>
                        <p>
                            Experiencias de Graduados
                        
                        </p>
                    </a>
                </li>

                        <li class="nav-item">
                            <a href="{{route('admin.solicitudes')}}" class="nav-link">
                            <i class="fa-sharp fa-solid fa-file"></i>
                                <p>Solicitudes y Trámites</p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="{{route('admin.situacionGraduados.index')}}" class="nav-link">
                            <i class="fa-solid fa-sack-dollar"></i>
                                <p>Situación Graduados</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.graduateQuality.index')}}" class="nav-link">
                            <i class="fa-sharp fa-solid fa-file"></i>
                                <p>Graduados con Calidad</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="fa-solid fa-star"></i>
                                <p>Encuestas</p>
                            </a>
                        </li>
                            <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="fa-solid fa-magnifying-glass-dollar"></i>
                        <p>
                            Vacantes
                            <em class="right fas fa-angle-down"></em>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.empleos.index')}}" class="nav-link">
                                <em class="far fa-circle nav-icon"></em>
                                <p>Publicar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <em class="far fa-circle nav-icon"></em>
                                <p>De Empresas</p>
                            </a>
                        </li>
                    </ul>
                </li>

                    <li class="nav-item">
                    <a href="{{ route('admin.settings') }}" class="nav-link">
                    <i class="fa-solid fa-gear"></i>
                        <p>
                            Ajustes

                        </p>
                    </a>
                </li>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- ./Main Sidebar -->
