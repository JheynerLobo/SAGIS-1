<table id="example1" class="table table-bordered table-striped" style="text-align:center">
@foreach ($datos as $dato)
                    <h3 style="color:#f00; text-align:center">Año de Graduación: {{ $dato->anio_graduation }}</h3>
                    <thead>
                        <tr>
                            <th>Año Registro</th>
                            <th>Graduados Independientes</th>
                            <th>Graduados Dependientes</th>
                            <th>Graduados Desempleados</th>
                            <th>Trabajando Ese Año</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    
            <tr>
                <td style="white-space: pre-wrap;">{{ $dato->anio_actual }}</td>
                <td>{{ $dato->independientes }}</td>
                <td>{{ $dato->dependientes }}</td>
                <td>{{ $dato->desempleados }}</td>
                <td>{{ $dato->trabajando }} %</td>
                <td>
                    <div class="btn-group">
                        <div class="mr-3 ml-1">
                            <a href="" method="POST" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        </div>
                        <div class="mr-1">
                        <form action="" method="POST">
                        @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><em
                                            class="fas fa-trash"></em></button>
</form>                         
                        </div>
                        <br>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>