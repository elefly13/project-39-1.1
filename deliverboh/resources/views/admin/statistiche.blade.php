<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chartisan example</title>
  </head>
  <body>
    <!-- Chart's container -->
    <div id="chart" style="height: 300px;"></div>
    <div id="chart2" style="height: 300px;"></div>
    <div id="chart3" style="height: 300px;"></div>
    <div id="chart4" style="height: 300px;"></div>
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
    .colors(['#ECC94B', '#4299E1']),
    
      });
     
    </script>
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <script>
      const chart1 = new Chartisan({
        el: '#chart2',
        url: "@chart('sample_chart2')",
      });
    </script>
    <script>
      const chart3 = new Chartisan({
        el: '#chart3',
        url: "@chart('sample_chart3')",
      });
    </script>
    <script>
      const chart4 = new Chartisan({
        el: '#chart4',
        url: "@chart('sample_chart4')",
      });
    </script>
    {{$sum}}
  </body>
</html>