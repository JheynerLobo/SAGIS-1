@extends('dev.admin.layouts.app')

@section('title', 'Datos del graduado')

@section('content')

    <!-- Main content -->
    <section class="content mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><b>Datos personales</b> </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Cédula</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Código</th>
                                            <th>Celular</th>
                                            <th>Correo institucional</th>
                                            <th>Correo personal</th>
                                            <th>Telefono fijo</th>
                                            <th>Fecha nacimiento</th>
                                            <th>Lugar nacimiento</th>
                                            <th>Dirección residencia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1006287478</td>
                                            <td>Jarlin Andres</td>
                                            <td>Fonseca Bermon</td>
                                            <td>1151758</td>
                                            <td>3013206613</td>
                                            <td>jarlinandresfb@ufps.edu.co</td>
                                            <td>jarlinandres@gmail.com</td>
                                            <td>5703888</td>
                                            <td>14/11/2000</td>
                                            <td>Colombia - Norte de Santander - Cúcuta</td>
                                            <td>Calle 1 # 0-50 Condominio Casa Real Barrio La Florida</td>

                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- Academic Information -->
                    <div class="card">
                        <div class="card-header  border-info">
                            <h3 class="card-title"><b>Datos académicos</b> </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nivel Académico</th>
                                            <th>Nombre Programa</th>
                                            <th>Universidad</th>
                                            <th>Año Graduado</th>
                                            <th>¿Tiene estudios potsgrados? </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Especialista</td>
                                            <td>Especializacion en Gerencia</td>
                                            <td>Universidad Francisco de Paula Santander</td>
                                            <td>2010</td>
                                            <td>SI</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Magister</td>
                                            <td>Magister en Software</td>
                                            <td>Universidad de Santander</td>
                                            <td>2000</td>
                                            <td>SI</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->


                    </div>
                    <!-- ./Academic Information -->

                    <!-- Job Information -->
                    <div class="card">
                        <div class="card-header  border-info">
                            <h3 class="card-title"><b>Datos laborales</b> </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nombre Empresa</th>
                                            <th>Cargo Ocupado</th>
                                            <th>Lugar Empresa</th>
                                            <th>Dirección Empresa</th>
                                            <th>Tipo Empresa</th>
                                            <th>Correo Empresa</th>
                                            <th>Telefono Empresa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Pragma</td>
                                            <td>Frontend Senior</td>
                                            <td>Colombia - Antioquia - Medelin</td>
                                            <td>Calle de las Gordas</td>
                                            <td>Desarrollo</td>
                                            <td>pragma@gmai.com</td>
                                            <td>3154568798</td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>Apple</td>
                                            <td>Frontend Senior</td>
                                            <td>EE.UU - Los Angeles</td>
                                            <td>Street 7</td>
                                            <td>Desarrollo y tecnologia</td>
                                            <td>applle@gmai.com</td>
                                            <td>987554885</td>
                                        </tr>





                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->


                    </div>
                    <!-- ./ Job Information -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>


@endsection

@section('datatables')
    <!-- DataTables  & Plugins -->


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src=" https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

@endsection


@section('jsTables')



    $(document).ready(function () {
    $('table.display').DataTable({
" language": { "url" : "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" } } ); }); @endsection
