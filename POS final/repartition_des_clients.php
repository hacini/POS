<!DOCTYPE HTML>
<html>
    <head>
        
        <script type="text/javascript">
            $(document).ready(function() {
                var options = {
                    chart: {
                        renderTo: 'container',
                        plotBackgroundColor: null,
                        plotBorderWidth: 0,
                        plotShadow: false
                    },
                    title: {
                        text: 'Répartition des clients selon leurs sexe',
                    },
                    subtitle: {
                        text: ''
                    },
                    credits: {
                         enabled: false
                    },
                   tooltip: {
                        pointFormat: '<span style="font-size:1em; color: {point.color}; font-weight: bold">({point.y}) {point.percentage:.2f}%</span>',
                    },
                    plotOptions: {
                        pie: {
                            startAngle: 0,
                            endAngle: 360,
                            showInLegend: false
                        }
                    },
                    series: []
                };
                $.getJSON("repartition_des_clients_data.php", function(json) {
                    options.series = json;
                    chart = new Highcharts.Chart(options);
                });
            });
        </script>        
    </head>
    <body>
        <div id="container" class="col-xs-12"></div>

    </body>
</html>
