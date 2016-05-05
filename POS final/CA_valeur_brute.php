
        <?php
        
        if(isset($_POST['date1']) and isset($_POST['date2'])){
           if(($_POST['date1']=='') or ($_POST['date2']==''))
           {
            $date1='2001-01-01';
            $date2=(string)date('Y-m-d');
           }

           else{
          $date1=(string)$_POST['date1'];
          $date2=(string)$_POST['date2'];
                }

        }


$dateprec=date("Y-m-d", strtotime("-1 week", strtotime($date2)));

$con = new mysqli('localhost', 'root', '', 'pos');

$sql1 = "SELECT
  Sum(prix.PRIXTTC * lignevente.QUANTITECHOISIE) As Chiffre_affaire
From
  `vente` Inner Join
  `lignevente`
    On lignevente.IDVENTE = vente.IDVENTE Inner Join
  `produit`
    On lignevente.IDPRODUIT = produit.IDPRODUIT Inner Join
  `prix`
    On prix.IDPRODUIT = produit.IDPRODUIT
Where
  vente.DATEVENTE Between '$date1' And '$date2'";

$sth1 = $con->query($sql1);

while($r = $sth1->fetch_assoc()){
    echo('<div id="idsql1" hidden="hidden">'.$r['Chiffre_affaire'].'</div>');
    $chifr=$r['Chiffre_affaire'];
}

$sql2 = "SELECT
  Sum(prix.PRIXTTC * lignevente.QUANTITECHOISIE) As Chiffre_affaire
From
  `vente` Inner Join
  `lignevente`
    On lignevente.IDVENTE = vente.IDVENTE Inner Join
  `produit`
    On lignevente.IDPRODUIT = produit.IDPRODUIT Inner Join
  `prix`
    On prix.IDPRODUIT = produit.IDPRODUIT
Where
  vente.DATEVENTE Between '$date1' And '$dateprec'";

$sth2 = $con->query($sql2);

while($r2 = $sth2->fetch_assoc()){
    echo('<div id="idsql1" hidden="hidden">'.$r2['Chiffre_affaire'].'</div>');
    $chifr2=$r2['Chiffre_affaire'];
}

?>

<html>
<head>
   
</head>
<body>
  
     <div class="row tile_count">
          <div class="animated flipInY  col-lg-3 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><h2>Chiffre d'affaires</h2></span>
              <div class="count"><?php echo $chifr;?> DA</div>
              <span class="count_bottom"><i class="green" id="prs"><?php 
              

                             if($chifr==$chifr2){
                                echo ('0%');
                              }
                              elseif($chifr==0)
                              {
                                echo '';
                              }
                              elseif ($chifr2==0) {
                                echo "-100%";
                              }
                              else{
                                $valeur=(($chifr2-$chifr)/$chifr*100); 
                                if($valeur>=0){
                               echo ((number_format((float)$valeur, 2, '.', '')).'%');
                                          }
                                    else
                                    {?><SCRIPT TYPE="text/javascript">
                                      $("#prs").attr({
                                          "class" : "red",
                                          "id" : "prs"
                                      });
                                      </SCRIPT>
                                      <?php
                                     echo ((number_format((float)$valeur, 2, '.', '')).'%'); }
                              }

                             
                              



              ?> </i> depuis la dernier semaine</span>
            </div>
          </div>
          
        </div>
    
</body>
</html>








