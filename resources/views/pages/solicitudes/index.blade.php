@extends('layouts.app')

@section('title', 'Solicitudes y Trámite')



@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
              <br>
            @include('pages.solicitudes.info')                
            </div>
        </div>
    </section>

    
@endsection

@section('js')
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <script></script>
@endsection
