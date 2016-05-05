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


<div class="x_panel">
                <div class="x_title">
                  <h1>Détails d’opérations commerciales </h1>
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
                    <thead style="font-size:8px">
                      <tr class="headings">
                        <th>
                          
                        </th>
      <th>ID Caisse </th>
      <th>ID Vente </th>
      <th>Total </th>
      <th>Désignations </th>
      <th>Nom emp </th>
      <th>Prénom emp </th>
      <th>Chèque </th>
      <th>CC </th>
      <th>Cadeau </th>
      <th>Espèce </th>
      <th>Total payé </th>
      <th>État </th>
    </tr>
                    </thead>
                    <tbody>
<?php

$con = new mysqli('localhost', 'root', '', 'pos');


$vcheque;
$vcc;
$vcadeau;
$vespece;

$sglo=0;
$pglo=0;

$sql1 ="SELECT
  caisse.IDCAISE,
  vente.IDVENTE,
  Sum((lignevente.QUANTITECHOISIE * prix.PRIXTTC)) As prixnormal,
  Group_Concat(Distinct produit.DESIGNATION) As desi,
  employer.NOMEMPLOYER,
  employer.PRENOMEMPLOYER
From
  `vente` Inner Join
  `lignevente`
    On lignevente.IDVENTE = vente.IDVENTE Inner Join
  `produit`
    On lignevente.IDPRODUIT = produit.IDPRODUIT Inner Join
  `prix`
    On prix.IDPRODUIT = produit.IDPRODUIT Inner Join
  `employer`
    On vente.IDEMPLOYER = employer.IDEMPLOYER Inner Join
  `caisse`
    On vente.IDCAISE = caisse.IDCAISE
Where
  vente.DATEVENTE Between '2015-01-01' And '2016-12-30'
Group By
  vente.IDVENTE, employer.NOMEMPLOYER, employer.PRENOMEMPLOYER, vente.DATEVENTE,
  caisse.IDCAISE
Order By
  prixnormal Desc";

$sth1 = $con->query($sql1);
while($r = $sth1->fetch_assoc()){
    $val0= $r['IDCAISE'];
    $val1= $r['IDVENTE'];
    $val2= $r['prixnormal'];
    $val3= $r['desi'];
    $val4= $r['NOMEMPLOYER'];
    $val5= $r['PRENOMEMPLOYER'];

$sql2 ="SELECT
  vente.IDVENTE,
  Sum(cheque.MONTANTCHEQUE) As summ
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cheque`
    On cheque.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.IDVENTE = '$val1'
Group By
  vente.IDVENTE";




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
  vente.IDVENTE,
  Sum(cartecredit.MONTANTCC) As summ
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cartecredit`
    On cartecredit.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.IDVENTE = '$val1'
Group By
  vente.IDVENTE";


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
  vente.IDVENTE,
  Sum(cadeau.MONTANTCADEAU) As summ
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cadeau`
    On cadeau.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.IDVENTE = '$val1'
Group By
  vente.IDVENTE";



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
  vente.IDVENTE,
  Sum(espece.MONTANTESPECE) As summ
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `espece`
    On espece.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.IDVENTE = '$val1'
Group By
  vente.IDVENTE";



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

    $sglo = $sglo+$val2 ;
    $pglo = $pglo+$somme ;

    $valetat = $val2-$somme;
    if($valetat==0) {$etat='ok';$class='bg-success';}
    else  {$etat='non';$class='bg-danger';}
    echo('<tr class="even pointer"><td class="a-center "></td>');
    echo('<td>'.$val0.'</td><td>'.$val1.'</td><td>'.$val2.'</td><td>'.$val3.'</td><td>'.$val4.'</td><td>'.$val5.'</td><td>'.$vcheque.'</td><td>'.$vcc.'</td><td>'.$vcadeau.'</td><td>'.$vespece.'</td><td>'.$somme.'</td><td class="'.$class.'">'.$etat.'</td></tr>');
}



$etatglo = $sglo-$pglo;


?>

<div class="row tile_count">
          <div class="animated flipInY  col-lg-3 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><h2>Prix à payer global</h2></span>
              <div class="count"> <?php echo $sglo ?> DA</div>
            
            </div>
          </div>
             <div class="animated flipInY  col-lg-3 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><h2>Total payé global</h2></span>
              <div class="count"> <?php echo $pglo ?> DA</div>
            
            </div>
          </div>
             <div class="animated flipInY  col-lg-3 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top text-danger "><h2>Manque</h2></span>
              <div class="count bg-danger "> <?php if($etatglo==0) echo('ok'); 

                else
              {echo '-'.$etatglo;} ?> DA</div>
            
            </div>
          </div>
          
        </div>
     

       
          
     

       
          
     
       
</tbody>
</table> 
</body> 
</div>
</div>

      

  










      

  









