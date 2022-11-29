@extends('layouts.app')

@section('title', 'Perfil Graduado')

@section('css')
<style>
    body {
        background-color: #f4f6f9;
    }
    .profile-user-img {
    border: 3px solid #adb5bd;
    margin: 0 auto;
    padding: 3px;
    width: 100%;
}

    </style>


@endsection


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

                        @if(graduate_user()->person->has_data_person() == false)
                        <a href="{{ route('validate_person') }}" class="btn btn-sm btn-warning mb-3">Los datos personales están actualizados</a>
                        @endif

                        <div class="row">
                            <!-- Contenido Principal de los datos del  cliente-->
                            <div class="d-flex flex-column col-7">
                                <div>
                                    <form class="row" id="form-datos" action="">
                                        <div class="col-md-6">
                                            <label for="nombre" class="form-label">Nombres</label>
                                            <p id="datos">{{ graduate_user()->person->name }}</p>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="apellidos" class="form-label">Apellidos</label>
                                            <p id="datos">{{ graduate_user()->person->lastname }} </p>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputCity" class="form-label">Cédula</label>
                                            <p id="datos">{{ graduate_user()->person->document }}</p>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputCity" class="form-label">Código:</label>
                                            <p id="datos">{{ graduate_user()->code }}</p>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="celular" class="form-label">Celular</label>
                                            <p id="datos">{{graduate_user()->person->phone }}</p>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="celular" class="form-label">Telefono</label>
                                            <p id="datos">{{graduate_user()->person->telephone }}</p>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Correo personal</label>
                                            <p id="datos">{{ graduate_user()->person->email }}</p>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Correo institucional</label>
                                            <p id="datos">{{ graduate_user()->email }}</p>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Fecha de nacimiento</label>
                                            <p id="datos">{{ graduate_user()->person->birthdate }}</p>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Lugar de nacimiento</label>
                                            <p id="datos">{{ graduate_user()->person->birthdatePlace->name }}</p>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Correo institucional</label>
                                            <p id="datos">{{ graduate_user()->email }}</p>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Dirección</label>
                                            <p id="datos">{{ graduate_user()->person->address }}</p>

                                        </div>

                                        <div class="col-6 align-content-left mt-4 ">

                                        </div>
                                </div>
                                </form>
                                <div class="row">
                                    <div class="col-6">
                                        <a style="text-decoration: none; color: #000000;"
                                        href="{{ route('profile.edit') }}">

                                            <button type="button" class="btn btn btn-danger">Editar Datos Personales</button>
                                        </a>

                                        
                                    </div>
                                    <div class="col-6">
                                        <a style="text-decoration: none; color: #000000;"
                                                            href="{{ route('profile.edit_password') }}">

                                                            <button type="button" class="btn btn btn-danger ">Editar Contraseña</button>
                                                        </a>
                                    </div>
                                </div>

                            </div>

                            <div class="d-flex flex-column col-4 justify-content-center ">

                                <div class="card card-danger card-outline" id="card">
                                    <div class="card-body box-profile">

                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-box  max-width: 100% " 
                                                src="{{ asset(graduate_user()->person->fullAsset()) }}"
                                                alt="User profile picture">
                                        </div>

                                        <h1 class="profile-username text-center">{{ graduate_user()->person->name }} {{ graduate_user()->person->lastname }}</h1>

                                        <p class="text-muted text-center">Graduado</p>
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
            </div>
            <!-- /.card -->

        </div>
        <!-- /.row -->
    {{-- </div> --}}
    <!-- /.container-fluid -->
@endsection
