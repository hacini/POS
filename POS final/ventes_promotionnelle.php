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

<?php

$con = new mysqli('localhost', 'root', '', 'pos');
$con->query("SET NAMES UTF8");
$rows1 = array();

$sql1 ="SELECT
  Sum(lignevente.QUANTITECHOISIE) As `Sum_QUANTITECHOISIE`,
  prix.PRIXTTC - ((prix.POURCENTAGEPROMOTION * prix.PRIXTTC) / 100) As
  `prix_vente_promotion`,
  produit.DESIGNATION,
  vente.DATEVENTE,
  prix.DATEDEBUTPROMOTION,
  prix.DATEFINPROMOTION
From
  `vente` Inner Join
  `lignevente`
    On lignevente.IDVENTE = vente.IDVENTE Inner Join
  `produit`
    On lignevente.IDPRODUIT = produit.IDPRODUIT Inner Join
  `prix`
    On prix.IDPRODUIT = produit.IDPRODUIT
Where
  prix.PROMOTION = 1 And
  vente.DATEVENTE Between prix.DATEDEBUTPROMOTION And prix.DATEFINPROMOTION
Group By
  produit.DESIGNATION, prix.DATEDEBUTPROMOTION, prix.DATEFINPROMOTION,
  prix.POURCENTAGEPROMOTION, prix.PRIXTTC, prix.PROMOTION";

$sth1 = $con->query($sql1);

$num_rows1 = mysqli_num_rows($sth1);?>
<div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Ventes promotionnelle<small></small></h2>
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
                         <th>Quantité</th>
                         <th>Prix vente promotion</th>
                        <th>Date dèbut promotion</th>
                       <th>Date fin promotion</th>
                        
                      </tr>
                    </thead>

                    <tbody>
<?php

  while($r = $sth1->fetch_assoc()){

  	$val2 = $r['Sum_QUANTITECHOISIE'];
  	$val3 = $r['prix_vente_promotion'];
  	$val1 = $r['DESIGNATION'];
  	$val5 = $r['DATEDEBUTPROMOTION'];
  	$val6 = $r['DATEFINPROMOTION'];

    echo('<tr class="even pointer"><td class="a-center "><input type="checkbox" class="tableflat"></td><td>'.$val1.'</td><td>'.$val2.'</td><td>'.$val3.'</td><td>'.$val5.'</td><td class="a-right a-right ">'.$val6.'</td></tr>');

}



?>
</tbody>

                  </table>
                  </div>
                  </div>
                  </div>
                  </div>
