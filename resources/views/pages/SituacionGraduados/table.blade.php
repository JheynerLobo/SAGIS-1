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
                    <h3 style="color:#f00; text-align:center">Año de Graduación: {{ $dato->anio_graduation }}</h3>
                    <thead>
                        <tr>
                            <th>Año Registro</th>
                            <th>Graduados Independientes</th>
                            <th>Graduados Dependientes</th>
                            <th>Graduados No Cotizantes</th>
                            <th>% Graduados Cotizantes </th>
                        
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
                
            </tr>
            @php $lastDato = $dato->anio_graduation; @endphp
        @endforeach
        </tbody>
        </table>
    </div>
</div>