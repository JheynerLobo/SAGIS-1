@extends('admin.layouts.app')

@section('title', 'Actualizar Graduado de Calidad')

@section('cargarJS')

  

@endsection



@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Actualizar Graduado',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('admin.home'),
                'isActive' => null,
            ],
            [
                'name' => 'Experiencias',
                'route' => route('admin.graduateQuality.index'),
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
                            <small class="text-muted">Recuerda que acá se realiza la actualización de los datos del graduad@.</small>
                            <hr>
                            @include('admin.pages.GraduatesQuality.form', ['editMode' => true,])
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