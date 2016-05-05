<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      
        <script type="text/javascript">
            $(document).ready(function() {
                var options = {
                    chart: {
                        renderTo: 'container',
                        plotBackgroundColor: null,
                        plotBorderWidth: 0,
                        plotShadow: false,
                    },
                    title: {
                        text: ' Nombre de ventes / produit',
                    },
                    credits: {
                         enabled: false
                    },
                   tooltip: {
                        pointFormat: '<span style="font-size:1em; color: {point.color}; font-weight: bold">({point.y}) {point.percentage:.2f}%</span>',
                    },
                    plotOptions: {
                        pie: {
                            startAngle: -90,
                            endAngle: 90,
                            showInLegend: false
                        }
                    },
                    series: []
                };
                $.getJSON("nombre_de_ventes_data.php", function(json) {
                    options.series = json;
                    chart = new Highcharts.Chart(options);
                });
            });
        </script>        
    </head>
    <body>
        <div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
    </body>
</html>
