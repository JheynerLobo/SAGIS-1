@extends('layouts.app')


@section('tittle', 'Reconocimientos')

@section('css')

{{-- <style>
    .responsive-iframe {
  width: 50%;
  height: 800px;
  /* min-height: 60vh; // Change this based on your own preferences */
}
</style> --}}
@endsection


@section('content')

    <div class="container content profile mt-4" >
        <div class="row margin-bottom-30">
            <div id="informacionContent" class=" mb-margin-bottom-30 shadow-wrapper">

                <div class="col-md-12 col-sm-12 col-xs-12"
                    style="margin-bottom:20px; border-bottom: 3px solid #AA1614; padding: 0;">
                    <h1 class="pull-left" style="font-size:36px; color: #AA1614; font-style: oblique; font-size:60px; text-align:center">Roconocimiento a {{$item->nombre}}</h1>
                </div>

                @if($item->getCountVideo() > 0 && !is_null($item->videoHeader()) )
                
                <div class="text-center  mt-4 mb-4 d-flex justify-content-center" >
                        
                    <div class="card" style="width: 30rem;" id="card">
                        <div class="card-body">
                        <div class="embed-responsive embed-responsive-16by9 responsive-iframe" >
                            <iframe class="embed-responsive-item "  src="{{ $videoHeader->fullAsset() }}"
                                allowfullscreen></iframe>
                            </div>
                        </div>
                        </div>
                </div> 
                
                <p style="white-space: pre-wrap;">{{ $item->description }}</p>

                <div class="text-center  d-flex justify-content-center  mt-4 mb-4">
                <div class="card" style="width: 18rem; height: 250px" >
                                    <div class="card-body">
                            <img src="{{ asset($imageHeader->fullAsset()) }}" class="imgInformacion img-fluid " alt="Imagen Principal del graduado con reconocimiento" style="width: 16rem; height: 210px" />
                            </div>
                                </div>
                                </div>
                @endif

                @if($item->getCountVideo() == 0 && is_null($item->videoHeader()) )

                <div class="text-center  d-flex justify-content-center  mt-4 mb-4">
                <div class="card" style="width: 18rem; height: 250px" >
                                    <div class="card-body">
                            <img src="{{ asset($imageHeader->fullAsset()) }}" class="imgInformacion img-fluid " alt="Imagen Principal del graduado con reconocimiento" style="width: 16rem; height: 210px" />
                            </div>
                                </div>
                                </div>
                                <p style="white-space: pre-wrap;">{{ $item->description }}</p>

                   @endif
               
                
                @if (count($images) > 0)
                    <div class="row justify-content-center">
                        @forelse ($images as $image)
                            <div class="col-3">
                                <div class="card" style="width: 12rem; height: 190px" >
                                    <div class="card-body">
                                        <img src="{{ asset($image->fullAsset()) }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                @endif
                  
                
      
                <div style="clear:both"></div>
                <div style="clear:both; min-height:30px;"></div>

            </div>
            <!--informacionContent-->

        </div><!-- row margin-bottom-30-->
    </div>
    <!--container content profile-->

@endsection