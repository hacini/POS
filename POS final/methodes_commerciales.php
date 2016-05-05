
<script type="text/javascript">
	$(function() {
	var quantite = [];
	var produit = [];
	var switch1 = true;
	$.get('methodes_commerciales_data.php', function(data) {

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

		$('#chart').highcharts({
			chart : {
				type : 'spline'
				//type : 'areaspline'
				//type : 'area'
				//type : 'pie'
				//type :'column'
				//type : 'line'
				
				
			},

			credits: {
            enabled: false
        	},

			title : {
				text : ' '
			},
			subtitle : {
				text : ''
			},
			xAxis : {
				title : {
					text : ''
				},
				categories : quantite
			},
			yAxis : {
				title : {
					text : ''
				},
				/*
				labels : {
					formatter : function() {
						return this.value 
					}
				}
				*/
			},
			tooltip : {
				crosshairs : true,
				shared : true,
				valueSuffix : ''
			},
			plotOptions : {
				spline : {
					marker : {
						radius : 4,
						lineColor : '#666666',
						lineWidth : 1
					}
				}
			},
			series : [{

				name : 'Nombre des clients',
				data : produit
			}]
		});
	});
}); 	
</script>
<div id="chart" style="height: 400px; margin: 0 auto"></div>
<style>
credits: {
      enabled: false
  }
</style>
