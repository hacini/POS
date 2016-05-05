<?php

$con = new mysqli('localhost', 'root', '', 'pos');

$sql1 ="SELECT
  count(*) As nbr_Client,
  client.SEXECLIENT
From
  `vente` Inner Join
  `client`
    On vente.IDCLIENT = client.IDCLIENT
Group By
  client.SEXECLIENT";

//$sql1 = "SELECT name, val FROM `web_marketing` WHERE val>10.00";
$sth1 = $con->query($sql1);

$rows['type'] = 'pie';
$rows['SEXECLIENT'] = 'SEXECLIENT';
$rows['innerSize'] = '40%';

$i=0;
while($r = $sth1->fetch_assoc()){
    $rows['data'][] = array($r['SEXECLIENT'], $r['nbr_Client']);  
    $i++;
    if($i==10) break;

}
$rslt = array();
array_push($rslt,$rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysqli_close($con);


