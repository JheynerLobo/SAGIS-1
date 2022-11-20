<form action="{{ route('update_academic', $data_academic->id) }}" method="POST">
    @csrf @method('PATCH')

    <div class="form-group">
        <label class="form-label">Nivel académico:</label>
        <select name="academic_level_id" class="form-control select2bs4">
            <option value="-1">Seleccione el nivel academico.</option>
            @forelse ($academic_levels as $level)

            <option value="{{ $level->id }}" {{ isSelectedOld( $data_academic->program->academicLevel->id, $level->id) }}>
                {{$level->name}}
            </option>
            @empty
            @endforelse
        </select>
    </div>
    @error('academic_level_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Level Academic -->

    <div class="form-group">
        <label class="form-label">Programa:</label>
        <input type="text" class="form-control " name="program_name" value="{{ $data_academic->program->name }}" >
    </div>
    @error('program_name')
        <small class="text-danger">{{ $message }}</small>
    @enderror


    <div class="form-group">
        <label class="form-label">Facultad:</label>
        <input type="text" class="form-control " name="faculty_name" value="{{ $data_academic->program->faculty->name }}" >
    </div>
    @error('faculty_name')
        <small class="text-danger">{{ $message }}</small>
    @enderror

    
     <div class="form-group">
        <label class="form-label">Universidad:</label>
        <input type="text" class="form-control " name="university_name" value="{{ $data_academic->program->faculty->university->name }}" >
    </div>
    @error('university_name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
   



    <!-- Year -->
    <div class="form-group">
        <label class="form-label">Año:</label>
        <input type="text" class="form-control " name="year" value="{{ $data_academic->year }}">
    </div>
    @error('year')
    <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Year -->




    <!-- Submit -->
    <div class="mt-4">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="submit" class="btn btn-danger">Guardar</button>
            <button class="btn btn-warning ml-5"><a style="color:black;
                    text-decoration: none;" href="{{ route('academics') }}">Regresar</a> </button>
        </div>

    </div>
    <!-- ./Submit -->

</form>
