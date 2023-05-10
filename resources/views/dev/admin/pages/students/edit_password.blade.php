@extends('admin.layouts.app')

@section('title', 'active')

@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Graduados',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('admin.home'),
                'isActive' => null,
            ],
            [
                'name' => 'Graduados',
                'route' => route('dev.students.create'),
                'isActive' => null,
            ],
            [
                'name' => 'Editar',
                'route' => null,
                'isActive' => 'active',
            ],
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
                            <h3 class="card-title"><b>Contraseña</b> </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="" method="POSt">
                                <div class="row text-center m-3">

                                    <div class="col-md-6">
                                        <label for="actual" class="form-label">Contraseña Actual</label>
                                        <input type="text" class="form-control" id="actual" name="actual"
                                            value="Aqui se trae la contraseña" disabled>
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="newContraseña" class="form-label">Nueva Contraseña</label>
                                        <input type="password" class="form-control" id="newContraseña" name="newpassword"
                                            required>
                                    </div>


                                </div>




                                <div class="modal-footer mt-2 " id="foterM">
                                    <button type="button" class="btn btn-danger btn-lg">Cancelar</button>
                                    <button type="submit" class="btn btn-info btn-lg">Guardar Contraseña</button>
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
