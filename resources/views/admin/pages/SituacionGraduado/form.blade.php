@if ($editMode)
    <!-- Form -->
    <form action="{{ route(#) }}" method="POST"  enctype="multipart/form-data">
        @csrf @method('PATCH')

        <!-- Año Grado -->
        <div class="form-group">
            <label class="form-label">Año de Graduación:</label>
            <input type="text" class="form-control " name="ano">
        </div>
        @error('ano')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- Año Grado -->

        <!-- Año Actual -->
        <div class="form-group">
            <label class="form-label">Año Actual:</label>
            <input type="text" class="form-control " name="ano_actual">
        </div>
        @error('ano_actual')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Año Actual -->

        <!-- Independientes-->
        <div class="form-group">
            <label class="form-label">Graduados Independientes:</label>
            <input type="text" class="form-control " name="independiente">
        </div>
        @error('independiente')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- Independientes -->

        <!-- Dependientes -->
        <div class="form-group">
            <label class="form-label">Grafuados Dependientes:</label>
            <input type="text" class="form-control " name="dependiente">
        </div>
        @error('dependiente')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Año Actual -->

         <!-- Desempleado -->
         <div class="form-group">
            <label class="form-label">Graduados Desempleados:</label>
            <input type="text" class="form-control " name="desempleado">
        </div>
        @error('desempleado')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Desempleado -->