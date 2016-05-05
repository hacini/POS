<?php

$con = new mysqli('localhost', 'root', '', 'pos');

$rows['type'] = 'pie';
$rows['DESIGNATION'] = 'Revenue';
$rows['innerSize'] = '70%';

$sql1 ="SELECT
  count(*) As nbr_inscrit
From
  `client` Inner Join
  `carteabonnement`
    On client.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_ Inner Join
  `bronze`
    On bronze.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_";

$sth1 = $con->query($sql1);

while($r = $sth1->fetch_assoc()){
    $name='Bronze';
    $rows['data'][] = array($name,$r['nbr_inscrit']);  

}

$sql2 ="SELECT
  count(*) As nbr_inscrit
From
  `client` Inner Join
  `carteabonnement`
    On client.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_ Inner Join
  `costum`
    On costum.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_";

$sth2 = $con->query($sql2);

while($rr = $sth2->fetch_assoc()){
    $name='Costum';
    $rows['data'][] = array($name,$rr['nbr_inscrit']);  

}

$sql3 ="SELECT
  count(*) As nbr_inscrit
From
  `client` Inner Join
  `carteabonnement`
    On client.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_ Inner Join
  `gold`
    On gold.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_";

$sth3 = $con->query($sql3);

while($rrr = $sth3->fetch_assoc()){
    $name='Gold';
    $rows['data'][] = array($name,$rrr['nbr_inscrit']);  

}

$sql4 ="SELECT
  count(*) As nbr_inscrit
From
  `client` Inner Join
  `carteabonnement`
    On client.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_ Inner Join
  `platinium`
    On platinium.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_";

$sth4 = $con->query($sql4);

while($rrrr = $sth4->fetch_assoc()){
    $name='Platinium';
    $rows['data'][] = array($name,$rrrr['nbr_inscrit']);  

}

$sql5 ="SELECT
  count(*) As nbr_inscrit
From
  `client` Inner Join
  `carteabonnement`
    On client.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_ Inner Join
  `silver`
    On silver.ID_ABONNEMENT_ = carteabonnement.ID_ABONNEMENT_";

$sth5 = $con->query($sql5);

while($rrrrr = $sth5->fetch_assoc()){
    $name='Silver';
    $rows['data'][] = array($name,$rrrrr['nbr_inscrit']);  

}

$rslt = array();
array_push($rslt,$rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysqli_close($con);


