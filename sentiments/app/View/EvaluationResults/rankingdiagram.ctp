 <script type="text/javascript">
     var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: <?php echo $title; ?>
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
<div class="content_box">
    <legend>Results</legend>
   
    <div id="highChartcontainer"></div>
 </div>
