<div class="container ">
    <div class="row g-5">
        @forelse ($items as $item)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card " style="width: 21rem; height: 580px;">
                    <img src="{{ asset($item->imageHeader()->fullAsset()) }}" class="cd card-img-top" height="200px"
                        alt="...">
                    <div class="card-body">
                        <p class="fecha">{{ $item->date }}</p>
                        <h5 class="card-title"> <a href="" class="vinculoTitulo">{{ $item->title }}</a></h5>
                        <p class="card-text">{{ $item->description }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('notices.show', $item->id) }}" class="botonGC btn btn-danger">Leer
                            más...</a>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>


</div>
