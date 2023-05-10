<div class="container-fluid">
    <form method="get">
        <div class="mt-3">
            <div class="row">
                <div class="col-lg-3">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <label class="input-group-text">Ordenar por:</label>
                        </div>
                        <select class="custom-select" name="order_by">
                            <option value="1" {{ isSelectedOption($params, 'order_by', '1') }}>A-Z</option>
                            <option value="2" {{ isSelectedOption($params, 'order_by', '2') }}>Z-A</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row justify-content-center">
                        <!--fecha ini -->
                        <div class="col-lg-6">
                            <div class="row">
                                <label class="col-sm-3 col-form-label">Desde:</label>
                                <div class="col-sm-8">
                                    <input name="created_at_from" onclick="desabilitar()" type="date"
                                        class="form-control" value="{{ getParamValue($params, 'created_at_from') }}">
                                </div>
                            </div>
                        </div>

                        <!--fecha fin -->
                        <div class="col-lg-6">
                            <div class="row mr-3">
                                <label class="col-sm-3 col-form-label">Hasta:</label>
                                <div class="col-sm-8">
                                    <input onclick="limitarFecha()" name="created_at_to" type="date"
                                        class="form-control" value="{{ getParamValue($params, 'created_at_to') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <label class="input-group-text">Cargo:</label>
                        </div>
                        <input type="text" name="nombre" class="form-control" placeholder="Buscar Graduad@"
                            value="{{ getParamValue($params, 'nombre') }}">
                    </div>
                </div>
            </div>
            @if($total != 0)
            <div class="btn-group">
                <button class="btn btn-danger btn-sm">Filtrar</button>
                @endif
                <a href="{{ route('admin.empleos.create') }}" class="btn btn-primary btn-sm ml-2">Registrar</a>
            </div>
            <hr>
          
            <h6 class="font-weight-bold">Total de Empleos: <a
                    class="btn btn-sm btn-danger">{{ $total }}</a></h6>
        </div>
    
</div>