
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
<body class="nav-md">

  

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h1>Opérations de caisse<small></small></h1>
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
                          
                        </th>
                       <th>ID caisse</th>
                        <th>Prix a payer</th>
                          <th>Chèque</th>
                          <th>Carte de crédit</th>
                          <th>Cadeau</th>
                          <th>Espèce</th>
                          <th>Total payé</th>
                          <th>État</th>
                        
                      </tr>
                    </thead>

                    <tbody>
<?php

$con = new mysqli('localhost', 'root', '', 'pos');


$vcheque;
$vcc;
$vcadeau;
$vespece;

$sql1 ="SELECT
  caisse.IDCAISE,
  Sum((prix.PRIXTTC * lignevente.QUANTITECHOISIE)) As prixtot
From
  `caisse` Inner Join
  `vente`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `lignevente`
    On lignevente.IDVENTE = vente.IDVENTE Inner Join
  `produit`
    On lignevente.IDPRODUIT = produit.IDPRODUIT Inner Join
  `prix`
    On prix.IDPRODUIT = produit.IDPRODUIT Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE

Group By
  caisse.IDCAISE";

$sth1 = $con->query($sql1);
while($r = $sth1->fetch_assoc()){

    $val1= $r['IDCAISE'];
    $val2= $r['prixtot'];

$sql2 ="SELECT
  Sum(cheque.MONTANTCHEQUE) As summ,
  caisse.IDCAISE
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cheque`
    On cheque.IDPAIEMENT = paiement.IDPAIEMENT Inner Join
  `caisse`
    On vente.IDCAISE = caisse.IDCAISE
Where
  caisse.IDCAISE = '$val1'
Group By
  caisse.IDCAISE
Order By
  summ Desc";

$con = new mysqli('localhost', 'root', '', 'pos');

  if ($result=mysqli_query($con,$sql2)){
  $rowcount=mysqli_num_rows($result);

  if($rowcount == 0) {$vcheque =0;}
}


$sth2 = $con->query($sql2);
while($rr = $sth2->fetch_assoc()){
    $valcheque= $rr['summ'];
    $vcheque = $valcheque;
}


$sql3 ="SELECT
  caisse.IDCAISE,
  Sum(cartecredit.MONTANTCC) AS summ
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `caisse`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `cartecredit`
    On cartecredit.IDPAIEMENT = paiement.IDPAIEMENT
Where
  caisse.IDCAISE = '$val1'
Group By
  caisse.IDCAISE";

$con = new mysqli('localhost', 'root', '', 'pos');

  if ($result=mysqli_query($con,$sql3)){
  $rowcount=mysqli_num_rows($result);

  if($rowcount == 0) {$vcc =0;}
}


$sth3 = $con->query($sql3);
while($rrr = $sth3->fetch_assoc()){
    $valcc= $rrr['summ'];
    $vcc=$valcc;
}

$sql4 ="SELECT
  caisse.IDCAISE,
  Sum(cadeau.MONTANTCADEAU) As summ
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `caisse`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `cadeau`
    On cadeau.IDPAIEMENT = paiement.IDPAIEMENT
Where
  caisse.IDCAISE = '$val1'
Group By
  caisse.IDCAISE";

  $con = new mysqli('localhost', 'root', '', 'pos');

  if ($result=mysqli_query($con,$sql4)){
  $rowcount=mysqli_num_rows($result);

  if($rowcount == 0) {$vcadeau=0;}
}

$sth4 = $con->query($sql4);
while($rrrr = $sth4->fetch_assoc()){
    $valcadeau= $rrrr['summ'];
    $vcadeau=$valcadeau;
}

$sql5 ="SELECT
  caisse.IDCAISE,
  Sum(espece.MONTANTESPECE) As summ
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `caisse`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `espece`
    On espece.IDPAIEMENT = paiement.IDPAIEMENT
Where
  caisse.IDCAISE = '$val1'
Group By
  caisse.IDCAISE";

  $con = new mysqli('localhost', 'root', '', 'pos');

  if ($result=mysqli_query($con,$sql5)){
  $rowcount=mysqli_num_rows($result);

  if($rowcount == 0) {$vespece=0;}
}

$sth5 = $con->query($sql5);

while($rrrrr = $sth5->fetch_assoc()){
    $valespece= $rrrrr['summ'];
    $vespece=$valespece;
}
    $somme = $vcheque+$vcc+$vcadeau+$vespece;

    $valetat = $val2-$somme;
    if($valetat==0) {$etat='ok';$class='bg-success';}
    else {$etat='non';$class='bg-danger';}
    
    echo('<tr class="even pointer "><td class="a-center "></td><td >'.$val1.'</td><td >'.$val2.'</td><td >'.$vcheque.'</td><td >'.$vcc.'</td><td >'.$vcadeau.'</td><td >'.$vespece.'</td><td >'.$somme.'</td><td class="'.$class.'">'.$etat.'</td></tr>');
}


?>
</tbody>
</table> 
</body> 
</html-->  

      

  









