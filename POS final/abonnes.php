<script type="text/javascript">
            $(document).ready(function() {
                var options = {
                    chart: {
                        renderTo: 'container',
                        plotBackgroundColor: null,
                        plotBorderWidth: 0,
                        plotShadow: false
                    },
                    title: {
                        text: '',
                    },
                    credits: {
                         enabled: false
                    },
                   tooltip: {
                        pointFormat: '<span style="font-size:1em; color: {point.color}; font-weight: bold">({point.y}) {point.percentage:.2f}%</span>',
                    },
                    plotOptions: {
                        pie: {
                            startAngle: 0,
                            endAngle: 360,
                            showInLegend: false
                        }
                    },
                    series: []
                };
                $.getJSON("abonnes_data.php", function(json) {
                    options.series = json;
                    chart = new Highcharts.Chart(options);
                });
            });
        </script>  
<script type="text/javascript">
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
    });
</script>
<?php
$con = new mysqli('localhost', 'root', '', 'pos');

$rows1sql1 = array();
$rows2sql1 = array();
$rows3sql1 = array();
$rows4sql1 = array();
$rows5sql1 = array();

$rows1sql2 = array();
$rows2sql2 = array();
$rows3sql2 = array();
$rows4sql2 = array();
$rows5sql2 = array();

$rows1sql3 = array();
$rows2sql3 = array();
$rows3sql3 = array();
$rows4sql3 = array();
$rows5sql3 = array();

$rows1sql4 = array();
$rows2sql4 = array();
$rows3sql4 = array();
$rows4sql4 = array();
$rows5sql4 = array();

$rows1sql5 = array();
$rows2sql5 = array();
$rows3sql5 = array();
$rows4sql5 = array();
$rows5sql5 = array();

$rows1sql1['name'] = 'NOMCLIENT';
$rows2sql1['name'] = 'PRENOMCLIENT';
$rows3sql1['name'] = 'SEXECLIENT';
$rows4sql1['name'] = 'age';
$rows4sql1['name'] = 'abonnement';

$rows1sql2['name'] = 'NOMCLIENT';
$rows2sql2['name'] = 'PRENOMCLIENT';
$rows3sql2['name'] = 'SEXECLIENT';
$rows4sql2['name'] = 'age';
$rows4sql2['name'] = 'abonnement';

$rows1sql3['name'] = 'NOMCLIENT';
$rows2sql3['name'] = 'PRENOMCLIENT';
$rows3sql3['name'] = 'SEXECLIENT';
$rows4sql3['name'] = 'age';
$rows4sql3['name'] = 'abonnement';

$rows1sql4['name'] = 'NOMCLIENT';
$rows2sql4['name'] = 'PRENOMCLIENT';
$rows3sql4['name'] = 'SEXECLIENT';
$rows4sql4['name'] = 'age';
$rows4sql4['name'] = 'abonnement';

$rows1sql5['name'] = 'NOMCLIENT';
$rows2sql5['name'] = 'PRENOMCLIENT';
$rows3sql5['name'] = 'SEXECLIENT';
$rows4sql5['name'] = 'age';
$rows4sql5['name'] = 'abonnement';


$sql1="SELECT
  client.NOMCLIENT,
  client.PRENOMCLIENT,
  client.SEXECLIENT,
  TimestampDiff(year, client.DATENAISSANCECLIENT, Current_Date) As age,
  bronze.LIBELLECARTEABONNEMENT
From
  `client` Inner Join
  `carteabonnement`
    On client.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_ Inner Join
  `bronze`
    On bronze.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_
Group By
  client.NOMCLIENT, client.PRENOMCLIENT, client.SEXECLIENT, TimestampDiff(year,
  client.DATENAISSANCECLIENT, Current_Date), bronze.LIBELLECARTEABONNEMENT
Order By
  age Desc";

$sth1 = $con->query($sql1);

while($rsql1 = $sth1->fetch_assoc()){
    $rows1sql1['data'][] = $rsql1['NOMCLIENT'];
    $rows2sql1['data'][] = $rsql1['PRENOMCLIENT'];
    $rows3sql1['data'][] = $rsql1['SEXECLIENT'];
    $rows4sql1['data'][] = $rsql1['age'];
    $rows5sql1['data'][] = $rsql1['LIBELLECARTEABONNEMENT'];
}
$sql2="SELECT
  client.NOMCLIENT,
  client.PRENOMCLIENT,
  client.SEXECLIENT,
  TimestampDiff(year, client.DATENAISSANCECLIENT, Current_Date) As age,
  costum.LIBELLECARTEABONNEMENT
