@extends('admin.layouts.app')

@section('title', 'Editar Perfil Admin')


@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Editar Perfil Administrador',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('admin.home'),
                'isActive' => null,
            ],
            [
                'name' => 'Perfil',
                'route' => null,
                'isActive' => null,
            ],
            [
                'name' => 'Editar',
                'route' => null,
                'isActive' => null,
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
                        <h3 class="card-title"><b>Editar datos personales</b> </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                          <!-- Contenido Principal para editar los datos personales del cliente-->
  <div class="d-flex flex-column col-9 col-sm-9 col-md-9 col-lg-9">

  


      {{--   readonly="readonly"  --}}
        <form class="row g-3" id="form-datos" action="<%=basePath%>UpdatePersona.do" method="POST" >
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="nombre"  value="<%=p.getNombres()%>" required>
            </div>
            <div class="col-md-6">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" value="<%=p.getApellidos()%>" name="apellidos" required>
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Cédula</label>
                <input type="text" class="form-control" id="cedula" value="<%=p.getCedula()%>" for="cedula" required>
            </div>
            <div class="col-md-6">
                <label for="celular" class="form-label">Celular</label>
                <input type="text" class="form-control" id="celular"  value="<%=p.getCelular()%>" name="celular" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" value="<%=p.getEmail()%>" name="correo" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="email" name="direccion" value="<%=p.getDirecccion()%>" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Url Foto</label>
                <input type="url" class="form-control" id="email" name="url" value="<%=p.getUrlFoto() %>" required>
            </div>
            <div  id="boton" class="col-6 align-content-center ">
                <br>
                <button id="save" type="submit" class="btn btn-primary"> Guardar Cambios</button>
            </div>
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