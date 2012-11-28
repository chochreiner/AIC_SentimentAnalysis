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
            series: <?php echo $data; ?>
        });
    });

    </script>
    <div id="highChartcontainer"></div>
