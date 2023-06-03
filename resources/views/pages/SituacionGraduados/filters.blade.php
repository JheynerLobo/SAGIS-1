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
<div class="row">
<form method="GET" action="{{ route('situationGraduateByAnio') }}">
    <div class="caja">
    
    <select name="anio_selected"  style="background: transparent; border: none font-size: 14px; height: 30px; padding: 5px; width: 100px; margin-top:10px">
    @php $lastDato = null; @endphp
    <option >Año:</option>
        @foreach ($aniosGraduacion as $anio)
        @if ($lastDato !== $anio)
        
            <option value="{{ $anio }}">{{ $anio }}</option>
            @php $lastDato = $anio; @endphp
        @endif
        @endforeach
    </select>
                <button class="btn btn-danger btn-sm" style="margin-bottom:5px">Filtrar</button>
                </form>
                </div>

            
            <hr>    
</div>
</html>