From
  `client` Inner Join
  `carteabonnement`
    On client.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_ Inner Join
  `costum`
    On costum.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_
Group By
  client.NOMCLIENT, client.PRENOMCLIENT, client.SEXECLIENT, TimestampDiff(year,
  client.DATENAISSANCECLIENT, Current_Date), costum.LIBELLECARTEABONNEMENT
Order By
  age Desc";

$sth2 = $con->query($sql2);

while($rsql2 = $sth2->fetch_assoc()){
    $rows1sql2['data'][] = $rsql2['NOMCLIENT'];
    $rows2sql2['data'][] = $rsql2['PRENOMCLIENT'];
    $rows3sql2['data'][] = $rsql2['SEXECLIENT'];
    $rows4sql2['data'][] = $rsql2['age'];
    $rows5sql2['data'][] = $rsql2['LIBELLECARTEABONNEMENT'];
}
$sql3="SELECT
  client.NOMCLIENT,
  client.PRENOMCLIENT,
  client.SEXECLIENT,
  TimestampDiff(year, client.DATENAISSANCECLIENT, Current_Date) As age,
  gold.LIBELLECARTEABONNEMENT
From
  `client` Inner Join
  `carteabonnement`
    On client.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_ Inner Join
  `gold`
    On gold.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_
Group By
  client.NOMCLIENT, client.PRENOMCLIENT, client.SEXECLIENT, TimestampDiff(year,
  client.DATENAISSANCECLIENT, Current_Date), gold.LIBELLECARTEABONNEMENT
Order By
  age Desc";

$sth3 = $con->query($sql3);

while($rsql3 = $sth3->fetch_assoc()){
    $rows1sql3['data'][] = $rsql3['NOMCLIENT'];
    $rows2sql3['data'][] = $rsql3['PRENOMCLIENT'];
    $rows3sql3['data'][] = $rsql3['SEXECLIENT'];
    $rows4sql3['data'][] = $rsql3['age'];
    $rows5sql3['data'][] = $rsql3['LIBELLECARTEABONNEMENT'];
}
$sql4="SELECT
  client.NOMCLIENT,
  client.PRENOMCLIENT,
  client.SEXECLIENT,
  TimestampDiff(year, client.DATENAISSANCECLIENT, Current_Date) As age,
  platinium.LIBELLECARTEABONNEMENT
From
  `client` Inner Join
  `carteabonnement`
    On client.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_ Inner Join
  `platinium`
    On platinium.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_
Group By
  client.NOMCLIENT, client.PRENOMCLIENT, client.SEXECLIENT, TimestampDiff(year,
  client.DATENAISSANCECLIENT, Current_Date), platinium.LIBELLECARTEABONNEMENT
Order By
  age Desc";

$sth4 = $con->query($sql4);

while($rsql4 = $sth4->fetch_assoc()){
    $rows1sql4['data'][] = $rsql4['NOMCLIENT'];
    $rows2sql4['data'][] = $rsql4['PRENOMCLIENT'];
    $rows3sql4['data'][] = $rsql4['SEXECLIENT'];
    $rows4sql4['data'][] = $rsql4['age'];
    $rows5sql4['data'][] = $rsql4['LIBELLECARTEABONNEMENT'];
}

$sql5="SELECT
  client.NOMCLIENT,
  client.PRENOMCLIENT,
  client.SEXECLIENT,
  TimestampDiff(year, client.DATENAISSANCECLIENT, Current_Date) As age,
  silver.LIBELLECARTEABONNEMENT
From
  `client` Inner Join
  `carteabonnement`
    On client.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_ Inner Join
  `silver`
    On silver.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_
Group By
  client.NOMCLIENT, client.PRENOMCLIENT, client.SEXECLIENT, TimestampDiff(year,
  client.DATENAISSANCECLIENT, Current_Date), silver.LIBELLECARTEABONNEMENT
Order By
  age Desc";

