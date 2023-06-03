@extends('layouts.app')


@section('tittle', 'Empleos')

@section('css')
<style>
/* #img-fluid{
    height: 300px;
} */


</style>
@endsection


@section('content')

    <div class="container content profile mt-4">
        <div class="row margin-bottom-30">
            <div id="informacionContent" class=" mb-margin-bottom-30 shadow-wrapper">

                <div class="col-md-12 col-sm-12 col-xs-12"
                    style="margin-bottom:20px; border-bottom: 3px solid #AA1614; padding: 0;">
                    <h1 class="pull-left" style="font-size:36px;">Empleo</h1>
                </div>
                <h3 class="tituloinformacion"> Empresa: {{ $item->empresa }} </h3>
                <h5 class="cargo">Cargo a desempeñar: <strong>{{ $item->cargo }}</strong></h5>
                <h3 class="fecha">Fecha Publicación: <strong>{{ $item->date }}</strong></h3>
                <p style="white-space: pre-wrap;"><h6><strong>Descripción: </strong></h6>{{ $item->description }}</p>
                @if($item->url_postulation!=null)
                <p style="white-space: pre-wrap;"><a href="{{ $item->url_postulation }}">Enlace de Postulación</a></p>
                @endif
                <div class="text-center  d-flex justify-content-center  mt-4 mb-4">
                    @if($item->getCountimage()>=1)
                    <div class="card" style="width: 44rem; height:820px" >
                        <div class="card-body">
                            <img src="{{ asset($imageHeader->fullAsset()) }}" class="imgInformacion img-fluid" style="width: 42rem; height:780px" alt="" />
                        </div>
                        </div>
                        @endif
                   
                </div>
                

                <div style="clear:both"></div>
                <div style="clear:both; min-height:30px;"></div>

            </div>
            <!--informacionContent-->

        </div><!-- row margin-bottom-30-->
    </div>
    <!--container content profile-->

@endsection