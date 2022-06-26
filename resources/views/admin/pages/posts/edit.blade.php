@extends('admin.layouts.app')

@section('title', 'Actualizar Contenido Informativo')

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Contenido Informativo',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('admin.home'),
                'isActive' => null,
            ],
            [
                'name' => 'Publicaciones',
                'route' => route('admin.posts.index'),
                'isActive' => null,
            ],
            [
                'name' => $item->title,
                'route' => null,
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
                            <small class="text-muted">Recuerda que acá se realiza la actualización de la publicación, para una
                                información más
                                detallada debes realizarla dentro del perfil de la publicación.</small>
                            <hr>
                            @include('admin.pages.posts.form', [
                                'editMode' => true,
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
@endsection

@section('custom_js')
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    </script>
@endsection
