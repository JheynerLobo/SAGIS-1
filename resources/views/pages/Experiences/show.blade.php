@extends('layouts.app')


@section('tittle', 'Experiencias')

@section('css')

{{-- <style>
    .responsive-iframe {
  width: 50%;
  height: 550px;
  /* min-height: 60vh; // Change this based on your own preferences */
}
</style> --}}
@endsection


@section('content')

    <div class="container content profile mt-4">
        <div class="row margin-bottom-30">
            <div id="informacionContent" class=" mb-margin-bottom-30 shadow-wrapper">

                <div class="col-md-12 col-sm-12 col-xs-12"
                    style="margin-bottom:20px; border-bottom: 3px solid #AA1614; padding: 0;">
                    <h1 class="pull-left" style="font-size:36px;">Experiencias</h1>
                </div>
                <h1 class="tituloinformacion"> {{ $item->nombre }} </h1>
                <h5 class="fecha">Fecha Publicación: <strong>{{ $item->date }}</strong></h5>
                @if($item->getCountVideo()>0 && !is_null($item->videoHeader()))
                <div class="text-center  d-flex justify-content-center  mt-4 mb-4">
                    <div class="card" style="width: 35rem;" id="card">
                        <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9 responsive-iframe" >
                            <iframe class="embed-responsive-item "  src="{{ $videoHeader->fullAsset() }}"
                                allowfullscreen></iframe>
                            </div>
                        </div>
                        </div>
                   
                </div>
                @endif
          
                <p style="white-space: pre-wrap;">{{ $item->description }}</p>
                
      
                <div style="clear:both"></div>
                <div style="clear:both; min-height:30px;"></div>

            </div>
            <!--informacionContent-->

        </div><!-- row margin-bottom-30-->
    </div>
    <!--container content profile-->

@endsection