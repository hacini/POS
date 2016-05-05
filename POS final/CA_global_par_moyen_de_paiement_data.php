<?php
(string)$date1=$_GET['date1'];
(string)$date2=$_GET['date2'];
$con = new mysqli('localhost', 'root', '', 'pos');

$rows1 = array();
$rows2 = array();
$rows3 = array();
$rows4 = array();
$result_nbr1 = array();
$result_nbr2 = array();
$result_nbr3 = array();
$result_nbr4 = array();
$result = array();


$rows1['name'] = 'Carte_credit';
$rows2['name'] = 'Cheque';
$rows3['name'] = 'Cadeau';
$rows4['name'] = 'Espece';


$sql1 = "SELECT
  cartecredit.LIBELLEPAIMENT,
  Sum(cartecredit.MONTANTCC) As Carte_credit
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cartecredit`
    On cartecredit.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.DATEVENTE Between '$date1' And '$date2'";

$sth1 = $con->query($sql1);

while($r = $sth1->fetch_assoc()){
    $rows1['data'][] = $r['Carte_credit'];
}

$sql2="SELECT
  cheque.LIBELLEPAIMENT,
  Sum(cheque.MONTANTCHEQUE) As Cheque
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cheque`
    On cheque.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.DATEVENTE Between '$date1' And '$date2'";

$sth2 = $con->query($sql2);

while($rr = $sth2->fetch_assoc()){
    $rows2['data'][] = $rr['Cheque'];
    }

$sql3="SELECT
  cadeau.LIBELLEPAIMENT,
  Sum(cadeau.MONTANTCADEAU) As Cadeau
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `cadeau`
    On cadeau.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.DATEVENTE Between '$date1' And '$date2'";

$sth3 = $con->query($sql3);

while($rrr = $sth3->fetch_assoc()){
    $rows3['data'][] = $rrr['Cadeau'];
}

$sql4="SELECT
  espece.LIBELLEPAIMENT,
  Sum(espece.MONTANTESPECE) As Espece
From
  `vente` Inner Join
  `paiement`
    On paiement.IDVENTE = vente.IDVENTE Inner Join
  `espece`
    On espece.IDPAIEMENT = paiement.IDPAIEMENT
Where
  vente.DATEVENTE Between '$date1' And '$date2'";

$sth4 = $con->query($sql4);

while($rrrr = $sth4->fetch_assoc()){
    $rows4['data'][] = $rrrr['Espece'];
}

for ($i=0; $i <1 ; $i++) { 
  array_push($result_nbr1,$rows1['name']);
  array_push($result_nbr1,$rows1['data'][$i]);
  array_push($result_nbr2,$rows2['name']);
  array_push($result_nbr2,$rows2['data'][$i]);
  array_push($result_nbr3,$rows3['name']);
  array_push($result_nbr3,$rows3['data'][$i]);
  array_push($result_nbr4,$rows4['name']);
  array_push($result_nbr4,$rows4['data'][$i]);

  array_push($result,$result_nbr1);
  array_push($result,$result_nbr2);
  array_push($result,$result_nbr3);
  array_push($result,$result_nbr4);

}
print json_encode($result, JSON_NUMERIC_CHECK);
?>
