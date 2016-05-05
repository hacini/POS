<?php

$date2=$_POST['date2'];
$date1=$_POST['date1'];

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
${demo.css}
    </style>
        <script type="text/javascript">
$(function() {
   $(document).ready(function() {
      $.getJSON("TTC_pv_data.php",{ date1: '<?php echo $date1; ?>',date2: '<?php echo $date2; ?>'}, function(json) {
         chart = new Highcharts.Chart({
            chart: {
               renderTo: 'container',
               type: 'column'
            },
            title: {
               text: ''
            },
            xAxis: {
               categories: json[0]['data']
            },
            yAxis: {
               min: 0,
               title: {
                  text: ''
               },
               stackLabels: {
                  enabled: false,
                  style: {
                     fontWeight: 'bold',
                     color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                  }
               }
            },
            legend: {
               align: 'right',
               x: -30,
               verticalAlign: 'top',
               y: 25,
               floating: true,
               backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
               borderColor: '#CCC',
               borderWidth: 1,
               shadow: false
            },
            credits: {
               enabled: false
            },
            tooltip: {
               headerFormat: '<b>{point.key}</b><br>',
               pointFormat: '<span style="color:{series.color}">●</span> {series.name}: {point.y}'
            },
            plotOptions: {
               column: {
                  stacking: 'normal',
                  dataLabels: {
                     enabled: true,
                     color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                     style: {
                        textShadow: '0 0 3px black'
                     }
                  }
               }
            },
            series: [json[1], json[2], json[3], json[4]]
         });
      });
   });
});
        </script>
    </head>
    <body>

<h1>Montant TTC par point de vente  </h1>
<h2>Entre le <?php echo $date1;?> et <?php echo $date2;?></h2>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    </body>
</html>
