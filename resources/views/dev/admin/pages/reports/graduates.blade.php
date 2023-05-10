@extends('admin.layouts.app')

@section('title', 'Reportes graduados')



@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Reportes de información de graduados',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('admin.home'),
                'isActive' => null,
            ],
            [
                'name' => 'Reportes',
                'route' => null,
                'isActive' => null,
            ],
            [
                'name' => 'Graduados',
                'route' => route('admin.reports.graduates'),
                'isActive' => 'active'
            ]
        ],
    ])
@endsection


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header  border-info">
                            <h3 class="card-title"><b>Reporte de graduados</b> </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="row">


                              
                            <div class="col-md-8 mb-4">

                                <div class="row">
                                    <!--fecha ini -->
                                    <div class="col-md-5">
                                        <div class="row ">
                                            <label class="col-sm-3 col-form-label">Desde:</label>
                                            <div class="col-sm-8">
                                                <input id="inicial" name="inicial"  type="date"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                
                                    <!--fecha fin -->
                                    <div class="col-md-5">
                                        <div class="row mr-3">
                                            <label class="col-sm-3 col-form-label">Hasta:</label>
                                            <div class="col-sm-8">
                                                <input name="final" id="final" type="date"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                
                                    <!--fecha boton -->
                                    <div class="col-md-2 ">
                                        <button type="submit" class="btn btn-danger  " >
                                         Filtrar
                                    </div>
                                </div>
                            </div>


                            </div>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nombre</th>
                                        <th>Cedula</th>
                                        <th>Correo personal</th>
                                        <th>Fecha nacimiento</th>
                                        <th>Lugar nacimiento</th>
                                        <th>Celular</th>
                                        <th>Dirección</th>
                                        <th>Código</th>
                                        <th>Correo institucional</th>
                                        <th>Año grado pregado</th>
                                        <th>Programa</th> {{-- El programa del pregrado inicial estudiado --}}
                                        <th>Facultad</th> {{-- La facultad del pregrado inicial estudiado --}}
                                        <th>Universidad</th>  {{-- La universidad del pregrado inicial estudiado --}}
                                        <th>Estudios potsgrados</th>
                                        <th>Nombre empresa</th>
                                        <th>Lugar empresa</th>
                                        <th>Salario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Jarlin Andres Fonseca Bermón</td>
                                        <td>100687978</td>
                                        <td>jarlin@gmail.com</td>
                                        <td>14/11/2000</td>
                                        <td>Cúcuta-Colombia</td>
                                        <td>3254554541</td>
                                        <td>Conjunto Casa Real</td>
                                        <td>1151780</td>
                                        <td>jarlinandresfb@ufps.edu.co</td>
                                        <td>2020</td>
                                        <td>Ingenieria de Sistemas</td>
                                        <td>Ingenieria</td>
                                        <td>Francisco de Paula Santander - UFPS</td>
                                        <td>NO</td>
                                        <td>Microsoft</td>
                                        <td>EE.UU-New York</td>
                                        <td>$15.000.000</td>
                            

                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Jarlin Andres Fonseca Bermón</td>
                                        <td>100687978</td>
                                        <td>jarlin@gmail.com</td>
                                        <td>14/11/2000</td>
                                        <td>Cúcuta-Colombia</td>
                                        <td>3238123367</td>
                                        <td>Conjunto Casa Real</td>
                                        <td>1151755</td>
                                        <td>jarlinandresfb@ufps.edu.co</td>
                                        <td>2018</td>
                                        <td>Ingenieria de Sistemas</td>
                                        <td>Ingenieria</td>
                                        <td>Francisco de Paula Santander - UFPS</td>
                                        <td>NO</td>
                                        <td>Microsoft</td>
                                        <td>EE.UU-New York</td>
                                        <td>$15.000.000</td>
                            

                                    </tr>

                                    <tr>
                                        <td>20</td>
                                        <td>Jarlin Andres Fonseca Bermón</td>
                                        <td>100687978</td>
                                        <td>jarlin@gmail.com</td>
                                        <td>14/11/2000</td>
                                        <td>Cúcuta-Colombia</td>
                                        <td>3238123367</td>
                                        <td>Conjunto Casa Real</td>
                                        <td>1151758</td>
                                        <td>jarlinandresfb@ufps.edu.co</td>
                                        <td>2017</td>
                                        <td>Ingenieria de Sistemas</td>
                                        <td>Ingenieria</td>
                                        <td>Francisco de Paula Santander - UFPS</td>
                                        <td>NO</td>
                                        <td>Microsoft</td>
                                        <td>EE.UU-New York</td>
                                        <td>$15.000.000</td>
                            

                                    </tr>
                                     
                                </tbody>

                            </table>

    

                        </div>
                        <!-- /.card-body -->


                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>


@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
@endsection

