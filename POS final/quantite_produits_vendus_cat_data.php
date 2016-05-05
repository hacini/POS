<?php
$con = new mysqli('localhost', 'root', '', 'pos');

$z=0;

$rows1 = array();
$rows2 = array();

$result_nbr1 = array();
$result = array();

$rows1['name'] = 'Catégorie';
$rows2['name'] = 'Quantité';

$sql1 = "SELECT
  categorie.NOMCATEGORIE As Sum_NOMCATEGORIE,
  Sum(lignevente.QUANTITECHOISIE) As Sum_QUANTITECHOISIE
From
  `vente` Inner Join
  `lignevente`
    On lignevente.IDVENTE = vente.IDVENTE Inner Join
  `produit`
    On lignevente.IDPRODUIT = produit.IDPRODUIT Inner Join
  `categorie`
    On produit.IDCATEGORIE = categorie.IDCATEGORIE
Where
  vente.DATEVENTE Between '2015-01-01' And '2016-12-30'
Group By
  categorie.NOMCATEGORIE
Order By
  Sum_QUANTITECHOISIE ";

$sth1 = $con->query($sql1);

while($r = $sth1->fetch_assoc()){
    $rows1['data'][] = $r['Sum_NOMCATEGORIE'];
    $rows2['data'][] = $r['Sum_QUANTITECHOISIE'];
    $z++;
    if($z==10) break;
}

for ($i=0; $i <$z ; $i++) { 

  $val1= $rows1['data'][$i];
  $val2= $rows2['data'][$i];

  array_push($result,array($val1,$val2));

}
print json_encode($result, JSON_NUMERIC_CHECK);
?>
