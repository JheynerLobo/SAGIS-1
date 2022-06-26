@if ($editMode)
    <form action="{{ route('admin.posts.update', $item->id) }}" method="post">
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
            <textarea name="description" rows="5"
                class="form-control @error('description') is-invalid @enderror">
                {{ $item->description }}
            </textarea>
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

        <!-- Submit -->
        <div class="form-group">
            <button class="btn btn-sm btn-danger">Guardar</button>
        </div>
        <!-- ./Submit -->
    @else
        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf

            <!-- PostCategory -->
            <div class="form-group">
                <label>Categoría de la Publicación:</label>
                <select name="post_category_id"
                    class="form-control select2bs4 @error('post_category_id') is-invalid @enderror">
                    <option value="-1">Seleccione una categoría de publicación..</option>
                    @foreach ($postCategories as $postCategory)
                        <option value="{{ $postCategory->id }}"
                            {{ isSelectedOld($item->post_category_id, $postCategory->id) }}>
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
                    value="{{ $item->title }}">
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
                    value="{{ $item->date }}">
            </div>
            @error('date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <!-- ./Date -->

            <!-- Submit -->
            <div class="form-group">
                <button class="btn btn-sm btn-danger">Guardar</button>
            </div>
            <!-- ./Submit -->
        </form>
@endif
