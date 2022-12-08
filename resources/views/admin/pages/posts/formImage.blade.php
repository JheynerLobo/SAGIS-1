@if ($editMode)
    <form action="{{ route('admin.posts.update_image', [$item->id, $img->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PATCH')
      
    
         <!-- File -->
        <div class="form-group"  >
            <label>Imagen:</label>
            <div class="text-center">
                <img style="width: 340px; height: 340px" src="{{ asset($img->fullAsset() ) }}" alt="">

            </div>
            <div class="mt-2">
                <label for="exampleFormControlFile1">Seleccione la imagen: <small class="text-muted">(Obligatorio)</small></label>
            <input type="file" class="form-control-file" name="image" accept="image/*" required>

            </div>
            
        </div>
        @error('image')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./File -->

        
        <!-- Submit -->
        <div class="form-group">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="btn btn-sm btn-danger">Guardar</button>
                <div class="ml-5">
                    <a class="btn btn-sm btn-warning " style="color:black;
                    text-decoration: none;" href="{{ route('admin.posts.images', $item->id)}}">Regresar</a>
                </div>
            </div>
        </div>
        <!-- ./Submit -->
    </form>
@else
    <form action="{{ route('admin.posts.store_image', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- File -->
        <div class="form-group" >
            <label for="exampleFormControlFile1">Fotos de noticias: <small class="text-muted">(Obligatorio) </small></label>
            <input type="file" class="form-control-file" name="image"  accept="image/*" required>
        </div>
        @error('image')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./File -->



        <!-- Submit -->
        <div class="form-group">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="btn btn-sm btn-danger">Guardar</button>
                <div class="ml-5">
                    <a class="btn btn-sm btn-warning " style="color:black;
                    text-decoration: none;" href="{{ route('admin.posts.images', $item->id)}}">Regresar</a>
                </div>
            </div>
        </div>
        <!-- ./Submit -->
    </form>
@endif
