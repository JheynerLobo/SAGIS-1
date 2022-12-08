@if ($editMode)
    
 <!-- Form -->
 <form action="{{ route('admin.settings.update') }}" method="POST"  enctype="multipart/form-data">
    @csrf @method('PATCH')

    <!-- Name -->
    <div class="form-group">
        <label class="form-label">Nombres:</label>
        <input type="text" class="form-control " name="name" value="{{ $item->name }}">
    </div>
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Name -->

    <!-- Lastname -->
    <div class="form-group">
        <label class="form-label">Apellidos:</label>
        <input type="text" class="form-control " name="lastname" value="{{ $item->lastname }}">
    </div>
    @error('lastname')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Lastname -->

    <!-- DocumentType -->
    <div class="form-group">
        <label>Tipo de Documento:</label>
        <select name="document_type_id" class="form-control select2bs4">
            <option value="-1">Seleccione un tipo de documento..</option>
            @forelse ($documentTypes as $documentType)
                <option value="{{ $documentType->id }}"
                    {{ isSelectedOld($item->document_type_id, $documentType->id) }}>{{ $documentType->name }}
                </option>
            @empty
            @endforelse
        </select>
    </div>
    @error('document_type_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./DocumentType -->

    <!-- Document -->
    <div class="form-group">
        <label class="form-label">Documento:</label>
        <input type="number" class="form-control " name="document" value="{{ $item->document }}">
    </div>
    @error('document')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Document -->

    <!-- Birthdate -->
    <div class="form-group">
        <label>Fecha de Nacimiento</label>
        <input type="date" class="form-control" name="birthdate" value="{{ $item->birthdate }}">
    </div>
    @error('birthdate')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Birthdate -->

    <!-- BirthdatePlaceId -->
    <div class="form-group">
        <label>Lugar de Nacimiento:</label>
        <select name="birthdate_place_id" class="form-control select2bs4">
            <option value="-1">Seleccione el lugar de Nacimiento..</option>
            @forelse ($cities as $city)
                <option value="{{ $city->id }}"{{ isSelectedOld($item->birthdate_place_id, $city->id) }}>
                    {{ 'País: ' . $city->state->country->name . ' Departamento: ' . $city->state->name . '  Ciudad: ' . $city->name }}
                </option>
            @empty
            @endforelse
        </select>
    </div>
    @error('birthdate_place_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./BirthdatePlaceId -->

    <!-- Address -->
    <div class="form-group">
        <label class="form-label">Dirección de Residencia:</label>
        <input type="text" class="form-control " name="address" value="{{ $item->address }}">
    </div>
    @error('address')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Address -->

    <!-- Phone -->
    <div class="form-group">
        <label class="form-label">Celular Personal:</label>
        <input type="text" class="form-control " name="phone" value="{{ $item->phone }}">
    </div>
    @error('phone')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Phone -->

    <!-- Telephone -->
    <div class="form-group">
        <label class="form-label">Teléfono:</label>
        <input type="text" class="form-control " name="telephone" value="{{ $item->telephone }}">
    </div>
    @error('telephone')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Telephone -->

    

    <!-- CompanyEmail -->
    <div class="form-group">
        <label class="form-label">Correo Institucional(@ufps):</label>
        <input type="email" class="form-control " name="company_email" value="{{ $item->admin->email }}"
            pattern=".+@ufps.edu.co" size="30">
    </div>
    @error('company_email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./CompanyEmail -->

    <!-- Email -->
    <div class="form-group">
        <label class="form-label">Correo Personal:</label>
        <input type="email" class="form-control " name="email" value="{{ $item->email }}" size="30">
    </div>
    @error('email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Email -->

    <!-- Imagen Principal -->
    <div class="form-group">
        <label>Foto de perfil:</label>
        <div class="text-center">
            <img style="width: 340px; height: 340px" src="{{ asset($item->fullAsset() ) }}" alt="">

        </div>
        <div class="mt-2">
            <input type="file" class="form-control-file" name="image" accept="image/*" >
        </div>   
    </div>
    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Imagen principal -->


    <!-- Submit -->
    <div class="mt-4">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="submit" class="btn btn-danger">Guardar</button>
            <div class="ml-5">
                <a class="btn btn btn-warning " style="color:black;
                text-decoration: none;" href="{{ route('admin.settings') }}">Regresar</a>
            </div>
        </div>
      
    </div>
    <!-- ./Submit -->
    
</form>


@else

    <!-- Form -->
 <form action="{{ route('admin.settings.update_admin', $item->id) }}" method="POST"  enctype="multipart/form-data">
    @csrf @method('PATCH')

    <!-- Name -->
    <div class="form-group">
        <label class="form-label">Nombres:</label>
        <input type="text" class="form-control " name="name" value="{{ $item->name }}">
    </div>
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Name -->

    <!-- Lastname -->
    <div class="form-group">
        <label class="form-label">Apellidos:</label>
        <input type="text" class="form-control " name="lastname" value="{{ $item->lastname }}">
    </div>
    @error('lastname')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Lastname -->

    <!-- DocumentType -->
    <div class="form-group">
        <label>Tipo de Documento:</label>
        <select name="document_type_id" class="form-control select2bs4">
            <option value="-1">Seleccione un tipo de documento..</option>
            @forelse ($documentTypes as $documentType)
                <option value="{{ $documentType->id }}"
                    {{ isSelectedOld($item->document_type_id, $documentType->id) }}>{{ $documentType->name }}
                </option>
            @empty
            @endforelse
        </select>
    </div>
    @error('document_type_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./DocumentType -->

    <!-- Document -->
    <div class="form-group">
        <label class="form-label">Documento:</label>
        <input type="number" class="form-control " name="document" value="{{ $item->document }}">
    </div>
    @error('document')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Document -->

    <!-- Birthdate -->
    <div class="form-group">
        <label>Fecha de Nacimiento</label>
        <input type="date" class="form-control" name="birthdate" value="{{ $item->birthdate }}">
    </div>
    @error('birthdate')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Birthdate -->

    <!-- BirthdatePlaceId -->
    <div class="form-group">
        <label>Lugar de Nacimiento:</label>
        <select name="birthdate_place_id" class="form-control select2bs4">
            <option value="-1">Seleccione el lugar de Nacimiento..</option>
            @forelse ($cities as $city)
                <option value="{{ $city->id }}"{{ isSelectedOld($item->birthdate_place_id, $city->id) }}>
                    {{ 'País: ' . $city->state->country->name . ' Departamento: ' . $city->state->name . '  Ciudad: ' . $city->name }}
                </option>
            @empty
            @endforelse
        </select>
    </div>
    @error('birthdate_place_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./BirthdatePlaceId -->

    <!-- Address -->
    <div class="form-group">
        <label class="form-label">Dirección de Residencia:</label>
        <input type="text" class="form-control " name="address" value="{{ $item->address }}">
    </div>
    @error('address')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Address -->

    <!-- Phone -->
    <div class="form-group">
        <label class="form-label">Celular Personal:</label>
        <input type="text" class="form-control " name="phone" value="{{ $item->phone }}">
    </div>
    @error('phone')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Phone -->

    <!-- Telephone -->
    <div class="form-group">
        <label class="form-label">Teléfono:</label>
        <input type="text" class="form-control " name="telephone" value="{{ $item->telephone }}">
    </div>
    @error('telephone')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Telephone -->

    

    <!-- CompanyEmail -->
    <div class="form-group">
        <label class="form-label">Correo Institucional(@ufps):</label>
        <input type="email" class="form-control " name="company_email" value="{{ $item->admin->email }}"
            pattern=".+@ufps.edu.co" size="30">
    </div>
    @error('company_email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./CompanyEmail -->

    <!-- Email -->
    <div class="form-group">
        <label class="form-label">Correo Personal:</label>
        <input type="email" class="form-control " name="email" value="{{ $item->email }}" size="30">
    </div>
    @error('email')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Email -->

    <!-- Imagen Principal -->
    <div class="form-group">
        <label>Foto de perfil:</label>
        <div class="text-center">
            <img style="width: 340px; height: 340px" src="{{ asset($item->fullAsset() ) }}" alt="">

        </div>
        <div class="mt-2">
            <input type="file" class="form-control-file" name="image" accept="image/*" >
        </div>   
    </div>
    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
    <!-- ./Imagen principal -->


    <!-- Submit -->
    <div class="mt-4">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="submit" class="btn btn-danger">Guardar</button>
            <div class="ml-5">
                <a class="btn btn btn-warning " style="color:black;
                text-decoration: none;" href="{{ route('admin.settings') }}">Regresar</a>
            </div>
        </div>
      
    </div>
    <!-- ./Submit -->
    
</form>


@endif
 
 