@extends('admin.layouts.app')

@section('title', 'Publicaciones')

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

                {{ $items->links('partials.pagination.default') }}
            </div>
        </div>
    </section>

    @include('admin.partials.button_delete')
@endsection
