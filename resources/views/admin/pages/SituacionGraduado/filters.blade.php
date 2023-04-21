<div class="container-fluid">
    <form method="get">
        <div class="mt-3">
            <div class="row">
                <div class="col-lg-3">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <label class="input-group-text">Ordenar por:</label>
                        </div>
                       
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
                                        class="form-control" >
                                </div>
                            </div>
                        </div>

                        <!--fecha fin -->
                        <div class="col-lg-6">
                            <div class="row mr-3">
                                <label class="col-sm-3 col-form-label">Hasta:</label>
                                <div class="col-sm-8">
                                    <input onclick="limitarFecha()" name="created_at_to" type="date"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <label class="input-group-text">Graduad@:</label>
                        </div>
                        <input type="text" name="nombre" class="form-control" placeholder="Buscar Graduad@"
                            >
                    </div>
                </div>
            </div>
            <div class="btn-group">
                <button class="btn btn-danger btn-sm">Filtrar</button>
             
                <a href="{{route('admin.situacionGraduados.create')}}" class="btn btn-primary btn-sm ml-2">Registrar</a>
            </div>
            <hr>
          
           
        </div>
    
</div>