@if ($editMode)
    <!-- Form -->
    <form action="{{ route('admin.graduates.update', $item->id) }}" method="POST">
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
            <label class="form-label">Teléfono(Opcional):</label>
            <input type="text" class="form-control " name="telephone" value="{{ $item->telephone }}">
        </div>
        @error('telephone')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Telephone -->

        <!-- Code -->
        <div class="form-group">
            <label class="form-label">Código Institucional:</label>
            <input type="text" class="form-control " name="code" value="{{ $item->user->code }}">
        </div>
        @error('code')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Code -->

        <!-- CompanyEmail -->
        <div class="form-group">
            <label class="form-label">Correo Institucional(@ufps):</label>
            <input type="email" class="form-control " name="company_email" value="{{ $item->user->email }}"
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


            <!-- Academic Information -->
          {{--   <div class="card">
                <div class="card-header  border-info">
                    <h3 class="card-title"><b>Datos académicos</b> </h3>
                </div>
 --}}
                <!-- /.card-header -->
                {{-- <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nivel Académico</th>
                                    <th>Nombre Programa</th>
                                    <th>Universidad</th>
                                    <th>Año Graduado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($academics as $is => $academic)
                                    <tr>
                                        <td>{{ $loop->index }}</td>
                                        <td>{{ $academic->program->academicLevel->name }}</td>
                                        <td>{{ $academic->program->name }}</td>
                                        <td>{{ $academic->program->faculty->university->name }}</td>
                                        <div class="form-group">
                                        <td> <input type="text" name="year{{ $is }}" value="{{ $academic->year }}" size="5"></td>
                                    </div>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12">Vacío.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div> --}}
                <!-- /.card-body -->


            {{-- </div> --}}
            <!-- ./Academic Information -->


        <!-- Submit -->
        <div class="mt-4">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-danger">Guardar</button>
                <button class="btn btn-warning ml-5"><a style="color:black;
                    text-decoration: none;" href="{{ route('admin.graduates.index') }}">Regresar</a> </button>
            </div>
          
        </div>
        <!-- ./Submit -->
        
    </form>
    <!-- ./Form -->
@else
    <!-- Form -->
    <form action="{{ route('admin.graduates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label class="form-label">Nombres:</label>
            <input type="text" class="form-control " name="name" value="{{ old('name') }}">
        </div>
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Name -->

        <!-- Lastname -->
        <div class="form-group">
            <label class="form-label">Apellidos:</label>
            <input type="text" class="form-control " name="lastname" value="{{ old('lastname') }}">
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
                        {{ isSelectedOld(old('document_type_id'), $documentType->id) }}>{{ $documentType->name }}
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
            <input type="text" class="form-control " name="document" value="{{ old('document') }}">
        </div>
        @error('document')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Document -->

        <!-- Birthdate -->
        <div class="form-group">
            <label>Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="birthdate" value="{{ old('birthdate') }}">
        </div>
        @error('birthdate')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Birthdate -->

        <!-- BirthdatePlaceId -->
        <div class="form-group">
            <label>Lugar de Nacimiento:</label>
            <select name="birthdate_place_id" value="{{ old('birthdate_place_id') }}"
                class="form-control select2bs4">
                <option value="-1">Seleccione el lugar de Nacimiento..</option>
                @forelse ($cities as $city)
                    <option value="{{ $city->id }}" {{ isSelectedOld(old('birthdate_place_id'), $city->id) }}>
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
            <input type="text" class="form-control " name="address" value="{{ old('address') }}">
        </div>
        @error('address')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Address -->

        <!-- Phone -->
        <div class="form-group">
            <label class="form-label">Celular Personal:</label>
            <input type="text" class="form-control " name="phone" value="{{ old('phone') }}">
        </div>
        @error('phone')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Phone -->

        <!-- Telephone -->
        <div class="form-group">
            <label class="form-label">Teléfono(Opcional):</label>
            <input type="text" class="form-control " name="telephone" value="{{ old('telephone') }}">
        </div>
        @error('telephone')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Telephone -->

        <!-- Code -->
        <div class="form-group">
            <label class="form-label">Código Institucional:</label>
            <input type="text" class="form-control " name="code" value="{{ old('code') }}">
        </div>
        @error('code')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Code -->

        <!-- CompanyEmail -->
        <div class="form-group">
            <label class="form-label">Correo Institucional(@ufps):</label>
            <input type="email" class="form-control " name="company_email" value="{{ old('company_email') }}"
                pattern=".+@ufps.edu.co" size="30">
        </div>
        @error('company_email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./CompanyEmail -->

        <!-- Email -->
        <div class="form-group">
            <label class="form-label">Correo Personal:</label>
            <input type="email" class="form-control " name="email" value="{{ old('email') }}"
                size="30">
        </div>
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./Email -->

        <!-- File -->
        <div class="form-group">
            <label for="exampleFormControlFile1">Foto de Perfil</label>
            <input type="file" class="form-control-file" name="image" accept="image/*">
        </div>
        @error('image')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <!-- ./File -->

        <!-- Submit -->
        <div class="mt-4">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="submit" class="btn btn-danger">Guardar</button>
                <button class="btn btn-warning ml-5"><a style="color:black;
                    text-decoration: none;" href="{{ route('admin.graduates.index') }}">Regresar</a> </button>
            </div>
          
        </div>
        <!-- ./Submit -->

       
    </form>
    <!-- ./Form -->
@endif
