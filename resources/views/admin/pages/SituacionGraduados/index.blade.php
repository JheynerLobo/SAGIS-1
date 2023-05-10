@extends('admin.layouts.app')

@section('title', 'Estadísticas Laborales 0Graduados')

@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Estadísticas Graduados',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('admin.home'),
                'isActive' => null,
            ],
            [
                'name' => 'Estadísticas',
                'route' => null,
                'isActive' => 'active',
            ],
        ],
    ])
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- Filters -->
                {!! $filters !!}
                <!-- ./Filters -->

                <!-- Table -->
                {!! $table !!}
                <!-- ./Table -->

                
            </div>
        </div>
    </section>

    
@endsection