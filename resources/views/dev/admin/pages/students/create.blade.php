@extends('dev.admin.layouts.app')

@section('title', 'active')

@section('content-header')
    @include('dev.admin.partials.content-header', [
        'title' => 'Graduados',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('dev.home'),
                'isActive' => null,
            ],
            [
                'name' => 'Graduados',
                'route' => route('dev.students.create'),
                'isActive' => null,
            ],
            [
                'name' => 'Registrar',
                'route' => null,
                'isActive' => 'active'
            ]
        ],
    ])
@endsection


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">



                    <div class="card">
                        <div class="card-header  border-info">
                            <h3 class="card-title"><b>Datos personales</b> </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="./AdminAddProducto.do" method="GET">
                                <div class="row text-center m-3">

                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputCedula" class="form-label">Cedula</label>
                                            <input type="number" class="form-control " name="cedula"
                                                id="exampleInputCedula" required>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputNombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control " name="nombre"
                                                id="exampleInputNombre" required>

                                        </div>


                                    </div>

                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputApellido" class="form-label">Apellido</label>
                                            <input type="text" class="form-control " name="apellido"
                                                id="exampleInputApellido" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputCodigo" class="form-label">Código</label>
                                            <input type="number" class="form-control " name="codigo"
                                                id="exampleInputCodigo" required>
                                        </div>

                                    </div>
                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputCelular" class="form-label">Celular</label>
                                            <input type="number" class="form-control " name="celular"
                                                id="exampleInputCedlular" required>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputCI" class="form-label">Correo institucional</label>
                                            <input type="email" class="form-control " name="CI" id="exampleInputCI"
                                                pattern=".+@ufps.edu.co" size="30" required>

                                        </div>


                                    </div>

                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputCP" class="form-label">Correo personal</label>
                                            <input type="email" class="form-control " name="CP" id="exampleInputCP"
                                                size="30">

                                        </div>


                                    </div>
                                </div>

                                <h3 style="font-size: 1.1rem; font-weight: bolder">Datos académicos:</h3>
                                <hr class="border-info">


                                <div class="row text-center m-3">

                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputNA" class="form-label">Nivel Académico</label>
                                            <input type="text" class="form-control " name="NA" id="exampleInputNA">
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputNP" class="form-label">Nombre Programa</label>
                                            <input type="text" class="form-control " name="NP" id="exampleInputNP"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputAGP" class="form-label">Año Grado Pregrado</label>
                                            <input type="number" class="form-control " name="AGP" id="exampleInputAGP">
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputU" class="form-label">Nombre Universidad</label>
                                            <input type="text" class="form-control " name="U"
                                                id="exampleInputU" required>
                                        </div>

                                    </div>
                                </div>



                                <h3 style="font-size: 1.1rem; font-weight: bolder">Datos laborales:</h3>
                                <hr class="border-info">


                                <div class="row text-center m-3">

                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputEmpresa" class="form-label">Nombre Empresa</label>
                                            <input type="text" class="form-control " name="empresa"
                                                id="exampleInputEmpresa">
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputCargo" class="form-label">Cargo Ocupado</label>
                                            <input type="text" class="form-control " name="cargo"
                                                id="exampleInputCargo">
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputSalario" class="form-label">Salario</label>
                                            <input type="number" class="form-control " name="salario"
                                                id="exampleInputSalario">
                                        </div>

                                    </div>



                                    {{-- <div class="col-md-4">
                                    <div class="mb-3">

                                        <label for="exampleInputCant" class="form-label">Tipo</label>
                                        <select class="form-select" name="tipo" aria-label="Default select example"
                                            required>
                                            <option value="">Selecciona un tipo:</option>
                                            <option value="1">ACEITES</option>
                                            <option value="2">FILTROS</option>
                                            <option value="3">VALVULINAS</option>
                                            <option value="4">ADITIVOS</option>
                                            <option value="5">LLANTAS</option>
                                            <option value="6">BUJIAS</option>
                                            <option value="7">LUCES</option>
                                        </select>
                                    </div>


                                </div> --}}








                                </div>
                                <div class="modal-footer mt-2 " id="foterM">
                                    <button type="button" class="btn btn-danger btn-lg">Cancelar</button>
                                    <button type="submit" class="btn btn-info btn-lg">Guardar</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-body -->


                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>


@endsection
