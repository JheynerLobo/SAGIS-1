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
                <th>Año Registro</th>
                <th>Graduados Independientes</th>
                <th>Graduados Dependientes</th>
                <th>Graduados No Cotizantes</th>
                <th>% Trabajando Por Año</th>
                <th>Promedio Total Por Cotizantes</th>
                
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
                    
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
</div>