<?php

if (isset($_POST['date1']) and isset($_POST['date2']))
{
		$date2=$_POST['date2'];
		$date1=$_POST['date1'];
	
}
	
		
		
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>
		<script type="text/javascript">	
		
$(function () {
    var chart;
	
    $(document).ready(function() {
        $.getJSON("tableau_de_bord_data.php", function(json) {
  
				    chart = new Highcharts.Chart({
	            chart: {
	                renderTo: 'container',
	                //type : 'line',
					//type : 'pie',
	                type : 'spline',
	                //type : 'scatter',
	                marginRight: 130,
	                marginBottom: 25
	            },
	            title: {
	                text: 'Revenue vs. Overhead',
	                x: -20 //center
	            },
	            credits: {
            	enabled: false
        		},
	            subtitle: {
	                text: '',
	                x: -20
	            },
	            xAxis: {
	                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
	            },
	            yAxis: {
	                title: {
	                    text: 'Amount'
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 1,
	                    color: '#808080'
	                }]
	            },
	            tooltip: {
	                formatter: function() {
	                        return '<b>'+ this.series.name +'</b><br/>'+
	                        this.x +': '+ this.y;
	                }
	            },
	            legend: {
	                layout: 'vertical',
	                align: 'right',
	                verticalAlign: 'top',
	                x: -10,
	                y: 100,
	                borderWidth: 0
	            },
	            series: json
	        });
	    });
    
    });
    
});
		</script>
	</head>
 <?php sleep(1);?>
	<body>
<h1><?php  echo $date1;?> et <?php  echo $date2;?> </h1> 
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
