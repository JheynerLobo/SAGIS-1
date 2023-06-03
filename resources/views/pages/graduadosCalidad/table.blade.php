<div class="container ">
    <div class="row g-5">
        @forelse ($items as $item)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card " style="width: 22rem; height: 400px;" id="card">
                @if ($item->getCountimage()>=1)
                    <img src="{{ asset($item->imageHeader()->fullAsset()) }}" class="cd card-img-top" height="200px"
                        alt="...">
                        @endif
                    <div class="card-body">
                        <h5 class="nombre">Graduado: <strong>{{$item->nombre}}</strong></h5>
                        <h6 class="fecha">Fecha Publicación: <strong>{{ $item->date }}</strong></h6>
                        <h5 class="card-title"  id="card-title"> <a href="" class="vinculoTitulo">{{ $item->title }}</a></h5>
                        <p class="card-text" id="card-text">{{ $item->description }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('meritosGraduados.show', $item->id) }}" class="botonGC btn btn-danger">Leer
                            más...</a>
                    </div>
                </div>
            </div>
        @empty
             <h4 class="mb-4">No hay Empleos registradas.</h4>
             <img src="https://img.icons8.com/ios/500/no-image.png" alt="No hay">
        @endforelse
    </div>


</div>