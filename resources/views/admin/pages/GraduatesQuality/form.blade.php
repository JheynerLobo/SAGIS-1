@if ($editMode)
    <form action="{{ route('admin.graduateQuality.update', $item->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf @method('PATCH')
        <!-- Title -->
        <div class="form-group">
            <label>Graduad@:</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                value="{{ $item->nombre }}">
        </div>
        @error('nombre')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Title -->

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

        
        <div class="form-group"  name="video" id="video">
            <label>URL video de Youtube:</label>
            <div class="mt-2">
                
               
                <input type="text"  value="{{ $videoHeader->fullAsset() }}"  id="inputVideo" class="form-control-file" name="video" required 
                pattern="((?:https?:\/\/)?(?:www\.)?youtu(?:\.be\/|be.com\/\S*(?:watch|embed)(?:(?:(?=\/[-a-zA-Z0-9_]{11,}(?!\S))\/)|(?:\S*v=|v\/)))([-a-zA-Z0-9_]{11,})|NO)" 
                title="Debe comenzar por https://youtu.be/ o https://www.youtube.com/watch?v=" >
            </div>   
        </div>
        @error('video')
            <small class="text-danger">{{ $message }}</small>
        @enderror


         <!-- Submit -->
        <div class="mt-4">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-danger">Actualizar</button>
                <div class="ml-5">
                    <a class="btn btn-warning " style="color:black;
                    text-decoration: none;" href="{{ route('admin.experiences') }}">Regresar</a>
                </div>
            </div>
          
        </div>
        <!-- ./Submit -->
        
    </form>
@else
    <form action="{{ route('admin.graduateQuality.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Title -->
        <div class="form-group">
            <label>Graduad@:</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                value="{{ old('nombre') }}">
        </div>
        @error('nombre')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Title -->

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

        <div class="form-group"  id="video">
            <label>URL video de Youtube:</label>
            <div class="mt-2">        
                <input type="text" class="form-control-file" id="videoInput" name="video" pattern="(?:https?:\/\/)?(?:www\.)?youtu(?:\.be\/|be.com\/\S*(?:watch|embed)(?:(?:(?=\/[-a-zA-Z0-9_]{11,}(?!\S))\/)|(?:\S*v=|v\/)))([-a-zA-Z0-9_]{11,})" title="Debe comenzar por https://youtu.be/ o https://www.youtube.com/watch?v=" required>
               {{-- ((?:https?:\/\/)?(?:www\.)?youtu(?:\.be\/|be.com\/\S*(?:watch|embed)(?:(?:(?=\/[-a-zA-Z0-9_]{11,}(?!\S))\/)|(?:\S*v=|v\/)))([-a-zA-Z0-9_]{11,})|NO)--}}
                
            </div>   
        </div>

        <!-- Submit -->
        <div class="form-group">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="btn btn-sm btn-danger">Guardar</button>
                <div class="ml-5">
                    <a class="btn btn-sm btn-warning " style="color:black;
                    text-decoration: none;" href="{{ route('admin.graduateQuality.index') }}">Regresar</a>
                </div>
            </div>
        </div>
        <!-- ./Submit -->
    </form>
@endif