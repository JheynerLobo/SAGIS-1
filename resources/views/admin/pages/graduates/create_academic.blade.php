@extends('admin.layouts.app')

@section('title', 'Crear Datos Académicos')

@section('cargarJS')

    
        onload = "cargarPrincipal()";
  

@endsection

@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Creación de Datos Académicos',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('admin.home'),
                'isActive' => null,
            ],

            [
                'name' => 'Graduados',
                'route' => route('admin.graduates.index'),
                'isActive' => null,
            ],
            [
                'name' => 'Datos Generales',
                'route' => route('admin.graduates.show', $item->id),
                'isActive' => null,
            ],
            [
                'name' => $item->name,
                'route' => null,
                'isActive' => null,
            ],
            [
                'name' => 'Datos Académicos',
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
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header  border-info">
                            <h3 class="card-title"><strong>Crear Datos Académicos del Graduado</strong> </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <small class="my-2 font-weight-bold float-right">Por favor llene todos los campos del formulario.</small>

                            @include('admin.pages.graduates.formCreateAcademic')
                    

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

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
