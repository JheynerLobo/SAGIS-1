@extends('admin.layouts.app')

@section('title', 'Agregar Contenidos')

@section('custom_css')
      <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
@endsection



@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Agregar contenidos informativos',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('admin.home'),
                'isActive' => null,
            ],
            [
                'name' => 'Contenidos',
                'route' => route('admin.students'),
                'isActive' => null,
            ],
            [
                'name' => 'Agregar',
                'route' => null,
                'isActive' => 'active'
            ]
        ],
    ])
@endsection


@section('content')

 <!-- Main content -->
 <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h3 class="card-title">
              Agregar contenidos
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <form action=""  method="POST" id="usrform">

                <div class="text-center mb-4 ">
                    <select class="form-select text-center" aria-label="Default select example" required>
                        <option selected>Seleccione un contenido</option>
                        <option value="1">Noticias</option>
                        <option value="2">Cursos</option>
                        <option value="3">Eventos</option>
                        <option value="4">Galeria</option>
                        <option value="5">Videos</option>
                      </select>


                </div>

                <div class="mb-3">
                    <label for="exampleInputTitle" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="exampleInputTitle" required>
                  </div>

              
                  <div class="mb-3">

                    <textarea id="summernote" form="usrform">
                       {{--  Escriba  <u>texto</u> <strong>aquí.</strong> --}}
                      </textarea>

                  </div>

                  <div class="mb-3 text-right">

                   {{--  <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Avisar por correos
                        </label>
                      </div> --}}
              
                    <button type="submit" class="btn btn-danger">Guardar contenido</button>

                  </div>

            </form>

          </div>
         
        </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- ./row -->
    
    <!-- ./row -->
  </section>

@endsection

@section('js')

<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>

@endsection


@section('custom_js')

<script>
    $(function () {
        $('#summernote').summernote({
        placeholder: 'Escriba texto aquí!',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
     /*      ['table', ['table']], */
          ['insert', ['link', 'picture', 'video']],
         /*  ['view', ['fullscreen', 'codeview', 'help']] */

         ['view', ['fullscreen', 'help']]
        ]
      });
    })
  </script>



@endsection