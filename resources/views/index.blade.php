
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lubrillantas Jezreel AG</title>


        <!-- Fuente de google: Open Sans - Regular 400 -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


        <!--Importar CSS y script del menÃº -->
        <link rel="stylesheet" href="{{ asset('css/menu.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/index.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">



        <!--Link del boostrap-->
        <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">


    </head>
    <body >


        <!--MenÃº -->
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark">
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
                            <a class="nav-link active" aria-current="page" href="index.jsp">INICIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<%=basePath%>jsp/nosotros.jsp">NOSOTROS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<%=basePath%>MostrarServicios.do">SERVICIOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<%=basePath%>MostrarProductos.do">PRODUCTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<%=basePath%>MostrarServiciosCotizacion.do">COTIZA YA!</a>
                        </li>
                    </ul>

                   {{--  <template id="NoSesion"> --}}
                        <ul class="navbar-nav ml-auto m-4">
                            <li class="nav-item">
                                <a class="nav-link" href="">INICIAR SESIÓN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">REGISTRARSE</a>
                            </li>
                        </ul>
                   {{--  </template>
 --}}
                    <template id="SiSesion">
                        <ul class="navbar-nav ml-auto m-4">
                            <li class="nav-item dropdown" style="list-style-type: none;">
                                <a  class="nav-link dropdown-toggle link-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                                   
                                </a>
                                <ul class="dropdown-menu text-small "aria-labelledby="dropdownUser2"  >
                                    <li><a class="dropdown-item" href="<%=basePath%>./jsp/datosCliente.jsp" >Mi Cuenta</a></li>
                                    <li><a class="dropdown-item" href="<%=basePath%>MisVehiculos.do" >Mis Vehiculos</a></li>
                                    <li><a class="dropdown-item" href="<%=basePath%>MisServiciosUsu.do" >Mis Servicios</a></li>
                                    <li><a class="dropdown-item" href="<%=basePath%>MostrarCitasUsu.do" >Mis Citas</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<%=basePath%>/cerrarSesion.do">Salir</a></li>
                                </ul>
                            </li>

                            <div class="user">
                                <img src="" width="70" height="70" class="rounded-circle me-2">
                            </div>

                        </ul>
                    </template>



                </div>
            </div>
        </nav>
        <!--Fin MenÃº -->


        <!--Carrusel-->
        <section class="contenido">
            <div class="container-all">
                <input type="radio" id="1" name="image-slide" hidden/>
                <input type="radio" id="2" name="image-slide" hidden/>
                <input type="radio" id="3" name="image-slide" hidden/>

                <div class="slide">
                    <div class="item-slide">
                        <img id="background" src="./img/ufps1.png" style="filter:brightness(45%)">
                        <div class="carousel-caption d-flex flex-column justify-content-center h-100 txt-carousel">
                            
                        </div>

                    </div>

                    <div class="item-slide">
                        <img id="background" src="./img/ufps2.jpg" style="filter:brightness(45%)">
                        <div class="carousel-caption d-flex flex-column justify-content-center h-100 txt-carousel">
                            
                        </div>
                    </div>

                    <div class="item-slide">
                        <img id="background" src="./img/ufps3.jpeg" style="filter:brightness(45%)">
                        <div class="carousel-caption d-flex flex-column justify-content-center h-100 txt-carousel">
                           
                        </div>
                    </div>

                </div>

                <div class="pagination">

                    <label class="pagination-item" for="1">
                        <img id="background-p" src="./img/ufps1.png">

                    </label>

                    <label class="pagination-item" for="2">
                        <img id="background-p" src="./img/ufps2.jpg">
                    </label>

                    <label class="pagination-item" for="3">
                        <img id="background-p" src="./img/ufps3.jpeg">
                    </label>

                </div>

            </div>

        </section>
        <!--Fin de carrusel-->

        <!--Sobre nosotros-->
        <section class="mt-4 mb-4">
            <div id="content">
                <div id="left">
                    <img src="./img/home.jpeg" height="400px" alt=""> 
                </div>

                <div id="right">
                    <h1 style="color: #858585; font-weight: boild;">SOBRE NOSOTROS</h1>
                    <h1>Quienes <p style="color: blue; display: inline;">somos</p></h1>
                    <hr size="20"  style="background-color:#2F80ED;">
                    <p class="texto">LUBRILLANTAS JEZREEL AG es una micro-empresa que se desempeña en el sector comercial relacionado con los vehiculos, en el que ofrece todo tipo de servicios de mantenimiento de cambio de aceite, servicio de frenos de suspension, montallantas y venta de productos. Llevamos
                        más de 20 años en el mercado, ofreciendo servicios y productos de alta calidad, en pro y beneficio de nuestros clientes.
                    </p>
                    <div class="row">



                        <div class="col-md-4"></div>
                        <div class="col-md-6"> 	
                            <input class="boton3" id="botonLeerMas" type="button" value="Leer mas" onclick="location.href = '<%=basePath%>jsp/nosotros.jsp'">
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </section>
        <!--Fin sobre nosotros-->


        <section class="contenido mt-5 mb-5">

            <div class="container">

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <h1 >SÁCALE EL MEJOR RENDIMIENTO A TU VEHÍCULO CON NUESTROS <p style="color: blue; display: inline;">SERVICIOS</p></h1>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </section>

     

        <div class="container">
            <div class="row galeria">
                <div class="col-md-6  mb-5 colum">

                    <a href="https://academiarallymontecarlo.com/wp-content/uploads/2020/03/bigstock-sistema-de-lubricaci%C3%B3n-aceite-auto.jpg"  data-lightbox="galeriaS" data-title="Nombre servicio"> <img src="https://academiarallymontecarlo.com/wp-content/uploads/2020/03/bigstock-sistema-de-lubricaci%C3%B3n-aceite-auto.jpg" alt=""></a>
                    <div class="titulo">Titulo imagen ejemplo </div>

                </div>

                <div class="col-md-6 mb-5 colum">
                    <a href="https://i.blogs.es/f21c04/frenos-coche/1366_2000.jpg" data-lightbox="galeriaS" data-title="Nombre servicio"> <img src="https://i.blogs.es/f21c04/frenos-coche/1366_2000.jpg" alt="" ></a>
                    <div class="titulo">Titulo imagen ejemplo </div>
                </div>

                <div class="col-md-6 mb-5 colum">

                    <a href="https://www.sanvicentedechucuri.com/wp-content/uploads/2020/04/montallantas-1.jpg" data-lightbox="galeriaS" data-title="Nombre servicio"> <img src="https://www.sanvicentedechucuri.com/wp-content/uploads/2020/04/montallantas-1.jpg" alt="" ></a>
                    <div class="titulo">Titulo imagen ejemplo </div>
                </div>

                <div class="col-md-6 mb-5 colum">

                    <a href="https://noticias.coches.com/wp-content/uploads/2013/11/filtro-de-aire-sucio.jpg"  data-lightbox="galeriaS" data-title="Nombre servicio"> <img src="https://noticias.coches.com/wp-content/uploads/2013/11/filtro-de-aire-sucio.jpg" alt=""></a>
                    <div class="titulo">Titulo imagen ejemplo </div>
                </div> 

            </div>


        </div>


        <section class="contenido mt-3 mb-5">
            <div class="col-md-2"></div>
            <div class="col-md-8"> 		
                <input class="boton2" id="botonServicios" type="button" value="Ver todos" onclick="location.href = '<%=basePath%>MostrarServicios.do'">
            </div>
            <div class="col-md-2"></div>
        </section>



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
                        <h4 > CONTACTO </h4>
                        <P>Av 5 # 0N-54 Barrio La Merced</P>
                        <p>San José de Cúcuta - Colombia</p>
                        <p>albeirofonseca74@gmail.com</p>
                        <p>+57 3112810082</p>
                    </div>

                </div>
            </div>
        </footer>
        <!--FIN FOOTER-->


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


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