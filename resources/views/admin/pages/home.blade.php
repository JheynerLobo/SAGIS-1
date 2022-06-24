@extends('admin.layouts.app')


@section('title', 'Dashboard')

@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Dashboard',
        'items' => [],
    ])
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
           <h4>Funcionalidad Prevista para Software, Dashboard con diferentes tarjetas de información..</h4>
        </div>
        <!-- /.container-fluid -->
    </section>


@endsection
