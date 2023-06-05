<div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped" style="text-align:center">
        <h3 style="color:#5e2129; text-align:center">Año de Graduación: {{ $anio }}</h3>
        @foreach ($datosFiltrados as $dato)
        @if($loop->first)
        <h3 style="color:#5e2129">Total Graduados: {{$dato->graduados}}</h3>
        @endif
        @endforeach
        <thead>
            <tr>
                <th style="vertical-align: middle;text-align:center;">Año Registro</th>
                <th style="vertical-align: middle;text-align:center;">Graduados Independientes</th>
                <th style="vertical-align: middle;text-align:center;">Graduados Dependientes</th>
                <th style="vertical-align: middle;text-align:center;">Graduados No Cotizantes</th>
                <th style="vertical-align: middle;text-align:center;">% Trabajando Por Año</th>
                <th style="vertical-align: middle;text-align:center;">Promedio Total Por Cotizantes</th>
                <th style="vertical-align: middle;text-align:center;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @php $promedioTrabajando = isset($datos[0]) ? round($datos[0]->promedio_trabajando, 2) : null; @endphp
            @foreach ($datosFiltrados as $key => $dato)
                <tr>
                    <td style="white-space: pre-wrap;">{{ $dato->anio_actual }}</td>
                    <td>{{ $dato->independientes }}</td>
                    <td>{{ $dato->dependientes }}</td>
                    <td>{{ $dato->desempleados }}</td>
                    <td>{{ $dato->trabajando }} %</td>
                    @if ($key === 0)
                        <td rowspan="{{ $cantidadRegistros }}" style="vertical-align: middle; font-family: calfine; font-size:25px;color:#5e2129">
                            {{ round($promedioTrabajando, 2) }} %
                        </td>
                    @endif
                    <td>
                        <div class="btn-group">
                            <div class="mr-3 ml-1">
                                <a href="{{ route('admin.situationGraduate.edit',array($dato->anio_graduation, $dato->anio_actual)) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            </div>
                            <div class="mr-1">
                                <form action="{{route('admin.situacionGraduados.destroy',[$dato->anio_graduation, $dato->anio_actual])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><em class="fas fa-trash"></em></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
</div>