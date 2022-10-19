@extends('admin.layouts.app')

@section('title', 'Reportes graduados')



@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Reportes de Información de Graduados',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('home'),
                'isActive' => null,
            ],
            [
                'name' => 'Reportes',
                'route' => null,
                'isActive' => null,
            ],
            [
                'name' => 'Graduados',
                'route' => null,
                'isActive' => 'active',
            ],
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
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
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
                                            <th>Universidad</th> {{-- La universidad del pregrado inicial estudiado --}}
                                            {{-- <th>Estudios potsgrados</th> --}}
                                            <th>Nombre empresa</th>
                                            <th>Lugar empresa</th>
                                            <th>Salario</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($items as $index =>  $item)

                                            @php
                                              
                                              $person = $item->person;
                                                // Forma anterior sirve solo cuando el graduado tiene todos los datos
                                                $personAcademic = $person->personAcademic->first();

                                                $program = $personAcademic->program;

                                               // dd($program);
                                                $faculty = $program->faculty;
                                               // dd($faculty);
                                                $university = $faculty->university;
                                                //dd($university);

                                                 //$faculty = getParamObject($program->faculty, 'name')  ;
                                                 //dd($item);

                                                  /*   
                                                 if($index == count($items) - 1) {
                                                        // Este código se ejecutará para todos menos el último
                                                        $person = $item->person;
                                                    
                                                    $personAcademic = getParamObject($person, 'personAcademic')->first(); 
                                                    $program =  getParamObject($personAcademic, 'program');
   
   
                                                       dd($personAcademic);
                                                    }

                                           */
                                                  
                                                 //$university =  getParamObject($faculty, 'university'); 


                                           /*       $year_person_academic = getParamObject($person, 'personAcademic');
                                                 $name_program = getParamObject($personAcademic, 'program');
                                                 $name_faculty = getParamObjEct($personAcademic, 'program');
                                                 $name_university = getParamObject($personAcademic, 'program'); */

 
                                               
                                               
                                                 $personCompany = $person
                                                    ->personCompany()
                                                    ->where('in_working', true)
                                                    ->first();
                                                
                                                $salary = isset($personCompany) && $personCompany ? $personCompany->salary : 'N/N';
                                                
                                                $company_name = isset($personCompany) && $personCompany ? $personCompany->company->name : 'N/N';
                                                $company_address = isset($personCompany) && $personCompany ? $personCompany->company->address : 'N/N'; 
                                            @endphp
                                            
                                            <tr>



                                                <td>{{ $person->fullName() }}</td>
                                                <td>{{ $person->document }}</td>
                                                <td>{{ $person->email }}</td>
                                                <td>{{ $person->birthdate }}</td>
                                                <td>{{ $person->birthdatePlace->name }}</td>
                                                <td>{{ $person->phone }}</td>
                                                <td>{{ $person->telephone }}</td>
                                                <td>{{ $person->address }}</td>
                                                <td>{{ $item->email }}</td> 
                                                <td>{{ $personAcademic->year }}</td> 
                                                <td>{{ $program->name }}</td>
                                                <td>{{ $faculty->name }}</td>
                                                <td>{{ $university->name }}</td>
                                              {{--  <td>{{ $item->email }}</td> --}}
                                                <td>{{ $company_name }}</td>
                                                <td>{{ $company_address }}</td>
                                                <td>{{ $salary }} COP</td> 
                                           </tr> 
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

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
                "buttons":[ 
            {
                "extend":    'excelHtml5',
                "text":      '<i class="fas fa-file-excel"></i> ',
                "titleAttr": 'Exportar a Excel',
                "className": 'btn btn-success',
               "exportOptions": {
                    "columns": [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
                }
            },
            {
                "extend":    'pdfHtml5',
                "text":      '<i class="fas fa-file-pdf"></i> ',
                "titleAttr": 'Exportar a PDF',
                "orientation": 'landscape',//landscape give you more space
                "pageSize": 'A1',//A0 is the largest A5 smallest(A0,A1,A2,A3,legal,A4,A5,letter))
                "className": 'btn btn-danger',
                      "exportOptions": {
                    "columns": [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
                },
            },
            {
                "extend":    'copy',
                "text":      '<i class="fa fa-copy"></i> ',
                "titleAttr": 'Copiar',
                "className": 'btn btn-warning',
                "exportOptions": {
                    "columns": [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
                }
            },
            
        ]  ,
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
