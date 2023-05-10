@extends('admin.layouts.app')

@section('title', 'Perfil Admin')


@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Perfil Administrador',
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
    
        ],
    ])
@endsection


@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
         




    {{-- <div class="col-md-3">

        
                             <!-- Profile Image -->
                             <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                  <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="../../dist/img/user4-128x128.jpg"
                                         alt="User profile picture">
                                  </div>
                  
                                  <h3 class="profile-username text-center">Pilar Rodriguez</h3>
                  
                                  <p class="text-muted text-center">Directora del programa</p>
                  
                           
                  
                                  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                                </div>
                                <!-- /.card-body -->
                              </div>
                              <!-- /.card -->
                

    </div> --}}

    

    {{-- <div class="col-md-9"> --}}

        <div class="col-12">
            <div class="card">
                <div class="card-header  border-info">
                    <h3 class="card-title"><b>Mis datos personales</b> </h3>
                </div>
    
                
           
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="row">

                                 <!-- Contenido Principal de los datos del  cliente-->
       <div class="d-flex flex-column col-8 col-sm-8 col-md-8 col-lg-8">
    
    
        <div>
            <form class="row g-3" id="form-datos" action="">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombres</label>
                    <h5 id="datos">Judith del Pilar</h5>
    
                </div>
                <div class="col-md-6">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <h5 id="datos">Rodriguez Tenjo </h5>
    
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Cédula</label>
                    <h5 id="datos">4646546464</h5>
    
                </div>
                <div class="col-md-6">
                    <label for="celular" class="form-label">Celular</label>
                    <h5 id="datos">165454255</h5>
    
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <h5 id="datos">pilar@ufps.edu.co</h5>
    
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Dirección</label>
                    <h5 id="datos">la ufps del milenio</h5>
    
                </div>
    
                <div   class="col-6 align-content-left mt-4 ">
                    <a href="#" class="btn btn-danger"> Editar Datos Personales</a>
                </div>
        </div>
    
        </form>
        <form class="row g-3" id="form-datos" action="">
    
            <div   class="col-12 d-flex justify-content-center ">
    
                <a href="#" class="btn btn-danger"  > Editar Contraseña</a>
            </div>
        </form>
    </div>

    <div class="d-flex flex-column col-4 col-sm-4 col-md-4 col-lg-4">

        <div class="card card-danger card-outline">
            <div class="card-body box-profile">

        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
                 src="../../dist/img/user4-128x128.jpg"
                 alt="User profile picture">
          </div>

          <h3 class="profile-username text-center">Pilar Rodriguez</h3>

          <p class="text-muted text-center">Directora del programa</p>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

   
{{-- 
          <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}

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
</section>





@endsection