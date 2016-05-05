<?php
    (string)$date1=$_GET['date1'];
   (string)$date2=$_GET['date2'];
       


$con = new mysqli('localhost', 'root', '', 'pos');

$sql = "SELECT
  produit.DESIGNATION As DESI,
  Sum(lignevente.QUANTITECHOISIE) As Sum_QUANTITECHOISIE
From
  `produit` Inner Join
  `lignevente`
    On lignevente.IDPRODUIT = produit.IDPRODUIT Inner Join
  `vente`
    On lignevente.IDVENTE = vente.IDVENTE
Where
  vente.DATEVENTE Between '$date1' And '$date2'
Group By
  DESI
 
Limit 10
 
  ";

if(!$result = $con->query($sql)){
    die('There was an error running the query [' . $con->error . ']');
}

$i=0;

while($row = $result->fetch_assoc()){
    echo $row['DESI'] . "/" . $row['Sum_QUANTITECHOISIE']. "/" ;

    $i++;

    if($i==10) break;
}

?>