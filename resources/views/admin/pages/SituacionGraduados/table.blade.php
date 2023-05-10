<div class="container-fluid mt-4">
    
    <div class="table-responsive">
        @php $lastDato = null; @endphp
        @foreach ($datos as $dato)
            @if ($lastDato !== $dato->anio_graduation)
                @if (!is_null($lastDato))
                    </tbody>
                    </table>
                @endif
                <table id="example1" class="table table-bordered table-striped" style="text-align:center">
                    <h3 style="color:#f00; text-align:center">Año de Graduación: {{ $dato->anio_graduation }} </h3> <h3 style="color:#000">Total de Graduados: {{$dato->graduados}}</h3>
                    <thead>
                        <tr>
                            <th>Año Registro</th>
                            <th>Graduados Independientes</th>
                            <th>Graduados Dependientes</th>
                            <th>Graduados No Cotizantes</th>
                            <th>Trabajando Ese Año</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
            @endif
            <tr>
                <td style="white-space: pre-wrap;">{{ $dato->anio_actual }}</td>
                <td>{{ $dato->independientes }}</td>
                <td>{{ $dato->dependientes }}</td>
                <td>{{ $dato->desempleados }}</td>
                <td>{{ $dato->trabajando }} %</td>
                
                <td>
                    <div class="btn-group">
                        <div class="mr-3 ml-1">
                        <a href="{{ route('admin.situationGraduate.edit',array($dato->anio_graduation, $dato->anio_actual)) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>

                        </div>
                        <div class="mr-1">
                        <form action="{{route('admin.situacionGraduados.destroy',[$dato->anio_graduation, $dato->anio_actual])}}" method="POST">
                        @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><em
                                            class="fas fa-trash"></em></button>
</form>                         
                        </div>
                        <br>
                    </div>
                </td>
            </tr>
            @php $lastDato = $dato->anio_graduation; @endphp
        @endforeach
        </tbody>
        </table>
    </div>
</div>