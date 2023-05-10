<div class="container-fluid mt-4">
    <div class="table-responsive">
        <table class="table table-sm table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Cargo</th>
                    <th>Description</th>
                    <th>Fecha de Publicación</th>
                    <th>Acciones</th>
                    

                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                <tr>
                    
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->cargo }}</td>
                    <td style="white-space: pre-wrap;">{{ $item->description }}</td>
                    <td>{{ $item->date }}</td>
                    <td>
                        <div class="btn-group">
                            <div class="mr-3 ml-1">
                                <a href="{{ route('admin.posts.edit', $item->id) }}" class="btn btn-sm btn-warning"><i
                                        class="fas fa-edit"></i></a>
                            </div>


                            <div class="mr-3">
                                @if($item->postCategory->id != 5)
                                <a href="{{ route('admin.posts.images', $item->id) }}" class="btn btn-sm btn-info"><em
                                    class="fas fa-image"></em></a>
                                @else
                                    <button disabled><em class="fas fa-image"></em></button>
                                @endif
                                

                                
                            </div>

                            <div class="mr-1">
                                <form action="{{ route('admin.posts.destroy', $item->id) }}" id="{{ $item->id }}"
                                    method="POST" class="formulario-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><em
                                            class="fas fa-trash"></em></button>
                                </form>
                              
                            </div>
                    


                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="12">No hay registros..</td>
                </tr>
                @endforelse


            </tbody>
        </table>
    </div>

</div>