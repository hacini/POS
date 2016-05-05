<?php
$date1=$_POST['date1'];
$date2=$_POST['date2'];

?>
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
                        plotShadow: false
                    },
                    title: {
                        text: 'Produit vendu / date',
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
                $.getJSON("nombre_produits_vendus_data.php",{date1:'<?php echo $date1; ?>',date2:'<?php echo $date2; ?>'}, function(json) {
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
