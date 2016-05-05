<?php   
$date1=$_POST['date1'];


?>
		<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        $.getJSON("suivi_chiffre_affaires_data.php",{ date1: '<?php echo $date1; ?>'}, function(json) {
	    
		    chart = new Highcharts.Chart({
	            chart: {
	                renderTo: 'container',
	                //type : 'line',
	                type : 'spline',
	                //type : 'scatter',
	                marginRight: 130,
	                marginBottom: 25
	            },
	            title: {
	                text: 'Suivi du chiffre d\'affaires',
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
	                //categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec','Jan', 'Feb', 'Mar', 'Apr']
	                categories:json[0]
	            },
	            yAxis: {
	                title: {
	                    text: ''
	                },
	                plotLines: [{
	                    value: 0,
	                    width: 2,
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
	            //series: json
	            series: json[1]

	        });
	    });
    
    });
    
});
		</script>
	

<div id="container" class="col-xs-12"></div>

