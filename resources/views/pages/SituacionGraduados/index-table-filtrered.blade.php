@extends('layouts.app')

@section('title', 'Estadísticas Graduados')

@section('content-header')
    @include('partials.content-header', [
        'title' => 'Estadísticas Graduados',
        'items' => [
            [
                'name' => 'Estadísticas de Todos los años',
                'route' => route('situacionGraduados'),
                'isActive' => null,
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

                <!-- TableFiltrada -->
                {!! $tableFiltrada !!}
                <!-- ./TableFiltrada -->

                
            </div>
        </div>
    </section>

    
@endsection