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

$rows1['name'] = 'NOMCLIENT';
$rows2['name'] = 'PRENOMCLIENT';
$rows3['name'] = 'SEXECLIENT';
$rows4['name'] = 'age';

$sql0 ="SELECT
  client.NOMCLIENT,
  client.PRENOMCLIENT,
  client.SEXECLIENT,
  TimestampDiff(year, client.DATENAISSANCECLIENT, Current_Date) As age
From
  `client` Inner Join
  `vente`
    On vente.IDCLIENT = client.IDCLIENT
Group By
  client.NOMCLIENT, client.PRENOMCLIENT, client.SEXECLIENT, TimestampDiff(year,
  client.DATENAISSANCECLIENT, Current_Date)
Order By
  age Desc";

$sth0 = $con->query($sql0);

while($rsql0 = $sth0->fetch_assoc()){
    $rows1['data'][] = $rsql0['NOMCLIENT'];
    $rows2['data'][] = $rsql0['PRENOMCLIENT'];
    $rows3['data'][] = $rsql0['SEXECLIENT'];
    $rows4['data'][] = $rsql0['age'];
}?>
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
                       <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Age</th>
                        
                      </tr>
                    </thead>
                    <tbody>
<?php


if(isset($rows1['data'])){
for ($i=0; $i <sizeof($rows1['data']) ; $i++) { 
  $val1= $rows1['data'][$i];
  $val2= $rows2['data'][$i];
  $val3= $rows3['data'][$i];
  $val4= $rows4['data'][$i];
   echo('<tr class="even pointer"><td class="a-center "><input type="checkbox" class="tableflat"></td>');
  echo('<td>'.$val1.'</td><td>'.$val2.'</td><td>'.$val3.'</td><td>'.$val4.'</td></tr>');
}}


?>
</tbody>
</table>
</div>
</div>

