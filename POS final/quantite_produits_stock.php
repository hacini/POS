


<script type="text/javascript" >
$(function () {
    var chart;
    $(document).ready(function() {
    	  $('input.tableflat').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
      });
    });
    var asInitVals = new Array();
    $(document).ready(function() {
      var oTable = $('#example').dataTable({
        "language": {
        "sProcessing":    "traitement...",
        "sLengthMenu":    "Afficher _MENU_ lignes",
        "sZeroRecords":   "Aucun résultat",
        "sEmptyTable":    "Aucune donnée disponible",
        "sInfo":          "Affichage de _START_ à  _END_ de _TOTAL_ entrées",
        "sInfoEmpty":     "Affichage Documents 0-0 sur un total de 0 records",
        
        "sInfoPostFix":   "",
        "sSearch":        "Chercher: ",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Chargement...",
        "oPaginate": {
            "sFirst":    "début",
            "sLast":    "Fin",
            "sNext":    "suivante",
            "sPrevious": "précédent"
        },
        
        
        
    },
        "aoColumnDefs": [{
            'bSortable': false,
            'aTargets': [0]
          } //disables sorting for column one
        ],
        'iDisplayLength': 12,
        "sPaginationType": "full_numbers",
        "dom": 'T<"clear">lfrtip',
        "tableTools": {
          "sSwfPath": "js/datatables/tools/swf/copy_csv_xls_pdf.swf"
        }
      });
      $("tfoot input").keyup(function() {
        /* Filter on the column based on the index of this element's parent <th> */
        oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
      });
      $("tfoot input").each(function(i) {
        asInitVals[i] = this.value;
      });
      $("tfoot input").focus(function() {
        if (this.className == "search_init") {
          this.className = "";
          this.value = "";
        }
      });
      $("tfoot input").blur(function(i) {
        if (this.value == "") {
          this.className = "search_init";
          this.value = asInitVals[$("tfoot input").index(this)];
        }
      });
        $.getJSON("quantite_produits_stock_data1.php", function(json) {
	    
		    chart = new Highcharts.Chart({
	            chart: {
	                renderTo: 'container',
	                //type : 'line',
	                //type : 'spline',
	                //type : 'scatter',
	                type :'column',

	                marginRight: 130,
	                marginBottom: 25
	            },
	            title: {
	                text: 'Par quantité produits',
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
	                
	                categories: json[2]
	            },
	            yAxis: {
	                title: {
	                    text: 'Quantité'
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
	            series: [json[0],json[1]]
	        });
	    });
    
    });
    
});
	$(function() {
	//Highcharts with mySQL and PHP - Ajax101.com

	var quantite = [];
	var produit = [];
	var switch1 = true;
	$.get('quantite_produits_stock_data.php', function(data) {

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
				//type : 'spline'
				//type : 'areaspline'
				//type : 'area'
				//type : 'pie'
				type :'column'
				//type : 'line'
				
				
			},

			credits: {
            enabled: false
        	},

			title : {
				text : 'Par catégories '
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

				name : 'Quantit\351 produit/stock',
				data : produit
			}]
		});
	});
}); 

</script>
<?php  
$con = new mysqli('localhost', 'root', '', 'pos');

$rows1 = array();
$rows2 = array();
$rows3 = array();
$rows4 = array();
$rows5 = array();

$rows1['name'] = 'DESIGNATION';
$rows2['name'] = 'SEUILMINIMUMPRODUIT';
$rows3['name'] = 'DATEEXPIRATION';
$rows4['name'] = 'QUANTITEPS';
$rows5['name'] = 'QUANTITEDISTRIBUER';

$sql0 ="SELECT
  produit.DESIGNATION,
  produit.SEUILMINIMUMPRODUIT,
  produit.DATEEXPIRATION,
  produit.QUANTITEPS,
  Sum(stock.QUANTITEDISTRIBUER) as somme
From
  `pointvente` Inner Join
  `stock`
    On stock.IDPOINTVENTE = pointvente.IDPOINTVENTE Inner Join
  `produit`
    On stock.IDPRODUIT = produit.IDPRODUIT
Group By
  produit.DESIGNATION";

$sth0 = $con->query($sql0);
while($rsql0 = $sth0->fetch_assoc()){
    $rows1['data'][] = $rsql0['DESIGNATION'];
    $rows2['data'][] = $rsql0['SEUILMINIMUMPRODUIT'];
    $rows3['data'][] = $rsql0['DATEEXPIRATION'];
    $rows4['data'][] = $rsql0['QUANTITEPS'];
    $rows5['data'][] = $rsql0['somme'];

  }
?>



<div id="chart" class="col-xs-12"></div>
<div id="container" class="col-xs-12"></div>
<style>
credits: {
      enabled: false
  }
</style>
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Chiffre d'affaires détaillé<small>Par point de vente </small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" class="tableflat">
                        </th>
                       <th>Désignation</th>
                        <th>Seuil produit</th>
                        <th>Date d'expiration</th>
                        <th>Quantité distribuer</th>
                        <th>reste</th>

                         
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php
             for ($i=0; $i <sizeof($rows1['data']) ; $i++) { 
  $val1= $rows1['data'][$i];
  $val2= (int)$rows2['data'][$i];
  $val3= $rows3['data'][$i];
  $val4= (int)$rows4['data'][$i];
  $val5= (int)$rows5['data'][$i];
  $val6= $val4-$val5;


 if(($val6/$val2) >= 1.5) {$class='bg-success';}
 elseif(($val6/$val2) > 1 and ($val6/$val2) < 1.5) {$class='bg-warning';}
 elseif(($val6/$val2) <= 1) {$class='bg-danger';}


  echo('<tr class="even pointer">');
  echo ('<td class="a-center "><input type="checkbox" class="tableflat"></td>');
  echo('<td>'.$val1.'</td>');
  echo('<td>'.$val2.'</td>');
  echo('<td>'.$val3.'</td>');
  echo('<td>'.$val5.'</td>');
  echo('<td class="'.$class.'">'.$val6.'</td>');
  echo('</tr>');

  
}


                    ?>
                    </tbody>
                    </table>
                    </div>
                    </div>
                    </div>

