 <script type="text/javascript">
        var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'highChartcontainer',
            type: 'bar'
         },
         title: {
            text: 'Fruit Consumption'
         },
         xAxis: {
            categories: ['Apples', 'Bananas', 'Oranges']
         },
         yAxis: {
            title: {
               text: 'Fruit eaten'
            }
         },
         series: [{
            name: 'Jane',
            data: [1, 0, 4]
         }, {
            name: 'John',
            data: [5, 7, 3]
         }]
      });
   });
    </script>
<div class="content_box">
    <legend>Results</legend>
   
    <div id="highChartcontainer"></div>
 </div>
