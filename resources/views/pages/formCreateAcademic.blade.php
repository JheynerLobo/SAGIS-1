
<form action="{{ route('store_academic') }}" method="POST" >
    @csrf 


    <div class="form-group">
        <label class="form-label">Universidad(IES):</label>
        <input type="text" class="form-control " name="university_name"  >
    </div>
    @error('university_name')
        <small class="text-danger">{{ $message }}</small>
    @enderror


    <div class="form-group" >
        <label class="form-label">Dirección de la Universidad:</label>
        <input type="text" class="form-control " name="address"  id="addressU">
    </div>
    @error('address')
        <small class="text-danger">{{ $message }}</small>
    @enderror



    <div class="form-group">
        <label class="form-label">Facultad:</label>
        <input type="text" class="form-control " name="faculty_name" >
    </div>
    @error('faculty_name')
        <small class="text-danger">{{ $message }}</small>
    @enderror


    <div class="form-group">
        <label class="form-label">Programa:</label>
        <input type="text" class="form-control " name="program_name"  >
    </div>
    @error('program_name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
   

    <div class="form-group">
        <label class="form-label">Nivel academico:</label>
        <select name="academic_level_id" class="form-control select2bs4">
            <option value="-1">Seleccione el nivel academico.</option>
            @forelse ($academic_levels as $level)

            <option value="{{ $level->id }}">
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


    <!-- Year -->
    <div class="form-group">
        <label class="form-label">Año:</label>
        <input type="text" class="form-control " name="year" value="" id="anio">
    </div>
    @error('year')
    <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Year -->
    
     <!-- university_place_id -->
     <div class="form-group">
        <label>Lugar de la universidad:</label>
        <select name="university_place_id" id="lugares_u" value="{{ old('university_place_id') }} " onchange="seleccionarNoExiste()"
            class="form-control select2bs4">
            <option value="-1" disabled selected>Seleccione el lugar de la Universidad.</option>
            <option value="-2">No existe el lugar.</option>
            @forelse ($cities as $city)
                <option value="{{ $city->id }}" {{ isSelectedOld(old('university_place_id'), $city->id) }}>
                    {{ 'País: ' . $city->state->country->name . ' Departamento: ' . $city->state->name . '  Ciudad: ' . $city->name }}
                </option>
            @empty
            @endforelse
        </select>
    </div>
    @error('university_place_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./university_place_id -->


    <div class="form-group" id="country">
        <label class="form-label">Pais:</label>
        <input type="text" class="form-control " name="country_name" id="country_input" required >
    </div>
    @error('country_name')
        <small class="text-danger">{{ $message }}</small>
    @enderror


    <div class="form-group" id="state">
        <label class="form-label">Estado/Departamento:</label>
        <input type="text" class="form-control " name="state_name" id="state_input" required>
    </div>
    @error('state_name')
        <small class="text-danger">{{ $message }}</small>
    @enderror

    <div class="form-group" id="city">
        <label class="form-label">Ciudad:</label>
        <input type="text" class="form-control " name="city_name" id="city_input" required >
    </div>
    @error('city_name')
        <small class="text-danger">{{ $message }}</small>
    @enderror


    <!-- Submit -->
    <div class="mt-4">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="submit" class="btn btn-danger" >Guardar</button>
            <button class="btn btn-warning ml-5"><a style="color:black;
                    text-decoration: none;" href="{{ route('academics') }}">Regresar</a> </button>
        </div>

    </div>
    <!-- ./Submit -->

</form>
