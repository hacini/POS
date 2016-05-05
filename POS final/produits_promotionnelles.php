
<script>
    $(document).ready(function() {
          $('.datedf').datepicker({
      format: "yyyy-mm-dd"
   });
       $("#filtr_btn").click(function() {

    var date1 = document.getElementById("produits_promo_date1").value;
    var date2 = document.getElementById("produits_promo_date2").value;
    var prixMin = document.getElementById("produits_promo_prix_min").value;
    var prixMax = document.getElementById("produits_promo_prix_max").value;
    var pourcentage = document.getElementById("produits_promo_pourcentage").value;
  $.ajax({
         url: 'produits_promotionnelles_param.php',
         type: 'POST',
              dataType: 'html',
          data: {
            'date1': date1,
            'date2': date2,
            'prixMin': prixMin,
            'prixMax':prixMax, 
            'pourcentage':pourcentage
            
         },    
         complete: function(resultat, status) {},
         success: function(codehtml, status) {
            $(codehtml).appendTo("#resultat");
         },
         error: function(resultat, status, err) {}
      });
  
         

    
});

   
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

 
  <div class="col-xs-12">

<form data-toggle="validator" role="form">
            <div class="form-group row">
            <div class="col-md-4 col-sm-4 col-xs-12"> 
              <div class="col-xs-6">
                <label class="control-label">Date Debut
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf" data-provide="datepicker" type="text" readonly id="produits_promo_date1" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6">
                <label class="control-label">Date FIN
                </label>
                <div class="input-group date" id="dp3" data-date-format="yyyy-mm-dd">
                  <input class="form-control datedf "  data-provide="datepicker" type="text" readonly id="produits_promo_date2" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar">
                    </i>
                  </span>
                </div>
              </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="col-xs-6">
                <label class="control-label">Prix min
                </label>
                <div class="input-group " id="dp3" >
                  <input class="form-control " type="text" id="produits_promo_prix_min" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-shopping-cart">
                    </i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6">
                <label class="control-label">Prix max
                </label>
                <div class="input-group " id="dp3" >
                  <input class="form-control " type="text" id="produits_promo_prix_max" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-shopping-cart">
                    </i>
                  </span>
                </div>
              </div>
              </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="col-xs-6">
                <label class="control-label">Inférieur à
                </label>
                <div class="input-group " id="dp3" >
                  <input class="form-control " type="text" id="produits_promo_pourcentage"  required>
                  <span class="input-group-addon">
                    <i ><bold>%</bold>
                    </i>
                  </span>
                </div>
              </div>
              <div class="col-xs-6">
                <button type="button" class="btn btn-success" id="filtr_btn" style="margin-top: 23px">Filtrer  <i class="glyphicon glyphicon-filter">
                    </i>
                  </button>
              </div>
              </div>
              
            </div>
          </form>
</div>
  <div class="col-xs-12" id="resultat_sec">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Produits promotionnelles</h2>
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
                       <th>Désignation</th>
                        <th>Prix TTC </th>
                          <th>pourcentage</th>
                          <th>Prix vente</th>
                          <th>Quantité PS</th>
                          <th>Date début promotion</th>
                          <th>Date fin promotion</th>
                        
                      </tr>
                    </thead>

                    <tbody>
  <?php



$con = new mysqli('localhost', 'root', '', 'pos');


$rows1 = array();
$rows2 = array();
$rows3 = array();
$rows4 = array();
$rows5 = array();

$rows1['name'] = 'DESIGNATION';
$rows2['name'] = 'PRIXTTC';
$rows3['name'] = 'POURCENTAGEPROMOTION';
$rows4['name'] = 'QUANTITEPS';
$rows5['name'] = 'DATEDEBUTPROMOTION';
$rows6['name'] = 'DATEFINPROMOTION';
$rows7['name'] = 'prix';

$sql0 ="SELECT
  produit.DESIGNATION,
  prix.PRIXTTC,
  prix.POURCENTAGEPROMOTION,
  produit.QUANTITEPS,
  prix.DATEDEBUTPROMOTION,
  prix.DATEFINPROMOTION,
  prix.PRIXTTC - (prix.PRIXTTC * (prix.POURCENTAGEPROMOTION) / 100) As prix
From
  `produit` Inner Join
  `prix`
    On prix.IDPRODUIT = produit.IDPRODUIT
Where
 

  prix.PROMOTION = '1' 
  
Order By
  prix.PRIXTTC Desc";

$sth0 = $con->query($sql0);

while($rsql0 = $sth0->fetch_assoc()){

    $rows1['data'][] = $rsql0['DESIGNATION'];
    $rows2['data'][] = $rsql0['PRIXTTC'];
    $rows3['data'][] = $rsql0['POURCENTAGEPROMOTION'];
    $rows4['data'][] = $rsql0['QUANTITEPS'];
    $rows5['data'][] = $rsql0['DATEDEBUTPROMOTION'];
    $rows6['data'][] = $rsql0['DATEFINPROMOTION'];
    $rows7['data'][] = $rsql0['prix'];

  }
if(isset($rows1['data'])){
for ($i=0; $i <sizeof($rows1['data']) ; $i++) { 
  $val1= $rows1['data'][$i];
  $val2= $rows2['data'][$i];
  $val3= $rows3['data'][$i];
  $val4= $rows4['data'][$i];
  $val5= $rows5['data'][$i];
  $val6= $rows6['data'][$i];
  $val7= $rows7['data'][$i];

  echo('<tr class="even pointer"><td class="a-center "><input type="checkbox" class="tableflat"></td>');
  echo('<td>'.$val1.'</td>');
  echo('<td>'.$val2.'</td>');
  echo('<td>'.$val3.' %</td>');
  echo('<td>'.$val7.'</td>');
  echo('<td>'.$val4.'</td>');
  echo('<td>'.$val5.'</td>');
  echo('<td>'.$val6.'</td>');

  echo('</tr>');  
}
}

?>
</tbody>
</table>

</div>
</div>
</div>
