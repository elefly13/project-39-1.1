@extends('admin.dashboard')

@section('dashboard')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chartisan example</title>
  </head>
  <body>
    <!-- Chart's container -->
    <div class="container-fluid big-box-sta" >
      <div class="row mx-2 justify-content-center ">
        <div class="col-sm-12 col-md-5 m-3 box-chart">
          <h3 class="text-h3-stat">Ordini ricevuti per anno</h3>
          <div id="chart" style="height: 300px;"></div>
        </div>
        <div class="col-sm-12 col-md-5 m-3 box-chart">
          <h3 class="text-h3-stat">Ordini ricevuti per mese</h3>
          <div id="chart2" style="height: 300px;"></div>
        </div>
      </div>
      <div class="row mx-2 justify-content-center">
        <div class="col-sm-12 col-md-5 m-3 box-chart">
          <h3 class="text-h3-stat">Ammontare vendite per anno</h3>
          <p class="text-p-stat">in euro</p>
          <div id="chart3" style="height: 300px;"></div>
        </div>  
        <div class="col-sm-12 col-md-5 m-3 box-chart">
          <h3 class="text-h3-stat">Ammontare vendite per mese</h3>
          <p class="text-p-stat">in euro</p>
          <div id="chart4" style="height: 300px;"></div>
        </div>
      </div>
    </div>


    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
      const chart = new Chartisan({

        el: '#chart',
        url: "@chart('sample_chart')",
        hooks: new ChartisanHooks()
        .colors(['#b5d8ba', '#f1c692']),
    
      });
     
    </script>
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <script>
      const chart1 = new Chartisan({
        el: '#chart2',
        url: "@chart('sample_chart2')",
        hooks: new ChartisanHooks()
        .colors(['#f1c692']),
      });
    </script>
    <script>
      const chart3 = new Chartisan({
        el: '#chart3',
        url: "@chart('sample_chart3')",
        hooks: new ChartisanHooks()
        .colors(['#be541e']),
      });
    </script>
    <script>
      const chart4 = new Chartisan({
        el: '#chart4',
        url: "@chart('sample_chart4')",
        hooks: new ChartisanHooks()
        .colors(['#439373']),
      });
    </script>
    {{-- {{$sum}} --}}
  </body>
</html>

@endsection