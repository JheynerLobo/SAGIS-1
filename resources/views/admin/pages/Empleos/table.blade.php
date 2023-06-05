<div class="container-fluid mt-4">
    <div class="table-responsive">
        <table class="table table-sm table-hover table-bordered table-striped table-sortable">
            <thead>
                <tr>
                    <th style="vertical-align: middle;text-align:center;">Imagen/Video</th>
                    <th style="vertical-align: middle;text-align:center;">Empresa</th>
                    <th style="vertical-align: middle;text-align:center;">Cargo</th>
                    <th style="vertical-align: middle;text-align:center;">Description</th>
                    <th style="vertical-align: middle;text-align:center;">Fecha de Publicación</th>
                    <th style="vertical-align: middle;text-align:center;">Url Postulación</th>
                    <th style="vertical-align: middle;text-align:center;">Acciones</th>
                    

                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                <tr>
                <td>
                        @if ($item->getCountimage()!=0)
                        <img src="{{ asset($item->imageHeader()->fullasset()) }}" alt="" width="55rem">
                        
                        @else
                        <p>Sin imagen</p>
                            @endif
                    </td>
                    <td>{{ $item->empresa }}</td>
                    <td>{{ $item->cargo }}</td>
                    <td style="white-space: pre-wrap;">{{ $item->description }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->url_postulation }}</td>
                    <td>
                        <div class="btn-group">
                            <div class="mr-3 ml-1">
                                <a href="{{ route('admin.empleos.edit',$item->id) }}" class="btn btn-sm btn-warning"><i
                                        class="fas fa-edit"></i></a>
                            </div>


                            <div class="mr-1">
                                <form action="{{ route('admin.empleos.destroy', $item->id) }}" id="{{ $item->id }}"
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