
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('tittle')</title>


        <!-- Fuente de google: Open Sans - Regular 400 -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

           <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

        <!--Importar CSS y script del menÃº -->
        <link rel="stylesheet" href="{{ asset('css/menu.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/index.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">



        <!--Link del boostrap-->
        <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">


    </head>
    <body >


           
        <!--MenÃº  sticky-top-->
        <nav class="navbar navbar-expand-lg  navbar-dark">
            <div class="container-fluid">

                <a class="navbar-brand" href="index.jsp">
                    <img src="https://ingsistemas.cloud.ufps.edu.co/rsc/img/logo_ingsistemas_vertical_invertido.png" alt="" width="140px" height="120px" />
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link @yield('activeIni')" aria-current="page" href="{{ route('inicio') }}">INICIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('activeNot')" href="{{ route('noticias') }}">NOTICIAS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('activeCur')" href="{{ route('cursos') }}">CURSOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('activeEven')" href="{{ route('eventos') }}">EVENTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('activeGale')" href="{{ route('galeria') }}">GALERIA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('activeVid')" href="{{ route('videos') }}">VIDEOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @yield('activeBol')" href="https://jobboard.universia.net/graduadosufps">BOLSA DE EMPLEO</a>
                        </li>


                        <template id="SiSesion">
                        <li class="nav-item">
                            <a class="nav-link @yield('activeAdmin')" href="">ADMIN</a>
                        </li>
                    </template> 
                    </ul>

  {{-- 
                    <template id="SiSesion"> --}}
                        <ul class="navbar-nav ml-auto m-4">
                            <li class="nav-item dropdown" style="list-style-type: none;">
                                <a  class="nav-link dropdown-toggle link-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                                   Jarlin Fonseca
                                </a>
                                <ul class="dropdown-menu text-small "aria-labelledby="dropdownUser2"  >
                                    <li><a class="dropdown-item" href="<%=basePath%>./jsp/datosCliente.jsp" >Mi perfil</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<%=basePath%>/cerrarSesion.do">Salir</a></li>
                                </ul>
                            </li>

                            <div class="user">
                                <img src="./img/imgUser.png" width="70" height="70" class="rounded-circle me-2">
                            </div>

                        </ul>
                   {{--  </template> --}}



                </div>
            </div>
        </nav>
        <!--Fin MenÃº -->



        @yield('content')

    


        <!--FOOTER-->
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 redes" style="background-color: #333333">
                        <a href="https://api.whatsapp.com/send/?phone=573112810082&text&app_absent=0"><img src="/img/whatsapp.png" ></a>
                        <a href="https://web.facebook.com/profile.php?id=100075532121136"><img src="/img/facebook.png" ></a>
                        <a href="https://www.instagram.com/lubrillantasjag/"><img src="/img/instagram.png" ></a>
                    </div>
                </div>
                <div class="row" style="background-color: #272727">

                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 mt-4">
                        <img src="https://ingsistemas.cloud.ufps.edu.co/rsc/img/logo_ufps.png" alt="Logo Jezreel" id="imgFooter">
                    </div>


                    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                        <img src="https://ingsistemas.cloud.ufps.edu.co/rsc/img/logo_ingsistemas_vertical_invertido.png" alt="Logo Jezreel" id="imgFooter">
                    </div>

                    <div class="col-12  col-sm-3 col-md-3 col-lg-3 horario" >
                        <h4 >HORARIOS DE ATENCIÓN</h4>
                        <p>Lunes a Viernes</p>
                        <p>7:30 AM a 6:00 PM</p>
                        <p>Sábado</p>
                        <p>7:30 AM a 5:00 PM</p>
                    </div>

                    <div class="col-12  col-sm-3 col-md-3 col-lg-3 footer-contacto" >
                        <h4 > CONTACTOS </h4>
                         <!-- Address -->
           
                <address class="md-margin-bottom-40 text-white">
  Programa de Ingeniería de Sistemas de la Universidad Francisco de Paula Santander<br>Acreditación de alta calidad según resolución No. 15757 del Ministerio de Educación Nacional<br>Avenida Gran Colombia No. 12E-96 Barrio Colsag, Cúcuta, Colombia<br>Teléfono (57) 7 5776655 Extensiones 201 y 203<br>Correo electrónico: ingsistemas@ufps.edu.co              </address>
              </div><!--/col-md-3-->
              <!-- End Address -->
                    </div>

                </div>
            </div>
        </footer>
        <!--FIN FOOTER-->


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

           <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

    <!-- Font Awesome -->
   <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
       integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
   </script>

        <script src="{{ asset('js/ligthboxjs/lightbox-plus-jquery.min.js') }}"></script>
        <script src=" {{ asset('js/sesion.js') }}"></script>
       
        <!--  <script>
           lightbox.option({
             'maxWidth' : 800,
             'width' : 800,
             'maxHeight' : 300,
           })
       </script> -->


    </body>
</html>