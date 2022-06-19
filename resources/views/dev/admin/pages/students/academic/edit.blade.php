@extends('dev.admin.layouts.app')

@section('title', 'Editar Estudios Potsgrado')

@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header  border-info">
                            <h3 class="card-title"><b>Datos estudios Potsgrados</b> </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form action="./AdminAddProducto.do" method="GET">
                                <div class="row text-center m-3">


                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputNombrePrograma" class="form-label">Nombre
                                                Programa</label>
                                            <input type="number" class="form-control " name="nombrePrograma"
                                                id="exampleInputNombrePrograma" required>

                                        </div>


                                    </div>

                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputU" class="form-label">Universidad</label>
                                            <input type="text" class="form-control " name="universidad"
                                                id="exampleInputU" required>
                                        </div>
                                    </div>


                                    <div class="col-md-4">

                                        <div class="mb-3 ">
                                            <label for="exampleInputAnio" class="form-label">Año graduado</label>
                                            <input type="number" class="form-control " name="anioGraduado"
                                                id="exampleInputAnio" required>
                                        </div>

                                    </div>



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
