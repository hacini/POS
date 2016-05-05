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
                $.getJSON("nombre_Categories_vendus_data.php",{date1:'<?php echo $date1; ?>',date2:'<?php echo $date2; ?>'}, function(json) {
                    options.series = json;
                    chart = new Highcharts.Chart(options);
                });

                $.getJSON("quantite_produits_vendus_cat_data.php", function(json) {

    chart = new Highcharts.Chart({
        chart: {
          renderTo: 'container2',
            //type: 'funnel',
            //type: 'pie',
            type: 'pyramid',
            //type: 'column',
            marginRight: 100
        },
        credits: {
          enabled: false
        },
        title: {
            text: 'Quantité des produits vendus par catégories',
            x: -45
        },
        tooltip: {
          formatter: function() {
            //return 'Montant: (<b>' + this.y + '</b>)' + '<b>, in series '+ this.series.name;
            return '<b>Quantité: '+this.y+'<br>';
          }
        },
        series: [{
            data:json
        }]
    });
});
            });
        </script>        
    </head>
    <body>

      

        <div id="container" class="col-md-6 col-sm-6 col-xs-12" ></div>
        <div id="container2" class="col-md-6 col-sm-6 col-xs-12" ></div>
    </body>
</html>
