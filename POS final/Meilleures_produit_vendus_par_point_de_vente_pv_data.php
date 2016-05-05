<?php
 (string)$date1=$_GET['date1'];
 (string)$date2=$_GET['date2'];
 $nbr_Produit=$_GET['nbr_Produit'];
 (string)$nom_PV=$_GET['nom_PV'];

$con    = new mysqli('localhost', 'root', '', 'pos');
$sql1   = <<<SQL
Select
  pointvente.NOMPOINTVENTE,
  produit.DESIGNATION,
  Sum(lignevente.QUANTITECHOISIE) as QUANTITECHOISIE,
  vente.DATEVENTE
From
  pointvente Inner Join
  caisse
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE Inner Join
  vente
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  lignevente
    On lignevente.IDVENTE = vente.IDVENTE Inner Join
  produit
    On lignevente.IDPRODUIT = produit.IDPRODUIT
Where
  vente.DATEVENTE Between '$date1' And '$date2' And
  pointvente.NOMPOINTVENTE = '$nom_PV'
Group By
  produit.DESIGNATION
Order By
  Sum(lignevente.QUANTITECHOISIE) Desc
Limit $nbr_Produit
SQL;
$sth1   = $con->query($sql1);
$rows2  = array();
$result = array();
$i      = 0;
while ($r = $sth1->fetch_assoc()) {
    $rows2 = array(
        $r['DESIGNATION'],
        $r['QUANTITECHOISIE']
    );
    $i++;
    array_push($result, $rows2);
    if ($i == 10)
        break;
}
print json_encode($result, JSON_NUMERIC_CHECK);
?>
