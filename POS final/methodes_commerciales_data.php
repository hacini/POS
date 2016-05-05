<?php

$con = new mysqli('localhost', 'root', '', 'pos');

$sql = "SELECT
  client.METHODECOMMERCIALE,
  count(*) As nbr_client
From
  `client`
Group By
  client.METHODECOMMERCIALE";

if(!$result = $con->query($sql)){
    die('There was an error running the query [' . $con->error . ']');
}

$i=0;
while($row = $result->fetch_assoc()){
    echo $row['METHODECOMMERCIALE'] . "/" . $row['nbr_client']. "/" ;
    $i++;
    if($i==10) break;
}

mysqli_close($con);

?>