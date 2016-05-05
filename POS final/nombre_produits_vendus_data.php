<?php
(string)$date1=$_GET['date1'];
(string)$date2=$_GET['date2'];

$con = new mysqli('localhost', 'root', '', 'pos');

$sql1 ="SELECT Distinct
  produit.DESIGNATION As DESIGNATION,
  Sum(lignevente.QUANTITECHOISIE) As QUANTITECHOISIE
From
  `vente` Inner Join
  `lignevente`
    On lignevente.IDVENTE = vente.IDVENTE Inner Join
  `produit`
    On lignevente.IDPRODUIT = produit.IDPRODUIT
Where
  vente.DATEVENTE Between '$date1' And '$date2'
Group By
  produit.DESIGNATION
Order By
  QUANTITECHOISIE Desc";

//$sql1 = "SELECT name, val FROM `web_marketing` WHERE val>10.00";
$sth1 = $con->query($sql1);

$rows['type'] = 'pie';
$rows['DESIGNATION'] = 'Revenue';
$rows['innerSize'] = '80%';

$i=0;
while($r = $sth1->fetch_assoc()){
    $rows['data'][] = array($r['DESIGNATION'], $r['QUANTITECHOISIE']);  
    $i++;
    if($i==10) break;

}
$rslt = array();
array_push($rslt,$rows);
print json_encode($rslt, JSON_NUMERIC_CHECK);

mysqli_close($con);


