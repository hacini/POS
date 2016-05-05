<?php
$con = new mysqli('localhost', 'root', '', 'pos');

$sql1 ="SELECT
  produit.DESIGNATION,
  produit.QUANTITEPS
From
  `produit`";

$sth1 = $con->query($sql1);

$rows1 = array();
$rows1['name'] = 'Quantité PS';

$rows3 = array();
$rows3['name'] = 'DESIGNATION';

while($r = $sth1->fetch_assoc()){
    $rows1['data'][] = $r['QUANTITEPS'];
    $rows3['data'][] = $r['DESIGNATION'];
}


$sql2 = "SELECT
  produit.DESIGNATION As Sum_DESIGNATION,
  Sum(stock.QUANTITERPPV) As Sum_QUANTITERPPV
From
  `produit` Inner Join
  `stock`
    On stock.IDPRODUIT = produit.IDPRODUIT
Group By
  produit.DESIGNATION";

$sth2 = $con->query($sql2);

$rows2 = array();
$rows2['name'] = 'Quantité distribuer';

while($rr = $sth2->fetch_assoc()){
    $rows2['data'][] = $rr['Sum_QUANTITERPPV'];
}

$result = array();
$result1 = array();
array_push($result,$rows1);
array_push($result,$rows2);
//array_push($result, $rows3);


for ($i=0; $i <=5 ; $i++) { 
  array_push($result1,$rows3['data'][$i]);
  //echo $i;
}

array_push($result,$result1);

//print json_encode($result1, JSON_NUMERIC_CHECK);
print json_encode($result, JSON_NUMERIC_CHECK);

?>
