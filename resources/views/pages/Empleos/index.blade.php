@extends('layouts.app')


@section('tittle', 'Experiencias')


@section('content')

    {!! $filters !!}

    <section class=" mt-5 mb-5">

        {!! $table !!}
    </section>

    <div class="container">
        {{ $items->links('partials.pagination.default') }}
    </div>

@endsection