<?php
(string)$date2=$_GET['date2'];
(string)$date1=$_GET['date1'];
$con = new mysqli('localhost', 'root', '', 'pos');


$sql1 = "SELECT
  pointvente.NOMPOINTVENTE,
  pointvente.IDPOINTVENTE
From
  `pointvente`
Group By
  pointvente.NOMPOINTVENTE";

$sth1 = $con->query($sql1);

$result1 = array();

$rows1 = array();
$rows2 = array();
$rows3 = array();
$rows4 = array();
$rows5 = array();


$rows1['name'] = 'NOMPOINTVENTE';
$rows2['name'] = 'Carte_credit';
$rows3['name'] = 'Cadeau';
$rows4['name'] = 'Espece';
$rows5['name'] = 'Cheque';

$i=0;
$nompv;
$result = array();
$result_nbr =  array();


while($r = $sth1->fetch_assoc()){
    $rows1['data'][] = $r['NOMPOINTVENTE'];
    $i++;
    if($i==7) break;
}

for ($j=0; $j<$i ; $j++) { 
  $nompv = $rows1['data'][$j];

$sql2="SELECT
  pointvente.NOMPOINTVENTE,
  Sum(cartecredit.MONTANTCC) As Carte_credit
From
  `pointvente` Inner Join
  `caisse`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE Inner Join
  `vente`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cartecredit`
    On cartecredit.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.DATEVENTE Between '$date1' And '$date2' and 
  pointvente.NOMPOINTVENTE = '$nompv'
Group By
  pointvente.NOMPOINTVENTE";

$con = new mysqli('localhost', 'root', '', 'pos');

  if ($result=mysqli_query($con,$sql2)){

  $rowcount=mysqli_num_rows($result);

  if($rowcount == 0) {
    $rows2['data'][] = 0; 
    //array_push($result1,0);
  }
}

$sth2 = $con->query($sql2);

while($rr = $sth2->fetch_assoc()){
    $rows2['data'][] = $rr['Carte_credit'];
    //array_push($result_nbr,$rr['Carte_credit']);
    }


$sql3="SELECT
  pointvente.NOMPOINTVENTE,
  Sum(cadeau.MONTANTCADEAU) As Cadeau
From
  `pointvente` Inner Join
  `caisse`
    On caisse.IDPOINTVENTE =  pointvente.IDPOINTVENTE Inner Join
  `vente`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cadeau`
    On cadeau.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.DATEVENTE Between '$date1' And '$date2' and 
  pointvente.NOMPOINTVENTE = '$nompv'
Group By
  pointvente.NOMPOINTVENTE";

$con = new mysqli('localhost', 'root', '', 'pos');

  if ($result=mysqli_query($con,$sql3)){

  $rowcount=mysqli_num_rows($result);

  if($rowcount == 0) {
    $rows3['data'][] = 0; 
    //array_push($result1,0);
  }
}

$sth3 = $con->query($sql3);

$nbr;

while($rrr = $sth3->fetch_assoc()){
    $rows3['data'][] = $rrr['Cadeau'];
}


$sql4 = "SELECT
  pointvente.NOMPOINTVENTE,
  Sum(espece.MONTANTESPECE) As Espece
From
  `pointvente` Inner Join
  `caisse`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE Inner Join
  `vente`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `espece`
    On espece.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.DATEVENTE Between '$date1' And '$date2' and 
  pointvente.NOMPOINTVENTE = '$nompv'
Group By
  pointvente.NOMPOINTVENTE";

$con = new mysqli('localhost', 'root', '', 'pos');

  if ($result=mysqli_query($con,$sql4)){

  $rowcount=mysqli_num_rows($result);

  if($rowcount == 0) {
    $rows4['data'][] = 0; 
    //array_push($result1,0);
  }
}

$sth4 = $con->query($sql4);

$nbr;

while($rrrr = $sth4->fetch_assoc()){
    $rows4['data'][] = $rrrr['Espece'];
}


$sql5 = "SELECT
  pointvente.NOMPOINTVENTE,
  Sum(cheque.MONTANTCHEQUE) As Cheque
From
  `pointvente` Inner Join
  `caisse`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE Inner Join
  `vente`
    On vente.IDCAISE = caisse.IDCAISE Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cheque`
    On cheque.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.DATEVENTE Between '$date1' And '$date2' and 
  pointvente.NOMPOINTVENTE = '$nompv'
Group By
  pointvente.NOMPOINTVENTE";

$con = new mysqli('localhost', 'root', '', 'pos');

  if ($result=mysqli_query($con,$sql5)){

  $rowcount=mysqli_num_rows($result);

  if($rowcount == 0) {
    $rows5['data'][] = 0; 
    //array_push($result1,0);
  }
}

$sth5 = $con->query($sql5);

$nbr;

while($rrrrr = $sth5->fetch_assoc()){
    $rows5['data'][] = $rrrrr['Cheque'];
}
}
$result2 = array();
$result3 = array();
$result4 = array();
$result5 = array();
$resultglo = array();

array_push($result1,$rows1);
array_push($result1,$rows2);
array_push($result1,$rows3);
array_push($result1,$rows4);
array_push($result1,$rows5);

print json_encode($result1, JSON_NUMERIC_CHECK);

?>