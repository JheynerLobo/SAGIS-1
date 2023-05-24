<!-- Navbar -->
<nav class="navbar navbar-expand-lg  navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.jsp">
            <img src="https://ingsistemas.cloud.ufps.edu.co/rsc/img/logo_ingsistemas_vertical_invertido.png"
                alt="" width="140px" height="120px" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ isActiveRoute('home', 'active') }}" aria-current="page"
                        href="{{ route('home') }}">INICIO</a>

                        <li class="nav-item">
                <div class="dropdown" >
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background:#B43432;margin-top:6px;color:white">
                        CONTENIDOS INFORMÁTICOS
                    </button>
                    <ul class="dropdown-menu" >
                        <li><a class="dropdown-item" class="nav-link {{ isActiveRoute('notices', 'active') }}"
                        href="{{ route('notices') }}">NOTICIAS</a></li>
                        <li><a class="dropdown-item" class="nav-link {{ isActiveRoute('courses', 'active') }}" href="{{ route('courses') }}">CURSOS</a></li>
                        <li><a class="dropdown-item" class="nav-link {{ isActiveRoute('events', 'active') }}" href="{{ route('events') }}">EVENTOS</a></li>
                        <li><a class="dropdown-item" class="nav-link {{ isActiveRoute('gallerys', 'active') }}"href="{{ route('gallerys') }}">GALERIA</a></li>
                        <li><a class="dropdown-item" class="nav-link {{ isActiveRoute('videos', 'active') }}"href="{{ route('videos') }}">VIDEOS</a></li>
                    </ul>
</div>
                </li>
                
                <li class="nav-item">
                <div class="dropdown" >
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background:#B43432;margin-top:6px;color:white">
                        GRADUADOS DE HONOR
                    </button>
                    <ul class="dropdown-menu" >
                        <li><a class="dropdown-item"  class="nav-link {{ isActiveRoute('experiences', 'active') }} "
                        href="{{ route('experiences') }}" style="text-align:center">EXPERIENCIAS</a></li>
                        <li><a class="dropdown-item" href="#" style="text-align:center">PREMIO AL MERITO</a></li>
                    </ul>
</div>
                <li class="nav-item">
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background:#B43432;margin-top:6px;color:white">
                        BOLSA DE EMPLEO
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"  class="nav-link {{ isActiveRoute('empleos', 'active') }} "
                        href="{{ route('empleos') }}">ING. SISTEMAS</a></li>
                        <li><a class="dropdown-item" href="https://jobboard.universia.net/graduadosufps">UFPS</a></li>
                    </ul>
</div>
                    <li class="nav-item">
                    <a class="nav-link {{ isActiveRoute('solicitudes', 'active') }} "
                        href="{{ route('solicitudes') }}">SOLICITUDES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{isActiveRoute('situacionGraduados','active')}}"
                        href="{{route('situacionGraduados')}}">ESTADÍSTICAS</a>
                </li>
                    


            </ul>

            @auth
                {{-- <template id="SiSesion"> --}}
                <ul class="navbar-nav ml-auto m-2">
                    <li class="nav-item dropdown" style="list-style-type: none;">
                        <a class="nav-link dropdown-toggle link-dark" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth()->user()->person->fullname() }}
                            <hr>
                            {{ Session::get('role')->fullname }}
                        </a>
                        <ul class="dropdown-menu text-small " aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Mi perfil</a></li>
                            <li><a class="dropdown-item" href="{{ route('academics') }}">Datos académicos</a></li>
                            <li><a class="dropdown-item" href="{{ route('jobs') }}">Datos laborales</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="javascript:void(0);"
                                    onclick="event.preventDefault(); $('#logout').submit();">Salir</a></li>

                            <form action="{{ route('logout') }}" method="post" id="logout">
                                @csrf
                            </form>
                        </ul>
                    </li>

                    <div class="user">
                        <img src="{{ asset(Auth::guard('web')->user()->person->fullAsset()) }}" width="70"
                            height="70" class="rounded-circle me-2">
                    </div>

                </ul>
                {{-- </template> --}}
            @endauth

            @guest
                <ul class="navbar-nav ml-auto m-2">
                    <li class="nav-item ml-auto m-4">
                        <a class="nav-link" href="{{ route('login') }}">INICIAR SESIÓN</a>
                    </li>
                </ul>
            @endguest

        </div>
    </div>
</nav>
<!-- ./Navbar -->
