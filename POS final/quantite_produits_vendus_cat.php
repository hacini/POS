

   
    <style type="text/css">
${demo.css}
    </style>
    <script type="text/javascript">
$(function () {
    $(document).ready(function() {
        $.getJSON("quantite_produits_vendus_cat_data.php", function(json) {

    chart = new Highcharts.Chart({
        chart: {
          renderTo: 'container',
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
});
    </script>
  

<div id="container" style="min-width: 410px; max-width: 600px; height: 400px; margin: 0 auto"></div












