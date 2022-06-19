@extends('dev.admin.layouts.app')

@section('title', 'Estadisticas graduados')



@section('content-header')
    @include('dev.admin.partials.content-header', [
        'title' => 'Estadísticas y gráficas',
        'items' => [
            [
                'name' => 'Inicio',
                'route' => route('dev.home'),
                'isActive' => null,
            ],
            [
                'name' => 'Graduados',
                'route' => route('dev.students'),
                'isActive' => null,
            ],
            [
                'name' => 'Estadisticas',
                'route' => null,
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
                        <h3 class="card-title"><b>Estadisticas Generales</b> </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                         <!-- Small Box (Stat card) -->

        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>Contenidos Informativos</p>
              </div>
              <div class="icon">
                <i class="far fa-file"></i>
              </div>
            
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>15000</h3>

                <p>Graduados en el extranjero</p>
              </div>
              <div class="icon">
                <i class='fa fa-plane'></i>
              </div>
        
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Graduados registrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
      
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>$1.500.000</h3>
            
                <p>Salario mínimo</p>
              </div>
              <div class="icon">
                <i class="fas fa-money-bill"></i>
              </div>
         
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>1400</h3>

                <p>Graduados con potsgrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-university"></i>
              </div>
         
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>120</h3>

                <p>Graduados desempleados</p>
              </div>
              <div class="icon">
                <i class='fas fa-sad-cry'></i>
              </div>
        
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>7</h3>

                <p>Graduados verificados</p>
              </div>
              <div class="icon">
                <i class='fa fa-check-circle'></i>
              </div>
         
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>$30.500.000</h3>

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
                      <h3 class="card-title"><b>Gráfica de torta: Número de graduados por el pais donde trabaja</b> </h3>
                  </div>
  

                        <!-- PIE CHART -->
           
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
           
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
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
<script src="../../plugins/chart.js/Chart.min.js"></script>

@endsection


@section('custom_js')

  <script>

$(function () {
    


    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          'Colombia',
          'Estados Unidos',
          'Canada',
          'Argentina',
          'España',
          'Australia',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]


    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })



        //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = {

      labels  : ['2016', '2017', '2018', '2019', '2020', '2021', '2022'],
      datasets: [
        {
          label               : 'Graduados Año',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [100, 48, 10, 5, 80, 250, 25]
        }
      ]
      

    }

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })


  })

   

  </script>

@endsection