<div class="container ">
    <div class="row g-5">
        @forelse ($items as $item)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card " style="width: 21rem; height: 450px;" id="card">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ $item->videoHeader()->fullAsset() }}"
                            allowfullscreen></iframe>
                    </div>
                    <div class="card-body">
                        <p class="fecha">{{ $item->date }}</p>
                        <h5 class="card-title"  id="card-title"> <a href="" class="vinculoTitulo">{{ $item->nombre }}</a></h5>
                        <p class="card-text" id="card-text">{{ $item->description }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('experiences.show', $item->id) }}" class="botonGC btn btn-danger">Leer
                            más...</a>
                        {{-- <a href="#" class="botonGC btn btn-danger">Leer más...</a> --}}
                    </div>
                </div>
            </div>
        @empty
            <h4 class="mb-4" style="text-align:center;display:inline-block">No hay Registros...</h4>
            <img src="https://cdn-icons-png.flaticon.com/512/85/85488.png" alt="No hay" style="height:300;width:300px;margin-left:auto;margin-right:auto">
        @endforelse
    </div>


</div>