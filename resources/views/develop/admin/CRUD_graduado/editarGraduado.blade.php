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
                        <h3 class="card-title"><b>Datos personales</b> </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="./AdminAddProducto.do" method="GET">
                            <div class="row text-center m-3">

                                <div class="col-md-4">

                                    <div class="mb-3 ">
                                        <label for="exampleInputCedula" class="form-label">Cedula</label>
                                        <input type="number" class="form-control " name="cedula" id="exampleInputCedula"
                                            required>
                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="mb-3 ">
                                        <label for="exampleInputNombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control " name="nombre" id="exampleInputNombre"
                                            required>

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
                                        <input type="number" class="form-control " name="codigo" id="exampleInputCodigo"
                                            required>
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

                                <div class="col-md-4">

                                    <div class="mb-3 ">
                                        <label for="exampleInputFijo" class="form-label">Telefono fijo</label>
                                        <input type="number" class="form-control " name="fijo"
                                            id="exampleInputFijo" required>
                                    </div>

                                </div>

                                
                                <div class="col-md-4">

                                    <div class="mb-3 ">
                                        <label for="exampleInputFechaNac" class="form-label">Fecha nacimiento</label>
                                        <input type="date" class="form-control " name="fechaNac"
                                            id="exampleInputFechaNac" required>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">

                                        <label for="exampleInputdptoEstado" class="form-label">Pais</label>
                                        <select class="form-select" name="dptoEstado" aria-label="Default select example"
                                            required>
                                            <option value="">Selecciona un tipo:</option>
                                            <option value="1">Colombia</option>
                                            <option value="2">España</option>
                                            <option value="3">Francia</option>
                                        </select>
                                    </div>


                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">

                                        <label for="exampleInputdptoEstado" class="form-label">Departamento/Estado</label>
                                        <select class="form-select" name="dptoEstado" aria-label="Default select example"
                                            required>
                                            <option value="">Selecciona un tipo:</option>
                                            <option value="1">Norte de Santander</option>
                                            <option value="2">Antioquia</option>
                                            <option value="3">Santander</option>
                                        </select>
                                    </div>


                                </div>

                                    <div class="col-md-4">
                                    <div class="mb-3">

                                        <label for="exampleInputCiudad" class="form-label">Ciudad</label>
                                        <select class="form-select" name="ciudad" aria-label="Default select example"
                                            required>
                                            <option value="">Selecciona un tipo:</option>
                                            <option value="1">Cúcuta</option>
                                            <option value="2">Medellin</option>
                                            <option value="3">Cartagena</option>
                                        </select>
                                    </div>


                                </div>

                                <div class="col-md-4">

                                    <div class="mb-3 ">
                                        <label for="exampleInputDireccionR" class="form-label">Direccion Residencia</label>
                                        <input type="text" class="form-control " name="direccionR"
                                            id="exampleInputDireccionR" required>
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
                                        <input type="text" class="form-control " name="NP" id="exampleInputNP" required>
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
                                        <input type="text" class="form-control " name="U" id="exampleInputU" required>
                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="mb-3 ">
                                        <label for="exampleInputDireccionR" class="form-label">¿Tiene estudios potsgrados?</label> 
                                        <select class="form-select" name="ciudad" aria-label="Default select example"
                                            required>
                                            <option value="">Selecciona un tipo:</option>
                                            <option value="1">SI</option>
                                            <option value="2">NO</option>
                                        </select>
                                    </div>
                                </div>

                            {{--     <div class="col-md-4">
                                    <div class="mb-3">
                                        <div class="col-md-2">
                                            <form action="<%=basePath%>/MostrarFichaTecnica.do" method="POST">
                                            <button type="submit" class="btn btn-danger btn-lg mt-5  btn-circle "><i
                                                    class="fa fa-plus"></i></button>

                                                    </form>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>

        

                            <h3 style="font-size: 1.1rem; font-weight: bolder">Datos laborales:</h3>
                            <hr class="border-info">


                            <div class="row text-center m-3">

                                <div class="col-md-4">

                                    <div class="mb-3 ">
                                        <label for="exampleInputEmpresa" class="form-label">Nombre Empresa</label>
                                        <input type="text" class="form-control " name="empresa" id="exampleInputEmpresa">
                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="mb-3 ">
                                        <label for="exampleInputCargo" class="form-label">Cargo Ocupado</label>
                                        <input type="text" class="form-control " name="cargo" id="exampleInputCargo">
                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="mb-3 ">
                                        <label for="exampleInputSalario" class="form-label">Salario</label>
                                        <input type="number" class="form-control " name="salario" id="exampleInputSalario">
                                    </div>

                                </div>


                                <div class="col-md-4">
                                    <div class="mb-3">

                                        <label for="exampleInputdptoEstado" class="form-label">Pais</label>
                                        <select class="form-select" name="dptoEstado" aria-label="Default select example">
                                            <option value="">Selecciona un tipo:</option>
                                            <option value="1">Colombia</option>
                                            <option value="2">España</option>
                                            <option value="3">Francia</option>
                                        </select>
                                    </div>


                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">

                                        <label for="exampleInputdptoEstado" class="form-label">Departamento/Estado</label>
                                        <select class="form-select" name="dptoEstado" aria-label="Default select example">
                                            <option value="">Selecciona un tipo:</option>
                                            <option value="1">Norte de Santander</option>
                                            <option value="2">Antioquia</option>
                                            <option value="3">Santander</option>
                                        </select>
                                    </div>


                                </div>

                                    <div class="col-md-4">
                                    <div class="mb-3">

                                        <label for="exampleInputCiudad" class="form-label">Ciudad</label>
                                        <select class="form-select" name="ciudad" aria-label="Default select example" >
                                            <option value="">Selecciona un tipo:</option>
                                            <option value="1">Cúcuta</option>
                                            <option value="2">Medellin</option>
                                            <option value="3">Cartagena</option>
                                        </select>
                                    </div>


                                </div>

                                <div class="col-md-4">

                                    <div class="mb-3 ">
                                        <label for="exampleInputDirec" class="form-label">Dirección Empresa</label>
                                        <input type="text" class="form-control " name="direc" id="exampleInputDirec" >
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <div class="mb-3 ">
                                        <label for="exampleInputTipo" class="form-label">Tipo Empresa</label>
                                        <input type="text" class="form-control " name="tipo" id="exampleInputTipo" >
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <div class="mb-3 ">
                                        <label for="exampleInputCorreoE" class="form-label">Correo Empresa</label>
                                        <input type="email" class="form-control " name="correoE" id="exampleInputCorreoE" >
                                    </div>
                                </div>

                                <div class="col-md-4">

                                    <div class="mb-3 ">
                                        <label for="exampleInputTelE" class="form-label">Telefono Empresa</label>
                                        <input type="text" class="form-control " name="twlE" id="exampleInputTelE" >
                                    </div>
                                </div>




                            </div>
                            <div class="modal-footer mt-2 " id="foterM">
                            
                                <button type="button" class="btn btn-danger btn-lg" >Cancelar</button>
                                <a href="{{ route('estudiosPotsgrados') }}"><button type="button" class="btn btn-info btn-lg">Guardar prueba</button> </a>
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