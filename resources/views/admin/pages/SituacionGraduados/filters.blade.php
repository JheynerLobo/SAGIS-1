<html>
<head>
<style>
            .caja, {
                border: 1px solid #d9d9d9;
                height: 30px;
                overflow: hidden;
                width: 20px;
                position: absolute;
                left: 50%;
                
            }
        </style>
</head>
<form method="GET">
    <div class="caja">
    
    <select name="anio_graduacion" id="anio_graduacion" style="background: transparent; border: none font-size: 14px; height: 30px; padding: 5px; width: 100px;">
    @php $lastDato = null; @endphp
        @foreach ($aniosGraduacion as $anio)
        @if ($lastDato !== $anio)
        <label for="anio">Selecciona un año:</label>
            <option value="{{ $anio }}">{{ $anio }}</option>
            @php $lastDato = $anio; @endphp
        @endif
        @endforeach
    </select>

</form>

            
            <a href="{{route('admin.situationGraduateByAnio')}}">
                <button class="btn btn-danger btn-sm">Filtrar</button>
             
                <a href="{{route('admin.situacionGraduado.create')}}" class="btn btn-primary btn-sm ml-2">Registrar Situación</a>
            </div>
            <hr>    
</div>
</html>