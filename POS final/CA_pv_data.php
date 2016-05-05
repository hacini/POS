<?php
(string)$date1=$_GET['date1'];
(string)$date2=$_GET['date2'];
$con = new mysqli('localhost', 'root', '', 'pos');

$rows0 = array();
$rows1 = array();
$rows2 = array();
$rows3 = array();
$rows4 = array();

$result_nbr0 = array();
$result_nbr1 = array();
$result_nbr2 = array();
$result_nbr3 = array();
$result_nbr4 = array();

$rows1['name'] = 'Carte_credit';
$rows2['name'] = 'Cadeau';
$rows3['name'] = 'Cheque';
$rows4['name'] = 'Espece';

$sql0 ="SELECT
  pointvente.NOMPOINTVENTE
From
  `pointvente`
Limit 10";

$sth0 = $con->query($sql0);

$z=0;
$nompv;
while($rsql0 = $sth0->fetch_assoc()){
    $rows0['data'][] = $rsql0['NOMPOINTVENTE'];
    array_push($result_nbr0,$rows0['data'][$z]);
    $nompv = $rows0['data'][$z];
    if($z==5) break;
    $z++;

$sql1 ="SELECT
  cartecredit.LIBELLEPAIMENT,
  Sum(cartecredit.MONTANTCC) As Carte_credit,
  pointvente.NOMPOINTVENTE
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cartecredit`
    On cartecredit.IDPAIEMENT = paiement.IDPAIEMENT Inner Join
  `caisse`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `pointvente`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE
Where
  vente.DATEVENTE Between '$date1' And '$date2' And
  pointvente.NOMPOINTVENTE = '$nompv'
Group By
  pointvente.NOMPOINTVENTE";

$sth1 = $con->query($sql1);

$num_rows1 = mysqli_num_rows($sth1);

if($num_rows1 == 0) {$rows1['data'][] =0;}
else{
  while($r = $sth1->fetch_assoc()){
    $rows1['data'][] = $r['Carte_credit'];
    //array_push($result,$rows1);
}
}



$sql2 ="SELECT
  cadeau.LIBELLEPAIMENT,
  Sum(cadeau.MONTANTCADEAU) As Cadeau,
  pointvente.NOMPOINTVENTE
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cadeau`
    On cadeau.IDPAIEMENT = paiement.IDPAIEMENT Inner Join
  `caisse`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `pointvente`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE
Where
  vente.DATEVENTE Between '$date1' And '$date2' And
  pointvente.NOMPOINTVENTE = '$nompv'
Group By
  pointvente.NOMPOINTVENTE";

$sth2 = $con->query($sql2);

$num_rows2 = mysqli_num_rows($sth2);

if($num_rows2 == 0) {$rows2['data'][] =0;}
else{
  while($rr = $sth2->fetch_assoc()){
    $rows2['data'][] = $rr['Cadeau'];
    //array_push($result,$rows2);
}
}

$sql3 ="SELECT
  cheque.LIBELLEPAIMENT,
  Sum(cheque.MONTANTCHEQUE) As Cheque,
  pointvente.NOMPOINTVENTE
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cheque`
    On cheque.IDPAIEMENT = paiement.IDPAIEMENT Inner Join
  `caisse`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `pointvente`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE
Where
  vente.DATEVENTE Between '$date1' And '$date2' And
  pointvente.NOMPOINTVENTE = '$nompv'

Group By
  pointvente.NOMPOINTVENTE";

$sth3 = $con->query($sql3);

$num_rows3 = mysqli_num_rows($sth3);

if($num_rows3 == 0) {$rows3['data'][] =0;}
else{
  while($rrr = $sth3->fetch_assoc()){
    $rows3['data'][] = $rrr['Cheque'];
    //array_push($result,$rows3);
}
}

$sql4 ="SELECT
  espece.LIBELLEPAIMENT,
  Sum(espece.MONTANTESPECE) As Espece,
  pointvente.NOMPOINTVENTE
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `espece`
    On espece.IDPAIEMENT = paiement.IDPAIEMENT Inner Join
  `caisse`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `pointvente`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE
Where
  vente.DATEVENTE Between '$date1' And '$date2' And
  pointvente.NOMPOINTVENTE = '$nompv'
Group By
  pointvente.NOMPOINTVENTE";

$sth4 = $con->query($sql4);

$num_rows4 = mysqli_num_rows($sth4);

if($num_rows4 == 0) {$rows4['data'][] =0;}
else{
  while($rrrr = $sth4->fetch_assoc()){
    $rows4['data'][] = $rrrr['Espece'];
    //array_push($result,$rows4);
}
}


}

$result = array();

array_push($result,$result_nbr0);
array_push($result,$rows1);
array_push($result,$rows2);
array_push($result,$rows3);
array_push($result,$rows4);

//echo('</br>');

//print json_encode($result_nbr0, JSON_NUMERIC_CHECK);
//echo('</br>');
//echo('</br>');
print json_encode($result, JSON_NUMERIC_CHECK);


?>
