@if ($editMode)
    <form action="{{ route('admin.posts.update', $item->id) }}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- PostCategory -->
        <div class="form-group">
            <label>Categoría de la Publicación:</label>
            <select name="post_category_id"
                class="form-control select2bs4 @error('post_category_id') is-invalid @enderror">
                <option value="-1">Seleccione una categoría de publicación..</option>
                @foreach ($postCategories as $postCategory)
                    <option value="{{ $postCategory->id }}"
                        {{ isSelectedOld($item->post_category_id, $postCategory->id) }}>{{ $postCategory->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('post_category_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- PostCategory -->

        <!-- Title -->
        <div class="form-group">
            <label>Título:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ $item->title }}">
        </div>
        @error('title')
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
            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date"
                value="{{ $item->date }}">
        </div>
        @error('date')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Date -->

         <!-- Imagen Principal -->
         <div class="form-group">
            <label>Imagen principal:</label>
            <div class="text-center">
                <img style="width: 340px; hight: 340px" src="{{ asset($imageHeader->fullAsset() ) }}" alt="">

            </div>
            <div class="mt-2">
                <input type="file" class="form-control-file" name="imagen" accept="image/*" >
            </div>   
        </div>
        @error('imagen')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Imagen principal -->

        



        <!-- Submit -->
        <div class="form-group">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="btn btn-sm btn-danger">Guardar</button>
                <button class="btn btn-sm btn-warning ml-5"><a style="color:black;
                    text-decoration: none;" href="{{ route('admin.posts.index') }}">Regresar</a> </button>
            </div>
        </div>
        <!-- ./Submit -->
    </form>
@else
    <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- PostCategory -->
        <div class="form-group">
            <label>Categoría de la Publicación:</label>
            <select name="post_category_id"
                class="form-control select2bs4 @error('post_category_id') is-invalid @enderror">
                <option value="-1">Seleccione una categoría de publicación..</option>
                @foreach ($postCategories as $postCategory)
                    <option value="{{ $postCategory->id }}"
                        {{ isSelectedOld(old('post_category_id'), $postCategory->id) }}>
                        {{ $postCategory->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('post_category_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- PostCategory -->

        <!-- Title -->
        <div class="form-group">
            <label>Título:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ old('title') }}">
        </div>
        @error('title')
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
            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date"
                value="{{ old('date') }}">
        </div>
        @error('date')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Date -->


        <!-- File -->
        <div class="form-group" >
            <label for="exampleFormControlFile1">Fotos de noticias: <small class="text-muted">(Obligatorio) - La última foto seleccionada será la principal.</small></label>
            <input type="file" class="form-control-file" name="image[]" multiple accept="image/*" required>
        </div>
        @error('image.*')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./File -->


        <!-- Submit -->
        <div class="form-group">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="btn btn-sm btn-danger">Guardar</button>
                <button class="btn btn-sm btn-warning ml-5"><a style="color:black;
                    text-decoration: none;" href="{{ route('admin.posts.index') }}">Regresar</a> </button>
            </div>
        </div>
        <!-- ./Submit -->
    </form>
@endif
