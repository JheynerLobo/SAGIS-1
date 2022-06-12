@extends('../layouts/layoutadmin')

@section('graduadoA', 'active')

@section('content2', 'Editar datos de graduado')


@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">



                <div class="card">
                    <div class="card-header  border-info">
                        <h3 class="card-title"><b>Datos de potsgrado</b> </h3>
                    </div>
              

                      
                           

                             <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre Programa</th>
                                    <th>Universidad</th>
                                    <th>Año Graduado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Especializacion en Gerencia</td>
                                    <td>Universidad Francisco de Paula Santander</td>
                                    <td>2010</td>      
                                  
                                    <td>
                                        <div class="icons-acciones">

                                            <div class="mr-3">

                                                <a style="text-decoration: none; color: #000000;" href="{{ route('editarEstudioPotsgrado') }}">

                                                    <button type="button" class="fas fa-edit" style="width: 30px; height: 30px"></button>



                                                </a>
                                                

                                            </div>
                                        
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Magister</td>
                                    <td>Universidad de Santander</td>
                                    <td>2000</td>      
                                  
                                    <td>
                                        <div class="icons-acciones">

                                            <div class="mr-3">

                                                <a style="text-decoration: none; color: #000000;" href="{{ route('editarEstudioPotsgrado') }}">

                                                    <button type="button" class="fas fa-edit" style="width: 30px; height: 30px"></button>



                                                </a>
                                                

                                            </div>
                                        
                                        </div>
                                    </td>

                                </tr>
                                
                                

                            </tbody>

                        </table>

            
                        
                   


                            
                            <div class="modal-footer mt-2 " id="foterM">
                            {{--     <button type="button" class="btn btn-danger btn-lg" >Cancelar</button> --}}
                                <a href="{{ route('agregarEstudioPotsgrado') }}">   <button type="button"  class="btn btn-danger btn-lg  btn-sm mt-5" style="float: right;" > Añadir estudio potsgrado </button></a>
                                
                                
                                <form action="./AdminAddProducto.do" method="POST">
                                <button type="submit" class="btn btn-info btn-lg  btn-sm mt-5">Guardar</button>
                            </form>
                            </div>
                       

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

@section('datatables')
 <!-- DataTables  & Plugins -->
 <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

@endsection