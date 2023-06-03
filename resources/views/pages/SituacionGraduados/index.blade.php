@extends('layouts.app')

@section('title', 'Estadísticas Graduados')

@section('content-header')
    @include('partials.content-header', [
        'title' => 'Estadísticas Graduados',
        'items' => [
            
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