<div class="container-fluid mt-4">
    <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="vertical-align: middle;text-align:center;">Imagen/Video</th>
                    <th style="vertical-align: middle;text-align:center;">Graduado</th>
                    <th style="vertical-align: middle;text-align:center;">Descripción</th>
                    <th style="vertical-align: middle;text-align:center;">Fecha de Publicación</th>
                    <th style="vertical-align: middle;text-align:center;">Acciones</th>
                    <th style="vertical-align: middle;text-align:center;">Cantidad de <span class="text-primary">Fotos</span>/<span class="text-success">Videos</span>
                    </th>

                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                <tr>
                    <td>
                        @if ($item->getCountimage()!=0)
                        <img src="{{ asset($item->imageHeader()->fullasset()) }}" alt="" width="55rem">
                        
                        @else
                        <img src="https://www.uncommunitymanager.es/wp-content/uploads/seo_google_youtube.jpg" alt=""
                            width="55rem">
                            @endif
                    </td>
                    <td style="vertical-align: middle;">{{ $item->nombre }}</td>
                    <td style="white-space: pre-wrap;vertical-align: middle;">{{ $item->description }}</td>
                    <td style="vertical-align: middle;">{{ $item->date }}</td>


                    <td style="vertical-align: middle;">
                        <div class="btn-group">
                            <div class="mr-3 ml-1">
                                <a href="{{ route('admin.graduateQuality.edit', $item->id) }}" class="btn btn-sm btn-warning"><i
                                        class="fas fa-edit"></i></a>
                            </div>
                            <div class="mr-3">
                                @if($item->getCountimage()>=1)
                                <a href="{{ route('admin.graduateQuality.images', $item->id) }}" class="btn btn-sm btn-info"><em
                                    class="fas fa-image"></em></a>
                                @else
                                    <button disabled><em class="fas fa-image"></em></button>
                                @endif
                                

                                
                            </div>

                           {{--  @if($item->getCountimage()>= 2) --}}
                            <div class="mr-1">
                                <form action="{{ route('admin.graduateQuality.destroy', $item->id) }}" id="{{ $item->id }}"
                                    method="POST" class="formulario-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><em
                                            class="fas fa-trash"></em></button>
                                </form>
                              
                            </div>
                          {{--   @else
                            <div class="mr-1">
                                <button disabled><em class="fas fa-image"></em></button>

                            </div>

                            @endif --}}


                        </div>
                    </td>


                    <td class="text-center" style="vertical-align: middle;">
                            @if($item->getCountimage()>=1 && !(is_null($item->videoHeader())))
                            <div class="row">
                            <div class="col-md-6">
                                @if($item->getCountimage()>=1)
                                <h3 class="text-primary">{{ $item->getCountimage() }}</h3>
                                {{-- @else
                                <h3 class="text-success">{{ $item->getCountVideo() }}</h3> --}}
                                @endif
                            </div>
                            <div class="col-md-6">
                                @if(!(is_null($item->videoHeader())))
                                <h3 class="text-success">1</h3>
                                @endif
                            </div>
                        </div>
                            @elseif($item->getCountimage()>=1 )
                            @if($item->getCountimage()>=1)
                                <h3 class="text-primary">{{ $item->getCountimage() }}</h3>
                                {{-- @else
                                <h3 class="text-success">{{ $item->getCountVideo() }}</h3> --}}
                                @endif
                            @elseif(!(is_null($item->videoHeader())))
                            @if( !(is_null($item->videoHeader())))
                            <h3 class="text-success">1</h3>
                            @endif
                            @endif
                        <div class="mr-3 ml-1">
                        </div>
                        <div class="mr-3">
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