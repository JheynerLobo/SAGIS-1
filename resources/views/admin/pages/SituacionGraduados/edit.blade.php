@extends('admin.layouts.app')

@section('title', 'Actualizar Situación Laboral de los Graduados')

@section('cargarJS')

  

@endsection



@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Actualizar Situación Laboral de los Graduados',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('admin.home'),
                'isActive' => null,
            ],
            [
                'name' => 'Situaciones Laborales',
                'route' => route('admin.situacionGraduados.index'),
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
                            <small class="text-muted">Recuerda que acá se realiza la actualización de la situación Laboral del graduad@.</small>
                            <hr>
                            @include('admin.pages.SituacionGraduados.form', ['editMode' => true,])
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
 
@endsection