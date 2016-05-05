
<?php



		$date2=$_POST['date2'];
		$date1=$_POST['date1'];
	

	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" charset="utf-8">
    var quantite =[];
    var produit =[];
    var switch1 =true;
     
    $.get('Meilleures_ventes_produits_data.php', { date1: '<?php echo $date1; ?>',date2: '<?php echo $date2; ?>' }, function(data) {

        data = data.split('/');
        for (var i in data) {
            if (switch1 == true) {
                quantite.push(data[i]);
                switch1 = false;
            } else {
                produit.push(parseFloat(data[i]));
                switch1 = true;
            }

        }
        quantite.pop();


        chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'chart',
                //type : 'spline'
                //type : 'areaspline'
                //type : 'area'
                //type : 'pie'
                type: 'column'

            },

            credits: {
                enabled: false
            },

            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                title: {
                    text: ''
                },
                categories: quantite
            },
            yAxis: {
                title: {
                    text: ''
                },
                /*
                labels : {
                	formatter : function() {
                		return this.value 
                	}
                }
                */
            },
            tooltip: {
                crosshairs: true,
                shared: true,
                valueSuffix: ''
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{

                name: 'Quantit\351',
                data: produit
            }]
        });
    });

</script>
</head>
<?php sleep(1);?>
<body>
    <h1>Meilleurs produits vendus</h1><h2><?php  echo $date1;?> et <?php  echo $date2;?> </h2>
  
<div id="chart" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<style>
credits: {
      enabled: false
  }
</style>
</body>
</html>