@section('custom_js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf"],
                "language": {

                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "infoThousands": ",",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad",
                        "collection": "Colección",
                        "colvisRestore": "Restaurar visibilidad",
                        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                        "copySuccess": {
                            "1": "Copiada 1 fila al portapapeles",
                            "_": "Copiadas %ds fila al portapapeles"
                        },
                        "copyTitle": "Copiar al portapapeles",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todas las filas",
                            "_": "Mostrar %d filas"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir",
                        "renameState": "Cambiar nombre",
                        "updateState": "Actualizar",
                        "createState": "Crear Estado",
                        "removeAllStates": "Remover Estados",
                        "removeState": "Remover",
                        "savedStates": "Estados Guardados",
                        "stateRestore": "Estado %d"
                    },
                    "autoFill": {
                        "cancel": "Cancelar",
                        "fill": "Rellene todas las celdas con <i>%d<\/i>",
                        "fillHorizontal": "Rellenar celdas horizontalmente",
                        "fillVertical": "Rellenar celdas verticalmentemente"
                    },
                    "decimal": ",",
                    "searchBuilder": {
                        "add": "Añadir condición",
                        "button": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "clearAll": "Borrar todo",
                        "condition": "Condición",
                        "conditions": {
                            "date": {
                                "after": "Despues",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vacío",
                                "equals": "Igual a",
                                "notBetween": "No entre",
                                "notEmpty": "No Vacio",
                                "not": "Diferente de"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vacio",
                                "equals": "Igual a",
                                "gt": "Mayor a",
                                "gte": "Mayor o igual a",
                                "lt": "Menor que",
                                "lte": "Menor o igual que",
                                "notBetween": "No entre",
                                "notEmpty": "No vacío",
                                "not": "Diferente de"
                            },
                            "string": {
                                "contains": "Contiene",
                                "empty": "Vacío",
                                "endsWith": "Termina en",
                                "equals": "Igual a",
                                "notEmpty": "No Vacio",
                                "startsWith": "Empieza con",
                                "not": "Diferente de",
                                "notContains": "No Contiene",
                                "notStarts": "No empieza con",
                                "notEnds": "No termina con"
                            },
                            "array": {
                                "not": "Diferente de",
                                "equals": "Igual",
                                "empty": "Vacío",
                                "contains": "Contiene",
                                "notEmpty": "No Vacío",
                                "without": "Sin"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Eliminar regla de filtrado",
                        "leftTitle": "Criterios anulados",
                        "logicAnd": "Y",
                        "logicOr": "O",
                        "rightTitle": "Criterios de sangría",
                        "title": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Borrar todo",
                        "collapse": {
                            "0": "Paneles de búsqueda",
                            "_": "Paneles de búsqueda (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Sin paneles de búsqueda",
                        "loadMessage": "Cargando paneles de búsqueda",
                        "title": "Filtros Activos - %d",
                        "showMessage": "Mostrar Todo",
                        "collapseMessage": "Colapsar Todo"
                    },
                    "select": {
                        "cells": {
                            "1": "1 celda seleccionada",
                            "_": "%d celdas seleccionadas"
                        },
                        "columns": {
                            "1": "1 columna seleccionada",
                            "_": "%d columnas seleccionadas"
                        },
                        "rows": {
                            "1": "1 fila seleccionada",
                            "_": "%d filas seleccionadas"
                        }
                    },
                    "thousands": ".",
                    "datetime": {
                        "previous": "Anterior",
                        "next": "Proximo",
                        "hours": "Horas",
                        "minutes": "Minutos",
                        "seconds": "Segundos",
                        "unknown": "-",
                        "amPm": [
                            "AM",
                            "PM"
                        ],
                        "months": {
                            "0": "Enero",
                            "1": "Febrero",
                            "10": "Noviembre",
                            "11": "Diciembre",
                            "2": "Marzo",
                            "3": "Abril",
                            "4": "Mayo",
                            "5": "Junio",
                            "6": "Julio",
                            "7": "Agosto",
                            "8": "Septiembre",
                            "9": "Octubre"
                        },
                        "weekdays": [
                            "Dom",
                            "Lun",
                            "Mar",
                            "Mie",
                            "Jue",
                            "Vie",
                            "Sab"
                        ]
                    },
                    "editor": {
                        "close": "Cerrar",
                        "create": {
                            "button": "Nuevo",
                            "title": "Crear Nuevo Registro",
                            "submit": "Crear"
                        },
                        "edit": {
                            "button": "Editar",
                            "title": "Editar Registro",
                            "submit": "Actualizar"
                        },
                        "remove": {
                            "button": "Eliminar",
                            "title": "Eliminar Registro",
                            "submit": "Eliminar",
                            "confirm": {
                                "_": "¿Está seguro que desea eliminar %d filas?",
                                "1": "¿Está seguro que desea eliminar 1 fila?"
                            }
                        },
                        "error": {
                            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                        },
                        "multi": {
                            "title": "Múltiples Valores",
                            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                            "restore": "Deshacer Cambios",
                            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                        }
                    },
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "stateRestore": {
                        "creationModal": {
                            "button": "Crear",
                            "name": "Nombre:",
                            "order": "Clasificación",
                            "paging": "Paginación",
                            "search": "Busqueda",
                            "select": "Seleccionar",
                            "columns": {
                                "search": "Búsqueda de Columna",
                                "visible": "Visibilidad de Columna"
                            },
                            "title": "Crear Nuevo Estado",
                            "toggleLabel": "Incluir:"
                        },
                        "emptyError": "El nombre no puede estar vacio",
                        "removeConfirm": "¿Seguro que quiere eliminar este %s?",
                        "removeError": "Error al eliminar el registro",
                        "removeJoiner": "y",
                        "removeSubmit": "Eliminar",
                        "renameButton": "Cambiar Nombre",
                        "renameLabel": "Nuevo nombre para %s",
                        "duplicateError": "Ya existe un Estado con este nombre.",
                        "emptyStates": "No hay Estados guardados",
                        "removeTitle": "Remover Estado",
                        "renameTitle": "Cambiar Nombre Estado"
                    }
                }
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });


        });
    </script>
@endsection



