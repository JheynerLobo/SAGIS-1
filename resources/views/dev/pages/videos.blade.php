@extends('dev.layouts.app')

@section('tittle', 'Videos SAGIS')

@section('content')

<!-- Main content -->
<section class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="simple-results.html">
                    <div class="input-group">
                        <input type="search" class="form-control form-control-lg" placeholder="Busca en Videos">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-lg btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</div>


<div class="container">

    <div class="row">

        <div class="col-md-6 mt-5">

            <div class="row">

                <div class="col-md-3">

                    <p> <b>Ordenar por:</b></p>

                </div>

                <div class="col-md-9">

                    <div class="row">
                        <div class="col-md-3">
                            <a href="">
                                <p>Recientes</p>
                            </a>

                        </div>
                        <div class="col-md-9">
                            <a href="">
                                <p>A-Z</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="row">
                <!--fecha ini -->
                <div class="col-md-5">
                    <div class="row mt-5">
                        <label class="col-sm-3 col-form-label">Desde:</label>
                        <div class="col-sm-8">
                            <input id="inicial" name="inicial" onclick="desabilitar()" type="date" class="form-control">
                        </div>
                    </div>
                </div>

                <!--fecha fin -->
                <div class="col-md-5">
                    <div class="row mt-5 mr-3">
                        <label class="col-sm-3 col-form-label">Hasta:</label>
                        <div class="col-sm-8">
                            <input onclick="limitarFecha()" name="final" id="final" type="date" class="form-control">
                        </div>
                    </div>
                </div>

                <!--fecha boton -->
                <div class="col-md-2">
                    <button type="submit" class="btn btn-danger btn-lg mt-5  btn-circle "><i
                            class="fa fa-check"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<section class=" mt-5 mb-5">


    <div class="container ">
        <div class="row  g-5">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card " style="width: 21rem; height: 580px;">
                    <iframe height="220px" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="card-body">
                        <p class="fecha">Mayo 05 2022</p>
                        <h5 class="card-title"> <a href="" class="vinculoTitulo">Conferencia de la "Innovación para la
                                competitividad de la empresas" </a></h5>
                        <p class="card-text">En el marco del SEXTO ENCUENTRO INTERNACIONAL EN CIENCIAS APLICADAS E
                            INGENIERÍA (UNIVERSIDAD-INDUSTRIA) EISI 2022”, se invita a participar en las diferentes
                            actividades que se tienen programadas.</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="botonGC btn btn-danger">Leer más...</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card" style="width: 21rem; height: 580px;">
                    <iframe height="220px"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                
                  {{--   <video src="video.webm" poster="presentacion.jpg" controls></video> --}}
                  
                    <div class="card-body">
                        <p class="fecha">Junio 05 2022</p>
                        <h5 class="card-title"> <a href="" class="vinculoTitulo">Taller Seguridad Cloud - Mayo 6</a>
                        </h5>
                        <p class="card-text">En el marco del SEXTO ENCUENTRO INTERNACIONAL EN CIENCIAS APLICADAS E
                            INGENIERÍA (UNIVERSIDAD-INDUSTRIA) EISI 2022”, se invita a participar en las diferentes
                            actividades que se tienen programadas.

                            Actividades pre -evento desde el mes de abril hasta agosto.</p>
                    </div>


                    <div class="card-footer">
                        <a href="#" class="botonGC btn btn-danger">Leer más...</a>

                    </div>
                </div>

            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card" style="width: 21rem; height: 580px;">
 
                    <iframe height="220px"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="card-body">
                        <p class="fecha">Mayo 09 2022</p>
                        <h5 class="card-title"> <a href="" class="vinculoTitulo">Profesores Ponentes Semana CyT</a>
                        </h5>
                        <p class="card-text">PONENCIAS DE PROFESORES SEMANA DE CIENCIA Y TECNOLOGÍA 6 al 9 de octubre
                            -2020

                            En el marco de la VII Semana de Ciencia, Tecnologia e Innovación, los profesores del
                            Departamento de Sistemas e Informática presentan resultados de los trabajos de investigación
                        </p>
                    </div>

                    <div class="card-footer">
                        <a href="#" class="botonGC btn btn-danger">Leer más...</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="card" style="width: 21rem; height: 580px;">
                    <iframe height="220px"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="card-body">
                        <p class="fecha">Mayo 05 2022</p>
                        <h5 class="card-title"> <a href="" class="vinculoTitulo">Cafe TIC 2021-2</a> </h5>
                        <p class="card-text">Para el Programa de Ingeniería de Sistemas de la UFPS es grato invitarlo a
                            la charla " Soluciones I+D a través del desarrollo de algoritmos inteligentes” en el espacio
                            "Café TIC" actividad que se viene desarrollando periódicamente para compartir y socializar
                            experiencias profesionales y académicas de nuestros graduados.</p>
                    </div>

                    <div class="card-footer">
                        <a href="#" class="botonGC btn btn-danger">Leer más...</a>
                    </div>
                </div>
            </div>



        </div>


    </div>
</section>

@endsection


