@extends('layouts.app')

@section('title', 'Perfil Admin')


@section('content')

    <!-- Main content -->
    <div class="container-fluid col-10 my-4">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header  border-info">
                        <h3 class="card-title"><b>Mis datos personales</b> </h3>
                    </div>



                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            <!-- Contenido Principal de los datos del  cliente-->
                            <div class="d-flex flex-column col-7">
                                <div>
                                    <form class="row" id="form-datos" action="">
                                        <div class="col-md-6">
                                            <label for="nombre" class="form-label">Nombres</label>
                                            <h5 id="datos">{{ Auth::guard('web')->user()->person->name }}</h5>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="apellidos" class="form-label">Apellidos</label>
                                            <h5 id="datos">{{ Auth::guard('web')->user()->person->lastname }} </h5>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputCity" class="form-label">Cédula</label>
                                            <h5 id="datos">{{ Auth::guard('web')->user()->person->document }}</h5>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="celular" class="form-label">Celular</label>
                                            <h5 id="datos">{{ Auth::guard('web')->user()->person->phone }}</h5>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">E-mail</label>
                                            <h5 id="datos">{{ Auth::guard('web')->user()->person->email }}</h5>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Dirección</label>
                                            <h5 id="datos">{{ Auth::guard('web')->user()->person->address }}</h5>

                                        </div>

                                        <div class="col-6 align-content-left mt-4 ">

                                        </div>
                                </div>
                                </form>
                                <div class="row">
                                    <div class="col-6">
                                        <input href="#" class="btn btn-danger" value="Editar Datos Personales"
                                            disabled>
                                    </div>
                                    <div class="col-6">
                                        <input href="#" class="btn btn-danger" value="Editar Contraseña" disabled>
                                    </div>
                                </div>
                                <div class="container mt-4">
                                    <small class="text-danger">Funcionalidades para Software..</small>
                                </div>
                            </div>

                            <div class="d-flex flex-column col-4">

                                <div class="card card-danger card-outline">
                                    <div class="card-body box-profile">

                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="{{ asset(Auth::guard('web')->user()->person->fullAsset()) }}"
                                                alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center">Pilar Rodriguez</h3>

                                        <p class="text-muted text-center">Directora del programa</p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->


                                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}

                            </div>

                        </div>

                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.col -->

            </div>
            {{-- </div> --}}
            <!-- /.card -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
