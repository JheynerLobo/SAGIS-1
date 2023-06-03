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
<form method="GET" action="{{ route('admin.situationGraduateByAnio') }}">
    <div class="caja">
    
    <select name="anio_selected"  style="background: transparent; border: none font-size: 14px; height: 30px; padding: 5px; width: 100px; margin-top:5px">
    @php $lastDato = null; @endphp
    <option >Año:</option>
        @foreach ($aniosGraduacion as $anio)
        @if ($lastDato !== $anio)
        
            <option value="{{ $anio }}">{{ $anio }}</option>
            @php $lastDato = $anio; @endphp
        @endif
        @endforeach
    </select>
                <button class="btn btn-danger btn-sm">Filtrar</button>
                </form>
                <a href="{{route('admin.situacionGraduado.create')}}" class="btn btn-primary btn-sm ml-2">Registrar Situación</a>
            </div>
            <hr>    
</div>
</html>