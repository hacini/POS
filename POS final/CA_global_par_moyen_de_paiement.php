<?php
$date1=$_POST['date1'];
$date2=$_POST['date2'];
?>


    <style type="text/css">
${demo.css}
    </style>
    <script type="text/javascript">
$(function () {
    $(document).ready(function() {
        $.getJSON("CA_global_par_moyen_de_paiement_data.php",{date1:'<?php echo $date1; ?>',date2:'<?php echo $date2 ?>'}, function(json) {

    chart = new Highcharts.Chart({
        chart: {
          renderTo: 'container',
            type: 'funnel',
            //type: 'pie',
            //type: 'pyramid',
            //type: 'column',
            marginRight: 100
        },
        credits: {
               enabled: false
            },
        title: {
            text: 'Chiffre d’affaires global / Moyen de paiement',
            x: -45
        },
        tooltip: {
          formatter: function() {
            //return 'Montant: (<b>' + this.y + '</b>)' + '<b>, in series '+ this.series.name;
            return '<b>Montant: '+this.y+'<br><b>Percentage: </br></b><b>'+this.percentage.toFixed(2)+'</b>';
          }
        },
        series: [{
            data:json
        }]
    });
});
});  
});
    </script>
  </head>
  <body>




<div id="container" class="col-xs-12"></div>

  </body>
</html>