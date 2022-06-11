@extends('layouts/layoutadmin')


@section('graduadoA', 'active')

@section('content2', 'Administrar Graduados')

{{-- @section('content3')

<button type="button" class="btn btn-danger">Enviar credenciales</button>
@endsection --}}


@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">



                <div class="card">
                    <div class="card-header  border-info">
                        <h3 class="card-title"><b>Graduados registrados</b> </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Cedula</th>
                                    <th>Código</th>
                                    <th>Celular</th>
                                    <th>Correo institucional</th>
                                    <th>Ver datos completos</th>
                                    <th>Estado verificado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Jarlin Andres Fonseca Bermón</td>
                                    <td>100687978</td>
                                    <td>1151758</td>
                                    <td>3238123367</td>
                                    <td>jarlinandresfb@ufps.edu.co</td>
                                    <td style="text-align: center">
                                      {{--   <form action="<%=basePath%>/MostrarFichaTecnica.do" method="POST"> --}}

                                           {{--  <input style="display: none" type="text" class="form-control "
                                                value="<%=persona.getCedula()%>" id="exampleInputNombre" name="cedula"
                                                required> --}}
                                                <a href="{{ route('verDatosCompletos') }}">
                                                    <button style=" border: none ;background-color: transparent" type="submit"> <img src="./img/lupa.png"
                                                        style="display: block; width: 30px; height: 30px; margin:auto;" />
                                                </button>
                                                
                                                </a>
                                           
                                      {{--   </form> --}}
                                    </td>
                                    <td>

                                        <img src="./img/aprobado.png" alt=""
                                            style="display: block; width: 30px; height: 30px; margin:auto;">


                                    </td>
                                    <td>
                                        <div class="icons-acciones">

                                            <div class="mr-3">

                                                <a style="text-decoration: none; color: #000000;" href="{{ route('editarGraduado') }}">

                                                    <button type="button" class="fas fa-edit"
                                                    style="width: 30px; height: 30px"
                                                    data-bs-whatever="<%=persona.getContraseña()%>"></button>



                                                </a>
                                                

                                            </div>
                                            <div>

                                                <a style="text-decoration: none; color: #000000;" href="{{ route('editarPassword') }}">

                                                    <button type="button" class="fas fa-key"
                                                    style="width: 25px; height: 25px"
                                                    data-bs-whatever="<%=persona.getContraseña()%>"></button>

                                                
                                                </a>
                                               
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Juan Hernandez</td>
                                    <td>9944787</td>
                                    <td>1151759</td>
                                    <td>31785547</td>
                                    <td>juanhna@ufps.edu.co</td>
                                    <td style="text-align: center">
                                        <form action="<%=basePath%>/MostrarFichaTecnica.do" method="POST">

                                            <input style="display: none" type="text" class="form-control "
                                                value="<%=persona.getCedula()%>" id="exampleInputNombre" name="cedula"
                                                required>
                                            <button style=" border: none ;background-color: transparent" type="submit">
                                                <img src="./img/lupa.png"
                                                    style="display: block; width: 30px; height: 30px;            margin:auto;" />
                                            </button>
                                        </form>
                                    </td>
                                    <td>

                                        <img src="./img/rechazo.png" alt=""
                                            style="display: block; width: 30px; height: 30px; margin:auto;">


                                    </td>
                                    <td>
                                        <div class="icons-acciones">

                                            <div class="mr-3">
                                                <button type="button" class="fas fa-edit"
                                                    style="width: 30px; height: 30px"
                                                    data-bs-whatever="<%=persona.getContraseña()%>"></button>

                                            </div>
                                            <div>
                                                <button type="button" class="fas fa-key"
                                                    style="width: 25px; height: 25px"
                                                    data-bs-whatever="<%=persona.getContraseña()%>"></button>

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Lucas Manuel Tiria</td>
                                    <td>1079844</td>
                                    <td>1151770</td>
                                    <td>315744844</td>
                                    <td>lucasmn@ufps.edu.co</td>
                                    <td style="text-align: center">
                                        <form action="<%=basePath%>/MostrarFichaTecnica.do" method="POST">

                                            <input style="display: none" type="text" class="form-control "
                                                value="<%=persona.getCedula()%>" id="exampleInputNombre" name="cedula"
                                                required>
                                            <button style=" border: none ;background-color: transparent" type="submit">
                                                <img src="./img/lupa.png"
                                                    style="display: block; width: 30px; height: 30px;            margin:auto;" />
                                            </button>
                                        </form>
                                    </td>
                                    <td>

                                        <img src="./img/aprobado.png" alt=""
                                            style="display: block; width: 30px; height: 30px; margin:auto;">


                                    </td>
                                    <td>
                                        <div class="icons-acciones">

                                            <div class="mr-3">
                                                <button type="button" class="fas fa-edit"
                                                    style="width: 30px; height: 30px"
                                                    data-bs-whatever="<%=persona.getContraseña()%>"></button>

                                            </div>
                                            <div>
                                                <button type="button" class="fas fa-key"
                                                    style="width: 25px; height: 25px"
                                                    data-bs-whatever="<%=persona.getContraseña()%>"></button>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Andres Castillo</td>
                                    <td>10079877</td>
                                    <td>1151780</td>
                                    <td>312443367</td>
                                    <td>andresxb@ufps.edu.co</td>
                                    <td style="text-align: center">
                                        <form action="<%=basePath%>/MostrarFichaTecnica.do" method="POST">

                                            <input style="display: none" type="text" class="form-control "
                                                value="<%=persona.getCedula()%>" id="exampleInputNombre" name="cedula"
                                                required>
                                            <button style=" border: none ;background-color: transparent" type="submit">
                                                <img src="./img/lupa.png"
                                                    style="display: block; width: 30px; height: 30px;            margin:auto;" />
                                            </button>
                                        </form>
                                    </td>
                                    <td>

                                        <img src="./img/aprobado.png" alt=""
                                            style="display: block; width: 30px; height: 30px; margin:auto;">


                                    </td>
                                    <td>
                                        <div class="icons-acciones">

                                            <div class="mr-3">
                                                <button type="button" class="fas fa-edit"
                                                    style="width: 30px; height: 30px"
                                                    data-bs-whatever="<%=persona.getContraseña()%>"></button>

                                            </div>
                                            <div>
                                                <button type="button" class="fas fa-key"
                                                    style="width: 25px; height: 25px"
                                                    data-bs-whatever="<%=persona.getContraseña()%>"></button>

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Felipe Mora</td>
                                    <td>1007887978</td>
                                    <td>1151795</td>
                                    <td>35477875</td>
                                    <td>felipemrafb@ufps.edu.co</td>
                                    <td style="text-align: center">
                                        <form action="<%=basePath%>/MostrarFichaTecnica.do" method="POST">

                                            <input style="display: none" type="text" class="form-control "
                                                value="<%=persona.getCedula()%>" id="exampleInputNombre" name="cedula"
                                                required>
                                            <button style=" border: none ;background-color: transparent" type="submit">
                                                <img src="./img/lupa.png"
                                                    style="display: block; width: 30px; height: 30px;            margin:auto;" />
                                            </button>
                                        </form>
                                    </td>
                                    <td>

                                        <img src="./img/rechazo.png" alt=""
                                            style="display: block; width: 30px; height: 30px; margin:auto;">


                                    </td>
                                    <td>
                                        <div class="icons-acciones">

                                            <div class="mr-3">
                                                <button type="button" class="fas fa-edit"
                                                    style="width: 30px; height: 30px"
                                                    data-bs-whatever="<%=persona.getContraseña()%>"></button>

                                            </div>
                                            <div>
                                                <button type="button" class="fas fa-key"
                                                    style="width: 25px; height: 25px"
                                                    data-bs-whatever="<%=persona.getContraseña()%>"></button>

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>20</td>
                                    <td>Juliana Sanchez</td>
                                    <td>10775475</td>
                                    <td>1151854</td>
                                    <td>3175474474</td>
                                    <td>julianafb@ufps.edu.co</td>
                                    <td style="text-align: center">
                                        <form action="<%=basePath%>/MostrarFichaTecnica.do" method="POST">

                                            <input style="display: none" type="text" class="form-control "
                                                value="<%=persona.getCedula()%>" id="exampleInputNombre" name="cedula"
                                                required>
                                            <button style=" border: none ;background-color: transparent" type="submit">
                                                <img src="./img/lupa.png"
                                                    style="display: block; width: 30px; height: 30px;            margin:auto;" />
                                            </button>
                                        </form>
                                    </td>
                                    <td>

                                        <img src="./img/aprobado.png" alt=""
                                            style="display: block; width: 30px; height: 30px; margin:auto;">


                                    </td>
                                    <td>
                                        <div class="icons-acciones">

                                            <div class="mr-3">

                                               <button type="button" class="fas fa-edit" style="width: 30px; height: 30px"></button>  
                                            

                                            </div>
                                            <div>
                                                <button type="button" class="fas fa-key"
                                                    style="width: 25px; height: 25px"
                                                    data-bs-whatever="<%=persona.getContraseña()%>"></button>

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                

                            </tbody>

                        </table>

                   {{--      <form action="" class="mt-5" > --}}

                      <a href="{{ route('agregarGraduado') }}">   <button type="button"  class="btn btn-danger btn-lg  btn-sm mt-5" style="float: right;" > Añadir nuevo graduado </button></a>
                             

                         
                                {{-- type="submit" --}}
                            
                      {{--   </form> --}}
                        
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
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
@endsection


