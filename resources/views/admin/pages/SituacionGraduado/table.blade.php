@extends('admin.layouts.app')

@section('title', 'Registro de Estadística por año de graduados')

@section('cargarJS')

    
        <!--onload = "cargarPrincipal2()";-->
  

@endsection

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Estadísticas de Empleo Graduados',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('admin.home'),
                'isActive' => null,
            ],
            [
                'name' => 'Experiencias',
                'route' => route('admin.situacionGraduados.index'),
                'isActive' => null,
            ],
            [
                'name' => 'Registro',
                'route' => null,
                'isActive' => 'active',
            ],
        ],
    ])
@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Formulario de Registro</h4>
                        </div>
                        <div class="card-body">
                            <p>Por favor, llenar todos los datos de información.</p>
                            <small class="text-muted">Recuerda que acá se realiza el registro de la experiencia, para una
                                información más
                                detallada debes realizarla dentro del perfil de la experiencia.</small>
                            <hr>
                            @include('admin.pages.situacionGraduados.form', [
                                'editMode' => false,
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/posts.js') }}"></script>
@endsection

@section('custom_js')

<script>
    datePickerId.max = new Date().toISOString().split("T")[0];
</script>
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    </script>
@endsection