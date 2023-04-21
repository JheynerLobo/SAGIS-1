@extends('admin.layouts.app')

@section('title', 'Solicitudes y Trámites')

@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Solicitudes y Trámites',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('admin.home'),
                'isActive' => 'active',
            ],
            [
                'name' => 'Solicitudes',
                'route' => null,
                'isActive' => 'null',
            ],
        ],
    ])
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            @include('admin.pages.solicitudes.info')                
            </div>
        </div>
    </section>

    
@endsection

@section('js')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <script></script>
@endsection
