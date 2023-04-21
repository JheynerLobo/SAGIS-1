@extends('admin.layouts.app')

@section('title', 'Actualizar Experiencia')

@section('cargarJS')

    
        onload = "cargarPrincipal()";
  

@endsection



@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Actualizar Experiencia',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('admin.home'),
                'isActive' => null,
            ],
            [
                'name' => 'Experiencias',
                'route' => route('admin.experiences'),
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

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Formulario de Actualización</h4>
                        </div>
                        <div class="card-body">
                            <p>Por favor, llenar todos los datos de información.</p>
                            <small class="text-muted">Recuerda que acá se realiza la actualización de la experiencia del graduad@.</small>
                            <hr>
                            @include('admin.pages.experiences.form', ['editMode' => true,])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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