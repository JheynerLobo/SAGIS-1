@if ($editMode)
    <!-- Form -->
    <form action="{{ route('admin.situationGraduate.update',[$item->anio_graduation,$item->anio_actual]) }}" method="post"  enctype="multipart/form-data">
        @csrf 
        @method('PATCH')
        <!-- Año Grado -->
        <div class="form-group">
            <label class="form-label">Año de Graduación:</label>
            <input type="text" class="form-control " name="anio_graduation" value="{{ $item->anio_graduation }}">
        </div>
        @error('anio_graduation')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- Año Grado -->

        <!-- Total Graduados -->
        <div class="form-group">
            <label class="form-label">Total Graduados:</label>
            <input type="text" class="form-control " name="graduados" value="{{ $item->graduados }}">
        </div>
        @error('graduados')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- Total Graduados -->

        <!-- Año Actual -->
        <div class="form-group">
            <label class="form-label">Año Actual:</label>
            <input type="text" class="form-control " name="anio_actual" value="{{ $item->anio_actual }}">
        </div>
        @error('anio_actual')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Año Actual -->

        <!-- Independientes -->
        <div class="form-group">
            <label class="form-label">Graduados Independientes:</label>
            <input type="text" class="form-control " name="independientes" value="{{ $item->independientes }}">
        </div>
        @error('independientes')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- Independientes -->

        <!-- Dependientes -->
        <div class="form-group">
            <label class="form-label">Graduados Dependientes:</label>
            <input type="text" class="form-control " name="dependientes" value="{{ $item->dependientes }}">
        </div>
        @error('dependientes')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Año Actual -->

         <!-- Desempleado -->
         <div class="form-group">
            <label class="form-label">Graduados No Cotizantes:</label>
            <input type="text" class="form-control " name="desempleados" value="{{ $item->desempleados }}">
        </div>
        @error('desempleados')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Desempleado -->

        <!-- Submit -->
        <div class="mt-4">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-danger">Actualizar</button>
                <div class="ml-5">
                    <a class="btn btn-warning " style="color:black;
                    text-decoration: none;" href="{{ route('admin.situacionGraduados.index') }}">Regresar</a>
                </div>
            </div>
          
        </div>
        <!-- ./Submit -->
</form>
        
    @else
    <form action="{{ route('admin.situationGraduate.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
    <!-- Año Grado -->
    <div class="form-group">
            <label>Año de Graduación:</label>
            <input type="text" class="form-control @error('anio_graduation') is-invalid @enderror" name="anio_graduation"
                value="{{ old('anio_graduation') }}">
        </div>
        @error('anio_graduation')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Año Grado -->

        <!-- Total Graduado -->
    <div class="form-group">
            <label>Total Graduados:</label>
            <input type="text" class="form-control @error('graduados') is-invalid @enderror" name="graduados"
                value="{{ old('graduados') }}">
        </div>
        @error('graduados')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Año Grado -->

        <!-- Total Graduado -->
    <div class="form-group">
            <label>Año Actual:</label>
            <input type="text" class="form-control @error('anio_actual') is-invalid @enderror" name="anio_actual"
                value="{{ old('anio_actual') }}">
        </div>
        @error('anio_actual')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Año Actual -->

        <!-- Independientes -->
        <div class="form-group">
            <label>Graduados Independientes:</label>
            <input type="text" class="form-control @error('independientes') is-invalid @enderror" name="independientes"
                value="{{ old('independientes') }}">
        </div>
        @error('independientes')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Independientes -->

        <!-- Dependientes -->
        <div class="form-group">
            <label>Graduados Dependientes:</label>
            <input type="text" class="form-control @error('dependientes') is-invalid @enderror" name="dependientes"
                value="{{ old('dependientes') }}">
        </div>
        @error('independientes')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Dependientes -->

        <!-- Desempleados -->
        <div class="form-group">
            <label>Graduados No Cotizantes:</label>
            <input type="text" class="form-control @error('desempleados') is-invalid @enderror" name="desempleados"
                value="{{ old('desempleados') }}">
        </div>
        @error('desempleados')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Desempleados -->

          <!-- Submit -->
          <div class="form-group">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button class="btn btn-sm btn-danger">Guardar</button>
                <div class="ml-5">
                    <a class="btn btn-sm btn-warning " style="color:black;
                    text-decoration: none;" href="{{ route('admin.situacionGraduados.index') }}">Regresar</a>
                </div>
            </div>
        </div>
        <!-- ./Submit -->

</form>
@endif


