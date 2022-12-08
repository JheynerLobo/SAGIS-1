@extends('admin.layouts.app')

@section('title', 'Estadisticas graduados')



@section('content-header')
    @include('admin.partials.content-header', [
        'title' => 'Estadísticas y gráficas',
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
                'name' => 'Estadísticas',
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
                            <h3 class="card-title"><b>Estadisticas Generales</b> </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <!-- Small Box (Stat card) -->

                            <div class="row">
                                <div class="col-lg-4 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>{{ $posts }}</h3>

                                            <p>Contenidos Informativos</p>
                                        </div>
                                        <div class="icon">
                                            <i class="far fa-file"></i>
                                        </div>

                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>{{ $extraGraduates }}</h3>

                                            <p>Graduados en empresas Extranjeras</p>
                                        </div>
                                        <div class="icon">
                                            <i class='fa fa-plane'></i>
                                        </div>

                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3>{{ $graduates }}</h3>

                                            <p>Graduados registrados</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-user-plus"></i>
                                        </div>

                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-4 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3>${{ getFormatoNumber($salaryMin) }}</h3>

                                            <p>Salario mínimo</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-money-bill"></i>
                                        </div>

                                    </div>
                                </div>

                                <!-- ./col -->
                                <div class="col-lg-4 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>{{ $graduadoSinTrabajo }}</h3>

                                            <p>Graduados desempleados</p>
                                        </div>
                                        <div class="icon">
                                            <i class='fas fa-sad-cry'></i>
                                        </div>

                                    </div>
                                </div>

                                <!-- ./col -->
                                <div class="col-lg-4 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3>${{ getFormatoNumber($salaryMax) }}</h3>

                                            <p>Salario máximo</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-dollar-sign"></i>
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
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">



                    <div class="card">
                        <div class="card-header  border-info">
                            <h3 class="card-title"><b>Gráfica de torta: Número de graduados por el pais donde trabaja</b>
                            </h3>
                        </div>

                       {{--  {{ dd($graduatesByCountry->count()) }} --}}
                            @if($graduatesByCountry->count()==0)
                            <div class="card-body" >
                                <h1 id="pieP">No hay registros</h1>
                            </div>
                            @else

                              <!-- PIE CHART -->

                        <div class="card-body">
                            <h1 id="pieP"  style="display: none;">Pie</h1>
                            <div class="chart-container" style="position: relative; height:79vh; width:79vw">
                                <canvas id="pieChart" data-countries="{{ $countriesWorking }}"
                                    data-colors="{{ $arrayColors }}" data-total="{{ $graduatesByCountry }}"></canvas>
                            </div>


                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                            @endif
                      


                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">



                    <div class="card">
                        <div class="card-header  border-info">
                            <h3 class="card-title"><b>Gráfica de barras: Número de graduados por año</b> </h3>
                        </div>




                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart" data-years="{{ $years }}"
                                    data-total="{{ $graduatesByYearTotals }}"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>


                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


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
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

@endsection


@section('custom_js')

    <script>
        $(function() {

            let pie = document.getElementById('pieP');
    let valuePie = pie.innerHTML;

    console.log(valuePie);

    if(valuePie != "No hay registros"){
         //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var countries = $('#pieChart').data('countries');
            var colors = $('#pieChart').data('colors');

            var total = $('#pieChart').data('total');

            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = {
                labels: countries,
                datasets: [{
                    data: total,
                    backgroundColor: colors,
                }]


            }
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })


    }

           


            //-------------
            //- BAR CHART -
            //-------------

            var years = $('#barChart').data('years');
            var total = $('#barChart').data('total');
            // console.log(graduatesByYear[0]['total']);
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = {

                labels: years,
                datasets: [{
                    label: 'Graduados Año',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: total,
                }]


            }

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false,
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })


        })
    </script>

@endsection
