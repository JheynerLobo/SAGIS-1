@extends('admin.layouts.app')

@section('title', 'Crear Imagen')

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Crear Imagen',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('admin.home'),
                'isActive' => null,
            ],
            [
                'name' => 'Publicaciones',
                'route' => route('admin.graduateQuality.index'),
                'isActive' => null,
            ],
            [
                'name' => 'Imágenes',
                'route' => route('admin.graduateQuality.images', $item->id),
                'isActive' => null,
            ],
            [
                'name' => 'Crear',
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
                            <h4>Formulario de Creación de imagen</h4>
                        </div>
                        <div class="card-body">
                            <p>Por favor añade la imagen.</p>
           
                            <hr>
                            @include('admin.pages.graduatesQuality.formImage', [
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
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    </script>
@endsection