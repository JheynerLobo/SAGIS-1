@extends('layouts.app')


@section('tittle', 'Cursos')


@section('content')

    {!! $filters !!}

    <section class=" mt-5 mb-5">

        {!! $table !!}
    </section>

    <div class="container">
        {{ $items->links() }}
    </div>

@endsection
