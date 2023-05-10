<div class="container-fluid mt-4">
    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Video</th>
                    <th>Graduado</th>
                    <th>Descripción</th>
                    <th>Fecha de Publicación</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                <tr>
                    <td>
                        <img src="https://www.uncommunitymanager.es/wp-content/uploads/seo_google_youtube.jpg" alt=""
                            width="55rem">
                        
                    </td>
                    <td>{{ $item->nombre }}</td>
                    <td style="white-space: pre-wrap;">{{ $item->description }}</td>
                    <td>{{ $item->date }}</td>
                    <td>
                        <div class="btn-group">
                            <div class="mr-3 ml-1">
                                <a href="{{route('admin.experiences.edit', $item->id)}}" method="POST" class="btn btn-sm btn-warning"><i
                                        class="fas fa-edit"></i></a>
                            </div>



                           
                            <div class="mr-1">
                                <form action="{{ route('admin.experiences.destroy', $item->id) }}"
                                    method="POST" class="formulario-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><em
                                            class="fas fa-trash"></em></button>
                                </form>
                              
                            </div>
                          

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