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
                            <th style="vertical-align: middle;text-align:center;">Año Registro</th>
                            <th style="vertical-align: middle;text-align:center;">Graduados Independientes</th>
                            <th style="vertical-align: middle;text-align:center;">Graduados Dependientes</th>
                            <th style="vertical-align: middle;text-align:center;">Graduados No Cotizantes</th>
                            <th style="vertical-align: middle;text-align:center;">% Trabajando Por Año</th>
                            <th style="vertical-align: middle;text-align:center;">% Promedio Total</th>
                            <th style="vertical-align: middle;text-align:center;">Acciones</th>
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
                    $currentDato2 = null; // Inicializar en null por defecto

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

            @php $lastDato = $dato->anio_graduation; @endphp
        @endforeach
        
        </tbody>
    </table>
    <br>
    </div>
</div>