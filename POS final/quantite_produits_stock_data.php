<?php

$con = new mysqli('localhost', 'root', '', 'pos');

$sql = "SELECT
  categorie.NOMCATEGORIE,
  Sum(produit.QUANTITEPS) As Sum_QUANTITEPS
From
  `produit` Inner Join
  `categorie`
    On produit.IDCATEGORIE = categorie.IDCATEGORIE
Group By
  categorie.NOMCATEGORIE";



if(!$result = $con->query($sql)){
    die('There was an error running the query [' . $con->error . ']');
}

$i=0;
while($row = $result->fetch_assoc()){
    echo $row['NOMCATEGORIE'] . "/" . $row['Sum_QUANTITEPS']. "/" ;
    $i++;
    if($i==10) break;
}

mysqli_close($con);

?>