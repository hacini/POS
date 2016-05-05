<!DOCTYPE html>
<html lang="fr">
  

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


</head>


<body class="nav-md">

  

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Chiffre d'affaires détaillé<small>Caisse / Point de vente / Moyen de paiement</small></h2>
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
                        <th>ID caisse </th>
                        
                        <th>Moyen de paiement </th>
                      
                        <th>Montant</th>
                        
                      </tr>
                    </thead>

                    <tbody>
                   
                      <?php
         (string)$date1=$_POST['date1'];
          (string)$date2=$_POST['date2'];            

$con = new mysqli('localhost', 'root', '', 'pos');
$con->query("SET NAMES UTF8");
$sql1 ="SELECT
  cartecredit.LIBELLEPAIMENT,
  Sum(cartecredit.MONTANTCC) As Carte_credit,
  caisse.IDCAISE,
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
  vente.DATEVENTE Between '$date1' And '$date2'
Group By
  caisse.IDCAISE, pointvente.NOMPOINTVENTE";

$sth1 = $con->query($sql1);
while($r = $sth1->fetch_assoc()){

    $val1= $r['IDCAISE'];
    $val2= $r['NOMPOINTVENTE'];
    $val3= $r['LIBELLEPAIMENT'];
    $val4= $r['Carte_credit'];

    echo('<tr class="even pointer"><td class="a-center "><input type="checkbox" class="tableflat"></td><td>'.str_replace("_", " ", $val2).'</td><td>'.$val1.'</td><td>'.$val3.'</td><td class="a-right a-right ">'.$val4.'</td></tr>');
}

$sql2 ="SELECT
  cheque.LIBELLEPAIMENT,
  Sum(cheque.MONTANTCHEQUE) As Cheque,
  caisse.IDCAISE,
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
  vente.DATEVENTE Between '$date1' And '$date2'
Group By
  caisse.IDCAISE, pointvente.NOMPOINTVENTE";

$sth2 = $con->query($sql2);

while($rr = $sth2->fetch_assoc()){

    $val1= $rr['IDCAISE'];
    $val2= $rr['NOMPOINTVENTE'];
    $val3= $rr['LIBELLEPAIMENT'];
    $val4= $rr['Cheque'];

    echo('<tr class="even pointer"><td class="a-center "><input type="checkbox" class="tableflat"></td><td>'.str_replace("_", " ", $val2).'</td><td>'.$val1.'</td><td>'.$val3.'</td><td class="a-right a-right ">'.$val4.'</td></tr>');
}

$sql3 ="SELECT
  cadeau.LIBELLEPAIMENT,
  Sum(cadeau.MONTANTCADEAU) As Cadeau,
  caisse.IDCAISE,
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
  vente.DATEVENTE Between '$date1' And '$date2'
Group By
  caisse.IDCAISE, pointvente.NOMPOINTVENTE";

$sth3 = $con->query($sql3);

while($rrr = $sth3->fetch_assoc()){

    $val1= $rrr['IDCAISE'];
    $val2= $rrr['NOMPOINTVENTE'];
    $val3= $rrr['LIBELLEPAIMENT'];
    $val4= $rrr['Cadeau'];

    echo('<tr class="even pointer"><td class="a-center "><input type="checkbox" class="tableflat"></td><td>'.str_replace("_", " ", $val2).'</td><td>'.$val1.'</td><td>'.$val3.'</td><td class="a-right a-right ">'.$val4.'</td></tr>');
}

$sql4 ="SELECT
  espece.LIBELLEPAIMENT,
  Sum(espece.MONTANTESPECE) As Espece,
  caisse.IDCAISE,
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
  vente.DATEVENTE Between '$date1' And '$date2'
Group By
  caisse.IDCAISE, pointvente.NOMPOINTVENTE";

$sth4 = $con->query($sql4);

while($rrrr = $sth4->fetch_assoc()){

    $val1= $rrrr['IDCAISE'];
    $val2= $rrrr['NOMPOINTVENTE'];
    $val3= $rrrr['LIBELLEPAIMENT'];
    $val4= $rrrr['Espece'];

    echo('<tr class="even pointer"><td class="a-center "><input type="checkbox" class="tableflat"></td><td>'.str_replace("_", " ", $val2).'</td><td>'.$val1.'</td><td>'.$val3.'</td><td class="a-right a-right ">'.$val4.'</td></tr>');
}

?>

                      
                    </tbody>

                  </table>
                </div>
              </div>
            </div>

            <br />
            <br />
            <br />

          </div>
        </div>
       
  

  
  

  


  

  <!-- pace -->
  
  
</body>

</html>
