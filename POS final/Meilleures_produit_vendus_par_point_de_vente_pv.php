<?php



		$date2=$_POST['date2'];
		$date1=$_POST['date1'];
		$nbr_Produit=$_POST['nbr_Produit'];
		$nom_PV=$_POST['nom_PV'];
	

	
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
	                plotBorderWidth: null,
	                plotShadow: false
	            },
	            title: {
	                text: ''
	            },

	            credits: {
     				 enabled: false
  				},
	            tooltip: {
	                formatter: function() {
	                    return 'Quantité: '+'<b>'+ this.point.y +'</b>'+'('+ this.percentage.toFixed(2) +' %'+')';
	                }
	            },
	            legend:{
	            	enabled:true
	            },
	            plotOptions: {
	                pie: {
	                    allowPointSelect: true,
	                    cursor: 'pointer',
	                    dataLabels: {
	                        enabled: true,
	                        color: '#000000',
	                        connectorColor: '#000000',
	                       /* formatter: function() {
	                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
	                        }*/
	                    }
	                }
	            },
	            series: [{
	                type: 'pie',
	                name: 'Browser share',
	                data: []
	            }]
	        }
	        
	        $.getJSON("Meilleures_produit_vendus_par_point_de_vente_pv_data.php",{ date1: '<?php echo $date1; ?>',date2: '<?php echo $date2; ?>',nbr_Produit: '<?php echo $nbr_Produit; ?>',nom_PV: '<?php echo $nom_PV; ?>' }, function(json) {
				options.series[0].data = json;
	        	chart = new Highcharts.Chart(options);
	        });
	        
	        
	        
      	});   
		</script>
	
	</head>
	<body>
		<h1><?php echo (str_replace("_", " ", $nom_PV)); ?></h1>
		<h2>TOP <?php echo $nbr_Produit;?> des produits vendus  </h2>
		<h2>Entre le <?php echo $date1;?> et <?php echo $date1;?> </h2>
		<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
	</body>
</html>
