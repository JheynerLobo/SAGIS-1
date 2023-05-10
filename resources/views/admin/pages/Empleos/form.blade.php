@if ($editMode)
    <form action="#" method="post"  enctype="multipart/form-data">
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

         <div class="form-group" id="imageP">
            
            <label>Imagen:</label>
            <div class="text-center">
                <img style="width: 200px; height: 200px" src="{{ asset($imageHeader->fullAsset() ) }}" alt="">

            </div>
            <div class="mt-2">
                <input type="file" class="form-control-file"  name="imagen"  accept="image/*" >
            </div>   
        </div>
        @error('imagen')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Imagen principal -->

        <div class="form-group"  id="video">
            <label>URL video de Youtube:</label>
            <div class="mt-2">
                @if($item->getCountVideo()>0 && !(is_null($item->videoHeader())))
               
                    <input type="text"  value="{{ $videoHeader->fullAsset() }}" id="inputVideo" class="form-control-file" name="video" 
                    pattern="((?:https?:\/\/)?(?:www\.)?youtu(?:\.be\/|be.com\/\S*(?:watch|embed)(?:(?:(?=\/[-a-zA-Z0-9_]{11,}(?!\S))\/)|(?:\S*v=|v\/)))([-a-zA-Z0-9_]{11,})|NO)" 
                    title="Debe comenzar por https://youtu.be/ o https://www.youtube.com/watch?v=" >
                @else
                <input type="text" class="form-control-file"  id="inputVideo" name="video" 
                pattern="(?:https?:\/\/)?(?:www\.)?youtu(?:\.be\/|be.com\/\S*(?:watch|embed)(?:(?:(?=\/[-a-zA-Z0-9_]{11,}(?!\S))\/)|(?:\S*v=|v\/)))([-a-zA-Z0-9_]{11,})"
                title="Debe comenzar por https://youtu.be/ o https://www.youtube.com/watch?v=" >
                @endif
                
            </div>   
        </div>
        @error('video')
            <small class="text-danger">{{ $message }}</small>
        @enderror

       
        <div class="form-group" style="display: none;" id="imageP">
            
            <div class="mt-2" >
                <input type="file" class="form-control-file" id="inputImage"   name="imagen" accept="image/*"  required  >
            </div>   
        </div>
        @error('imagen')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <div class="form-group"  id="videoP">
            <label>URL video de Youtube:</label>
            <div class="mt-2">
               
                <input type="text"  value="{{ $videoHeader->fullAsset() }}"  id="inputVideo" class="form-control-file" name="video" required 
                pattern="((?:https?:\/\/)?(?:www\.)?youtu(?:\.be\/|be.com\/\S*(?:watch|embed)(?:(?:(?=\/[-a-zA-Z0-9_]{11,}(?!\S))\/)|(?:\S*v=|v\/)))([-a-zA-Z0-9_]{11,})|NO)" 
                title="Debe comenzar por https://youtu.be/ o https://www.youtube.com/watch?v=, o si quiere eliminar el video NO, excepto en categoría Vídeos" >
            </div>   
        </div>
        @error('video')
            <small class="text-danger">{{ $message }}</small>
        @enderror


        



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
        <!-- Title -->
        <div class="form-group">
            <label>Empresa:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="empresa"
                value="{{ old('empresa') }}">
        </div>
        @error('empresa')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Title -->

        <!-- Cargo -->
        <div class="form-group">
            <label>Cargo:</label>
            <input type="text" class="form-control @error('cargo') is-invalid @enderror" name="cargo"
                value="{{ old('cargo') }}">
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
            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="datePickerId"
                value="{{ old('date') }}">
        </div>
        @error('date')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Date -->


        <!-- File -->
        <div class="form-group" id ="imageP" >
            <label for="exampleFormControlFile1">Imagen: <small class="text-muted"></small></label>
            <input type="file" class="form-control-file" name="image[]" id="inputImage" multiple accept="image/*" required>
        </div>
        @error('image.*')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
        <!-- ./File -->

        <div class="form-group"  id="videoP">
            <label>URL video de Youtube:</label>
            <div class="mt-2">        
                <input type="text" class="form-control-file" id="videoInput" name="video" pattern="(?:https?:\/\/)?(?:www\.)?youtu(?:\.be\/|be.com\/\S*(?:watch|embed)(?:(?:(?=\/[-a-zA-Z0-9_]{11,}(?!\S))\/)|(?:\S*v=|v\/)))([-a-zA-Z0-9_]{11,})" title="Debe comenzar por https://youtu.be/ o https://www.youtube.com/watch?v=">
               {{-- ((?:https?:\/\/)?(?:www\.)?youtu(?:\.be\/|be.com\/\S*(?:watch|embed)(?:(?:(?=\/[-a-zA-Z0-9_]{11,}(?!\S))\/)|(?:\S*v=|v\/)))([-a-zA-Z0-9_]{11,})|NO)--}}
                
            </div>   
        </div>

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