
<form action="{{ route('admin.graduates.store_jobs', $item->id) }}" method="POST" >
    @csrf 


    <div class="form-group">
        <label class="form-label">Empresa:</label>
        <select name="company_id" class="form-control select2bs4"  id="empresas" onchange="seleccionarNoExisteJobs()">
            <option value="-1" disabled selected>Seleccione la empresa.</option>
            <option value="-2">No existe la empresa (Crearla).</option>
            @forelse ($companies as $company)

            <option value="{{ $company->id }}" >
                {{$company->name}}
            </option>
            @empty
            @endforelse
        </select>
    </div>
    @error('company_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  


    <div class="form-group"  id="name_compamy">
        <label class="form-label">Nombre Empresa:</label>
        <input type="text" class="form-control " name="name"  id="name_compamy_input" required>
    </div>
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror


    <div class="form-group"  id="email_company">
        <label class="form-label">Correo electrónico (Empresa):</label>
        <input type="email" class="form-control " name="email" id="email_company_input" required >
    </div>
    @error('email')
        <small class="text-danger">{{ $message }}</small>
    @enderror

    
    <div class="form-group" id="address_company">
        <label class="form-label">Dirección de la empresa:</label>
        <input type="text" class="form-control " name="address" id="address_company_input" required >
    </div>
    @error('address')
        <small class="text-danger">{{ $message }}</small>
    @enderror


    <div class="form-group" id="phone_company">
        <label class="form-label">Celular de la empresa:</label>
        <input type="text" class="form-control " name="phone"  id="phone_company_input" required>
    </div>
    @error('phone')
        <small class="text-danger">{{ $message }}</small>
    @enderror



    <div class="form-group">
        <label>Lugar de la empresa:</label>
        <select name="company_place_id" id="lugares_u" value="{{ old('company_place_id') }} " onchange="seleccionarNoExiste()"
            class="form-control select2bs4">
            <option value="-1" disabled selected>Seleccione el lugar de la Empresa.</option>
            <option value="-2">No existe el lugar (Crearlo).</option>
            @forelse ($cities as $city)
                <option value="{{ $city->id }}" {{ isSelectedOld(old('company_place_id'), $city->id) }}>
                    {{ 'País: ' . $city->state->country->name . ' Departamento: ' . $city->state->name . '  Ciudad: ' . $city->name }}
                </option>
            @empty
            @endforelse
        </select>
    </div>
    @error('company_place_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror


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


    <div class="form-group">
        <label class="form-label">Salario:</label>
        <input type="text" class="form-control " name="salary" >
    </div>
    @error('salary')
        <small class="text-danger">{{ $message }}</small>
    @enderror

    


    <div class="form-group">
        <label class="form-label">¿Está actualmente trabajando? (SI O NO):</label>
        <select name="in_working" class="form-control select2bs4">
            <option value="-1" disabled selected>Seleccione SI o NO.</option>


            <option value="0">
                NO
            </option>

            <option value="1" >
                SI
            </option>

        </select>
    </div>
    @error('in_working')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  


    <!-- Submit -->
    <div class="mt-4">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="submit" class="btn btn-danger" >Guardar</button>
            <div class="ml-5">
                <a class="btn btn-warning " style="color:black;
                text-decoration: none;" href="{{ route('admin.graduates.show', $item->id) }}">Regresar</a>
            </div>
        </div>

    </div>
    <!-- ./Submit -->

</form>
