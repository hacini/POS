<?php
$con = new mysqli('localhost', 'root', '', 'pos');

$sql1 = <<<SQL
  Select
  produit.DESIGNATION,
  prix.PRIXTTC,
  prix.PRIXHT,
  prix.TAUXTVA,
  prix.PRIXACHATAPPLIQUER
From
  `produit` Inner Join
  `prix`
    On prix.IDPRODUIT = produit.IDPRODUIT
SQL;

$sth1 = $con->query($sql1);

$rows1 = array();
$rows1['name'] = 'DESIGNATION';

$rows2 = array();
$rows2['name'] = 'PRIXTTC';

$rows3 = array();
$rows3['name'] = 'PRIXHT';

$rows4 = array();
$rows4['name'] = 'TAUXTVA';

$rows5 = array();
$rows5['name'] = 'PRIXACHATAPPLIQUER';

$i=0;

while($r = $sth1->fetch_assoc()){
    $rows1['data'][] = $r['DESIGNATION'];
    $rows2['data'][] = $r['PRIXTTC'];
    $rows3['data'][] = $r['PRIXHT'];
    $rows4['data'][] = $r['TAUXTVA'];
    $rows5['data'][] = $r['PRIXACHATAPPLIQUER'];

    $i++;

    if($i==10) break;
}

$result = array();
array_push($result,$rows1);
array_push($result,$rows2);
array_push($result,$rows3);
array_push($result,$rows4);
array_push($result,$rows5);

print json_encode($result, JSON_NUMERIC_CHECK);

?>
