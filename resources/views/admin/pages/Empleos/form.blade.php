@if ($editMode)
    <form action="{{ route('admin.empleos.update', [$item->id]) }}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <!-- Empresa -->
        <div class="form-group">
            <label>Empresa:</label>
            <input type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa"
                value="{{ $item->empresa }}">
        </div>
        @error('empresa')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Title -->

        <!-- Cargo -->
        <div class="form-group">
            <label>Cargo:</label>
            <textarea name="cargo" rows="5" class="form-control @error('cargo') is-invalid @enderror">{{$item->cargo}}</textarea>
        </div>
        @error('cargo')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Cargo -->


        <!-- Descripción -->
        <div class="form-group">
            <label>Descripción:</label>
            <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{$item->description}}</textarea>
        </div>
        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Descripción -->

        <!-- Date -->
        <div class="form-group">
            <label>Fecha de Publicación:</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="datePickerId"
                value="{{ $item->date }}">
        </div>
        @error('date')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Date -->

                     <!-- Imagen Principal -->
         <div class="form-group" id="imageP">
            <label>Imagen principal:</label>
            <div class="text-center">
                <img style="width: 340px; height: 340px" src="{{ asset($imageHeader->fullAsset() ) }}" alt="">

            </div>
            <div class="mt-2">
                <input type="file" class="form-control-file"  name="imagen">
            </div>   
        </div>
        @error('imagen')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Imagen principal -->

        <!-- url_postulation -->
        <div class="form-group">
            <label>Url Postulación:</label>
            <input type="text" class="form-control @error('url_postulation') is-invalid @enderror" name="url_postulation" id="url_postulation"
                value="{{ $item->url_postulation }}">
        </div>
        @error('url_postulation')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./url_postulation -->



        <!-- Submit -->
        <div class="form-group">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="btn btn-sm btn-danger">Actualizar</button>
                <div class="ml-5">
                    <a class="btn btn-sm btn-warning " style="color:black;
                    text-decoration: none;" href="{{ route('admin.posts.index') }}">Regresar</a>
                </div>
            </div>
        </div>
        <!-- ./Submit -->
    </form>
@else
<form action="{{ route('admin.empleos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Empresa -->
        <div class="form-group">
            <label>Empresa:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="empresa">
        </div>
        @error('empresa')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Empresa -->

        <!-- Cargo -->
        <div class="form-group">
            <label>Cargo:</label>
            <input type="text" class="form-control @error('cargo') is-invalid @enderror" name="cargo">
        </div>
        @error('cargo')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Cargo -->

        <!-- Descripción -->
        <div class="form-group">
            <label>Descripción:</label>
            <textarea name="description" cols="30" rows="5"
                class="form-control @error('description') is-invalid @enderror"></textarea>
        </div>
        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Descripción -->

        <!-- Date -->
        <div class="form-group">
            <label>Fecha de Publicación:</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="datePickerId">
        </div>
        @error('date')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Date -->


        <!-- File -->
        <div class="form-group" id ="imageP" >
           
            <label for="exampleFormControlFile1">Imagen: <small class="text-muted"></small></label>
        <input type="file" class="form-control-file" name="imagen" id="imagen">
        </div>
        
        <!-- ./File -->

        <!-- Url Postulation -->
        <div class="form-group" id ="url_postulation" >
            <label for="exampleFormControlFile1">Url Postulación: <small class="text-muted"></small></label>
            <input type="text" class="form-control-file" name="url_postulation" value="">
        </div>
        @error('url_postulation')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        @error('url_postulation')
        <small class="text-danger">{{ $message }}</small>
    @enderror
        <!-- ./Url Postulation -->

        
        <!-- Submit -->
        <div class="form-group">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="btn btn-sm btn-danger">Guardar</button>
                <div class="ml-5">
                    <a class="btn btn-sm btn-warning " style="color:black;
                    text-decoration: none;" href="{{ route('admin.empleos.index') }}">Regresar</a>
                </div>
            </div>
        </div>
        <!-- ./Submit -->
    </form>
@endif