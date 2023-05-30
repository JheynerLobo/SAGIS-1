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
                    style="margin-bottom:20px; border-bottom: 3px solid #aa1916; padding: 0;">
                    <h1 class="pull-left" style="font-size:36px;">Empleo</h1>
                </div>
                <h1 class="tituloinformacion"> {{ $item->empresa }} </h1>
                <h5 class="cargo">Cargo a desempeñar: <strong>{{ $item->cargo }}</strong></h5>
                <h3 class="fecha">Fecha Publicación: <strong>{{ $item->date }}</strong></h3>
                <div class="text-center  d-flex justify-content-center  mt-4 mb-4">
                    <div class="card" style="width: 32rem;" >
                        <div class="card-body">
                            <img src="{{ asset($imageHeader->fullAsset()) }}" class="imgInformacion img-fluid " alt="" />
                        </div>
                        </div>
                   
                </div>
                <p style="white-space: pre-wrap;">{{ $item->description }}</p>
                <p style="white-space: pre-wrap;">{{ $item->url_postulation }}</p>

                <div style="clear:both"></div>
                <div style="clear:both; min-height:30px;"></div>

            </div>
            <!--informacionContent-->

        </div><!-- row margin-bottom-30-->
    </div>
    <!--container content profile-->

@endsection