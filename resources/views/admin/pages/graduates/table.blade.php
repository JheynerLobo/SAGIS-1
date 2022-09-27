<div class="col-12">
    <div class="card">
        <div class="card-header  border-info">
            <h3 class="card-title"><b>Graduados registrados</b> </h3>
            <div class="mt-5">
                <a href="{{ route('admin.graduates.create') }}" class="btn btn-sm btn-danger">
                    Añadir nuevo
                    graduado</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Cedula</th>
                        <th>Código</th>
                        <th>Celular</th>
                        <th>Correo institucional</th>
                        <th>Ver datos completos</th>
                        <th>Estado verificado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td>
                                <img src="{{ asset($item->person->fullAsset()) }}" alt=""
                                    width="55rem">
                            </td>
                            <td>{{ $item->person->fullName() }}</td>
                            <td>{{ $item->person->document }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->person->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td style="text-align: center">
                                <a href="{{ route('admin.graduates.show', $item->person->id) }}">
                                    <button style=" border: none ;background-color: transparent"
                                        type="submit">
                                        <img src="{{ asset('img/lupa.png') }}"
                                            style="display: block; width: 30px; height: 30px; margin:auto;" />
                                    </button>

                                </a>
                            </td>
                            <td>
                                <img src="{{ asset('img/aprobado.png') }}" alt=""
                                    style="display: block; width: 30px; height: 30px; margin:auto;">
                            </td>
                            <td>
                                <div class="icons-acciones">
                                    <div class="mr-3">
                                        <a style="text-decoration: none; color: #000000;"
                                            href="{{ route('admin.graduates.edit', $item->person->id) }}">

                                            <button type="button" class="btn btn-sm btn-success fas fa-edit"
                                                style="width: 30px; height: 30px"></button>
                                        </a>
                                    </div>
                                    <div class="mr-3">
                                        <a style="text-decoration: none; color: #000000;"
                                            href="{{ route('admin.graduates.edit_password', $item->person->id) }}">

                                            <button type="button" class="btn btn-sm btn-warning fas fa-key"
                                                style="width: 30px; height: 30px"></button>
                                        </a>
                                    </div>

                                    <div class="mr-3">
                                       {{--  <a  class="btn btn-sm btn-danger fa fa-trash"
                                         style="width: 30px; height: 30px"
                                            href="#" onclick="document.getElementById('delete-graduate').submit()">
                                           
                                              </a>  --}}

                                              @include('admin.partials.button_delete')
                            
                                    </div>

                                    {{-- <form id="delete-graduate" method="POST" 
                                    action="{{ route('admin.graduates.destroy', $item->person->id) }}" >
                                        @csrf @method('DELETE')
                                    </form> --}}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12">No hay registros..</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

            {{-- <form action="" class="mt-5" > --}}


            {{-- </form> --}}

        </div>
        <!-- /.card-body -->


    </div>
    <!-- /.card -->
</div>
<!-- /.col -->