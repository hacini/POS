<?php
(string)$date1=$_GET['date1'];
(string)$date2=$_GET['date2'];
$con = new mysqli('localhost', 'root', '', 'pos');

$sql = "SELECT
  pointvente.NOMPOINTVENTE,
  Count(pointvente.NOMPOINTVENTE) As Nombre
From
  `pointvente` Inner Join
  `caisse`
    On caisse.IDPOINTVENTE = pointvente.IDPOINTVENTE Inner Join
  `vente`
    On vente.IDCAISE = caisse.IDCAISE
Where
  vente.DATEVENTE Between '$date1' And '$date2'
Group By
  pointvente.NOMPOINTVENTE";

if(!$result = $con->query($sql)){
    die('There was an error running the query [' . $con->error . ']');
}

$i=0;
while($row = $result->fetch_assoc()){
    echo $row['NOMPOINTVENTE'] . "/" . $row['Nombre']. "/" ;
    $i++;
    if($i==10) break;
}

mysqli_close($con);

?>