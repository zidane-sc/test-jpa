@extends('layouts.app')

@section('title', 'trending')

@section('page-title', ' Trending')

@section('page', 'Trending')

@section('content')
<div class="col-md-12">
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Current: {{ $trendings[0]->device->name }}</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body">
      <div class="chart">
        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<script>
  $(function () {
      //-------------
      //- LINE CHART -
      //--------------
      var areaChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        legend: {
          display: true
        },
        scales: {
          xAxes: [{
            gridLines : {
              display : true,
            }
          }],
          yAxes: [{
            gridLines : {
              display : true,
            }
          }]
        }
      }
      var areaChartData = {
        labels  : @json($date),
        datasets: [
          {
            label               : 'Value 1',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : true,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : @json($values_1)
          },
          {
            label               : 'Value 2',
            backgroundColor     : 'rgba(210, 214, 222, 1)',
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : true,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : @json($values_2)
          },
        ]
      }
      var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
      var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
      var lineChartData = jQuery.extend(true, {}, areaChartData)
      lineChartData.datasets[0].fill = false;
      lineChartData.datasets[1].fill = false;
      lineChartOptions.datasetFill = false
  
      var lineChart = new Chart(lineChartCanvas, { 
        type: 'line',
        data: lineChartData, 
        options: lineChartOptions
      })
  
    })
</script>
@endsection