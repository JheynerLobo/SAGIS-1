<div class="container-fluid mt-4">
    <div class="table-responsive">
        <table class="table table-sm table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Categoría</th>
                    <th>Description</th>
                    <th>Fecha de Publicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->postCategory->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->date }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.posts.edit', $item->id) }}" class="btn btn-sm btn-warning"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.posts.destroy', $item->id) }}"
                                    id="{{ $item->id }}" method="POST" class="formulario-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>

</div>