$sth5 = $con->query($sql5);

while($rsql5 = $sth5->fetch_assoc()){
    $rows1sql5['data'][] = $rsql5['NOMCLIENT'];
    $rows2sql5['data'][] = $rsql5['PRENOMCLIENT'];
    $rows3sql5['data'][] = $rsql5['SEXECLIENT'];
    $rows4sql5['data'][] = $rsql5['age'];
    $rows5sql5['data'][] = $rsql5['LIBELLECARTEABONNEMENT'];
}
?>
<div id="container" class="col-xs-12"></div>
<div class="col-xs-12">
<div class="x_panel">
                <div class="x_title">
                  <h2>     <small></small></h2>
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
                       <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Age</th>
                        <th>Abonnement</th>
                        
                      </tr>
                    </thead>
                    <tbody>
<?php


if(isset($rows1sql1['data'])){
for ($i=0; $i <sizeof($rows1sql1['data']) ; $i++) { 
  $val1= $rows1sql1['data'][$i];
  $val2= $rows2sql1['data'][$i];
  $val3= $rows3sql1['data'][$i];
  $val4= $rows4sql1['data'][$i];
  $val5= $rows5sql1['data'][$i];

   echo('<tr class="even pointer"><td class="a-center "><input type="checkbox" class="tableflat"></td>');
  echo('<td>'.$val1.'</td><td>'.$val2.'</td><td>'.$val3.'</td><td>'.$val4.'</td><td>'.$val5.'</td></tr>');
}}

if (isset($rows1sql2['data'])) {
for ($i=0; $i <sizeof($rows1sql2['data']) ; $i++) { 
  $val1= $rows1sql2['data'][$i];
  $val2= $rows2sql2['data'][$i];
  $val3= $rows3sql2['data'][$i];
  $val4= $rows4sql2['data'][$i];
  $val5= $rows5sql2['data'][$i];
   echo('<tr class="even pointer"><td class="a-center "><input type="checkbox" class="tableflat"></td>');
  echo('<td>'.$val1.'</td><td>'.$val2.'</td><td>'.$val3.'</td><td>'.$val4.'</td><td>'.$val5.'</td></tr>');
}}

if(isset($rows1sql3['data'])){
for ($i=0; $i <sizeof($rows1sql3['data']) ; $i++) { 
  $val1= $rows1sql3['data'][$i];
  $val2= $rows2sql3['data'][$i];
  $val3= $rows3sql3['data'][$i];
  $val4= $rows4sql3['data'][$i];
  $val5= $rows5sql3['data'][$i];


   echo('<tr class="even pointer"><td class="a-center "><input type="checkbox" class="tableflat"></td>');
  echo('<td>'.$val1.'</td><td>'.$val2.'</td><td>'.$val3.'</td><td>'.$val4.'</td><td>'.$val5.'</td></tr>');
}}


if(isset($rows1sql4['data'])){
for ($i=0; $i <sizeof($rows1sql4['data']) ; $i++) { 
  $val1= $rows1sql4['data'][$i];
  $val2= $rows2sql4['data'][$i];
  $val3= $rows3sql4['data'][$i];
  $val4= $rows4sql4['data'][$i];
  $val5= $rows5sql4['data'][$i];


   echo('<tr class="even pointer"><td class="a-center "><input type="checkbox" class="tableflat"></td>');
  echo('<td>'.$val1.'</td><td>'.$val2.'</td><td>'.$val3.'</td><td>'.$val4.'</td><td>'.$val5.'</td></tr>');
}}


if(isset($rows1sql5['data'])){
for ($i=0; $i <sizeof($rows1sql5['data']) ; $i++) { 
  $val1= $rows1sql5['data'][$i];
  $val2= $rows2sql5['data'][$i];
  $val3= $rows3sql5['data'][$i];
  $val4= $rows4sql5['data'][$i];
  $val5= $rows5sql5['data'][$i];

   echo('<tr class="even pointer"><td class="a-center "><input type="checkbox" class="tableflat"></td>');
  echo('<td>'.$val1.'</td><td>'.$val2.'</td><td>'.$val3.'</td><td>'.$val4.'</td><td>'.$val5.'</td></tr>');
}}

?>
</tbody>
</table>
</div>
</div>
</div>

