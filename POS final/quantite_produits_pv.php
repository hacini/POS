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

$rows1 = array();
$rows2 = array();
$rows3 = array();
$rows4 = array();
$rows5 = array();

$rows1['name'] = 'NOMPOINTVENTE';
$rows2['name'] = 'DESIGNATION';
$rows3['name'] = 'SEUILMINIMUMPV';
$rows4['name'] = 'QUANTITERPPV';
$rows5['name'] = 'DATEEXPIRATION';

$sql0 ="SELECT
  pointvente.NOMPOINTVENTE,
  produit.DESIGNATION,
  stock.SEUILMINIMUMPV,
  stock.QUANTITERPPV,
  produit.DATEEXPIRATION
From
  `produit` Inner Join
  `stock`
    On stock.IDPRODUIT = produit.IDPRODUIT Inner Join
  `pointvente`
    On stock.IDPOINTVENTE = pointvente.IDPOINTVENTE
Group By
  pointvente.NOMPOINTVENTE, produit.DESIGNATION, stock.SEUILMINIMUMPV,
  stock.QUANTITERPPV, produit.DATEEXPIRATION
Order By
  pointvente.NOMPOINTVENTE,
  stock.SEUILMINIMUMPV Desc";

$sth0 = $con->query($sql0);


while($rsql0 = $sth0->fetch_assoc()){
    $rows1['data'][] = $rsql0['NOMPOINTVENTE'];
    $rows2['data'][] = $rsql0['DESIGNATION'];
    $rows3['data'][] = $rsql0['SEUILMINIMUMPV'];
    $rows4['data'][] = $rsql0['QUANTITERPPV'];
    $rows5['data'][] = $rsql0['DATEEXPIRATION'];

  }
  ?>
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
                       <th>Point vente</th>
                        <th>Désignation</th>
                        <th>Seuil</th>
                        <th>reste</th>
                        <th> Date d'expiration</th>
                        

                         
                        
                      </tr>
                    </thead>
                    <tbody>
  <?php



for ($i=0; $i <sizeof($rows1['data']) ; $i++) { 
  $val1= $rows1['data'][$i];
  $val2= $rows2['data'][$i];
  $val3= (int)$rows3['data'][$i];
  $val4= (int)$rows4['data'][$i];
  $val5= $rows5['data'][$i];

  if(($val4/$val3) >=1.5) {$class='bg-success';}
  elseif(($val4/$val3) > 1 and ($val4/$val3) < 1.5) {$class='bg-warning';}
  elseif(($val4/$val3) <= 1) {$class='bg-danger';}

  echo('<tr class="even pointer"><td class="a-center "><input type="checkbox" class="tableflat"></td>');

  echo('<td>'.str_replace("_", " ", $val1).'</td>');
  echo('<td>'.$val2.'</td>');
  echo('<td>'.$val3.'</td>');
  echo('<td class="'.$class.'">'.$val4.'</td>');
  echo('<td>'.$val5.'</td>');
  echo('</tr>');
}
?>
</tbody>
</table>
</div>
</div>
