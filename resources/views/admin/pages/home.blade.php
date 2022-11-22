@extends('admin.layouts.app')


@section('title', 'Dashboard')

@section('css')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

@endsection

@section('content-header')
@include('admin.partials.content-header', [
'title' => 'Dashboard',
'items' => [],
])
@endsection

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        {{-- <h4>Funcionalidad Prevista para Software, Dashboard con diferentes tarjetas de información..</h4> --}}

        <div class="row">
            <div class="col-12">



                <div class="card">
                    <div class="card-header  border-info">
                        <h3 class="card-title"><strong>Estadisticas Generales</strong> </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <!-- Small Box (Stat card) -->

                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>{{ $posts }}</h3>

                                        <p>Contenidos Informativos</p>
                                    </div>
                                    <div class="icon">
                                        <em class="far fa-file"></em>
                                    </div>

                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $graduadosColombia }}</h3>

                                        <p>Graduados en empresas Colombia</p>
                                    </div>
                                    <div class="icon">
                                        <em class='fa fa-globe'></em>
                                    </div>

                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{$graduates}}</h3>

                                        <p>Graduados registrados</p>
                                    </div>
                                    <div class="icon">
                                        <em class="fas fa-user-plus"></em>
                                    </div>

                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ $postNotices }}</h3>

                                        <p>Noticias</p>
                                    </div>
                                    <div class="icon">
                                        <em class="fas fa-newspaper"></em>
                                    </div>

                                </div>
                            </div>

                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $graduadosVerificados}}</h3>

                                        <p>Graduados Verificados</p>
                                    </div>
                                    <div class="icon">
                                        <em class='fa fa-check-circle'></em>
                                    </div>

                                </div>
                            </div>

                            <!-- ./col -->
                            <div class="col-lg-4 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $graduadosConPosts}}</h3>

                                        <p>Graduados con estudios potsgrados</p>
                                    </div>
                                    <div class="icon">
                                        <em class="fa fa-address-book"></em>
                                    </div>

                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>
                    <!-- /.card-body -->


                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
    <!-- /.container-fluid -->
</section>



<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header  border-info">
                <h3 class="card-title"><strong> <em class="far fa-calendar-alt"></em>
                        Calendario</strong> </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <!-- Calendar -->
                <div class="card bg-gradient-info">
                    <div class="card-header border-0">

                        <h3 class="card-title">
                        </h3>

                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-0">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"></div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card-body -->
        </div>
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

{{-- <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
--}}
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

<!-- daterangepicker -->
<script src=" {{ asset('plugins/moment/moment.min.js') }} "></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}  "></script>


<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
@endsection


@section('custom_js')

<script>
    // The Calender
  $('#calendar').datetimepicker({
    format: 'L',
    inline: true
  })
</script>


@endsection