<?php
(string)$date1=$_GET['date1'];
(string)$date2=$_GET['date2'];

$con = new mysqli('localhost', 'root', '', 'pos');

$sql1 ="SELECT
  categorie.NOMCATEGORIE As Sum_NOMCATEGORIE,
  Count(lignevente.QUANTITECHOISIE) As Sum_QUANTITECHOISIE
From
  `vente` Inner Join
  `lignevente`
    On lignevente.IDVENTE = vente.IDVENTE Inner Join
  `produit`
    On lignevente.IDPRODUIT = produit.IDPRODUIT Inner Join
  `categorie`
    On produit.IDCATEGORIE = categorie.IDCATEGORIE
Where
  vente.DATEVENTE Between '$date1' And '$date2'
Group By
  categorie.NOMCATEGORIE";

$sth1 = $con->query($sql1);

$rows['type'] = 'pie';
//$rows['DESIGNATION'] = 'Revenue';
$rows['innerSize'] = '50%';

$i=0;
while($r = $sth1->fetch_assoc()){
    $rows['data'][] = array($r['Sum_NOMCATEGORIE'], $r['Sum_QUANTITECHOISIE']);  
    $i++;
    if($i==10) break;

}
$rslt = array();
array_push($rslt,$rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysqli_close($con);


