 <script type="text/javascript">
     var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            xAxis: {
                categories: ['Companies']
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.series.name +': '+ this.y +'';
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'John',
                data: [-5]
            }, {
                name: 'Jane',
                data: [2]
            }, {
                name: 'Joe',
                data: [-13]
            }]
        });
    });

    </script>
<div class="content_box">
    <legend>Results</legend>
   
    <div id="highChartcontainer"></div>
 </div>
