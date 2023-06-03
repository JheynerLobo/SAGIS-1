<div class="container-fluid mt-4">
    <div class="table-responsive">
        @php $lastDato = null; $dato2Index = 0; @endphp

        @foreach ($datos as $dato)
            @if ($lastDato !== $dato->anio_graduation)
                @if (!is_null($lastDato))
                    
                @endif

                <table id="example1" class="table table-bordered table-striped" style="text-align:center">
                    <h3 style="color:#5e2129; text-align:center">Año de Graduación: {{ $dato->anio_graduation }} </h3>
                    <h3 style="color:#5e2129">Total Graduados: {{$dato->graduados}}</h3>
                    <thead>
                        <tr>
                            <th>Año Registro</th>
                            <th>Graduados Independientes</th>
                            <th>Graduados Dependientes</th>
                            <th>Graduados No Cotizantes</th>
                            <th>% Trabajando Por Año</th>
                            <th>% Promedio Total</th>
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
                
                @php
                    $currentDato2 = null; 

                    if ($dato2Index < count($datos2) && $datos2[$dato2Index]->anio_graduation === $dato->anio_graduation) {
                        $currentDato2 = $datos2[$dato2Index];
                        $dato2Index++;
                    }
                @endphp

                @if (!is_null($currentDato2))
                    <td rowspan="{{ $currentDato2->cantidad_registros }}" style="vertical-align: middle; font-family: calfine; font-size:25px;color:#5e2129">
                    {{ round($currentDato2->promedio_trabajando, 2) }} %
                    </td>
                @endif
            </tr>

            @php $lastDato = $dato->anio_graduation; @endphp
        @endforeach
        
        </tbody>
    </table>
    <br>
    </div>
</div>