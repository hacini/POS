<script>
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
<div id="container" class="col-xs-12"></div>
<?php
          $date1=(string)$_POST['date1'];
          $date2=(string)$_POST['date2'];
$con = new mysqli('localhost', 'root', '', 'pos');

$rows0 = array();
$rows1 = array();
$rows2 = array();
$rows3 = array();
$rows4 = array();

$result_nbr0 = array();
$result_nbr1 = array();
$result_nbr2 = array();
$result_nbr3 = array();
$result_nbr4 = array();

$rows1['name'] = 'Carte_credit';
$rows2['name'] = 'Cadeau';
$rows3['name'] = 'Cheque';
$rows4['name'] = 'Espece';

$sql0 ="SELECT
  pointvente.NOMPOINTVENTE
From
  `pointvente`
Limit 10";

$sth0 = $con->query($sql0);

$z=0;
$nompv;
while($rsql0 = $sth0->fetch_assoc()){
    $rows0['data'][] = $rsql0['NOMPOINTVENTE'];
    array_push($result_nbr0,$rows0['data'][$z]);
    $nompv = $rows0['data'][$z];
    if($z==5) break;
    $z++;

$sql1 ="SELECT
  cartecredit.LIBELLEPAIMENT,
  Sum(cartecredit.MONTANTCC) As Carte_credit,
  pointvente.NOMPOINTVENTE
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cartecredit`
    On cartecredit.IDPAIEMENT = paiement.IDPAIEMENT Inner Join
  `caisse`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `pointvente`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE
Where
  vente.DATEVENTE Between '$date1' And '$date2' And
  pointvente.NOMPOINTVENTE = '$nompv'
Group By
  pointvente.NOMPOINTVENTE";

$sth1 = $con->query($sql1);

$num_rows1 = mysqli_num_rows($sth1);

if($num_rows1 == 0) {$rows1['data'][] =0;}
else{
  while($r = $sth1->fetch_assoc()){
    $rows1['data'][] = $r['Carte_credit'];
    //array_push($result,$rows1);
}
}



$sql2 ="SELECT
  cadeau.LIBELLEPAIMENT,
  Sum(cadeau.MONTANTCADEAU) As Cadeau,
  pointvente.NOMPOINTVENTE
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cadeau`
    On cadeau.IDPAIEMENT = paiement.IDPAIEMENT Inner Join
  `caisse`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `pointvente`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE
Where
  vente.DATEVENTE Between '$date1' And '$date2' And
  pointvente.NOMPOINTVENTE = '$nompv'
Group By
  pointvente.NOMPOINTVENTE";

$sth2 = $con->query($sql2);

$num_rows2 = mysqli_num_rows($sth2);

if($num_rows2 == 0) {$rows2['data'][] =0;}
else{
  while($rr = $sth2->fetch_assoc()){
    $rows2['data'][] = $rr['Cadeau'];
    //array_push($result,$rows2);
}
}

$sql3 ="SELECT
  cheque.LIBELLEPAIMENT,
  Sum(cheque.MONTANTCHEQUE) As Cheque,
  pointvente.NOMPOINTVENTE
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cheque`
    On cheque.IDPAIEMENT = paiement.IDPAIEMENT Inner Join
  `caisse`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `pointvente`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE
Where
  vente.DATEVENTE Between '$date1' And '$date2' And
  pointvente.NOMPOINTVENTE = '$nompv'

Group By
  pointvente.NOMPOINTVENTE";

$sth3 = $con->query($sql3);

$num_rows3 = mysqli_num_rows($sth3);

if($num_rows3 == 0) {$rows3['data'][] =0;}
else{
  while($rrr = $sth3->fetch_assoc()){
    $rows3['data'][] = $rrr['Cheque'];
    //array_push($result,$rows3);
}
}

$sql4 ="SELECT
  espece.LIBELLEPAIMENT,
  Sum(espece.MONTANTESPECE) As Espece,
  pointvente.NOMPOINTVENTE
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `espece`
    On espece.IDPAIEMENT = paiement.IDPAIEMENT Inner Join
  `caisse`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `pointvente`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE
Where
  vente.DATEVENTE Between '$date1' And '$date2' And
  pointvente.NOMPOINTVENTE = '$nompv'
Group By
  pointvente.NOMPOINTVENTE";

$sth4 = $con->query($sql4);

$num_rows4 = mysqli_num_rows($sth4);

if($num_rows4 == 0) {$rows4['data'][] =0;}
else{
  while($rrrr = $sth4->fetch_assoc()){
    $rows4['data'][] = $rrrr['Espece'];
    //array_push($result,$rows4);
}
}


}

$result = array();

array_push($result,$result_nbr0);
array_push($result,$rows1);
array_push($result,$rows2);
array_push($result,$rows3);
array_push($result,$rows4);

?>

 

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
                       <th>Point de vente</th>
                        <th>Chiffre d'affaire</th>
                         
                        
                      </tr>
                    </thead>

                    <tbody>


<?php
for ($i=0; $i <sizeof($result_nbr0) ; $i++) { 
  $val0= $rows0['data'][$i];
  $val1= (int)$rows1['data'][$i];
  $val2= (int)$rows2['data'][$i];
  $val3= (int)$rows3['data'][$i];
  $val4= (int)$rows4['data'][$i];

  $valT=$val1+$val2+$val3+$val4;

  echo('<tr class="even pointer"><td class="a-center "><input type="checkbox" class="tableflat"></td><td>'.str_replace("_", " ", $val0).'</td><td>'.$valT.'</td></tr>');
  
}
?>
</tbody>
</table>
</div>
</div>
</div>


  

<script language="JavaScript">

$(function () {
      $(document).ready(function() {
        $.getJSON("CA_pv_data.php", {date1:'<?php echo $date1; ?>',date2:'<?php echo $date2; ?>'},function(json) {
     chart = new Highcharts.Chart({       
    //$('#container').highcharts({
        chart: {
            renderTo : 'container',
            type :'bar'
        },
        title: {
            text: 'Chiffre d’affaires points de vente / mode paiement'
        },
        xAxis: {
            categories : json[0]
        },
        yAxis: {
            min: 0,
            title: {
                text: ''
            }
        },
        credits: {
            enabled: false
        },
        legend: {
            reversed: true
        },
        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },
        series: [json[1],json[2],json[3],json[4]]

    });
});
});
});
  
</script>






