<?php
(string)$date1=$_GET['date1'];
$con = new mysqli('localhost', 'root', '', 'pos');

$tabdate = array('30','27','30','29','30','29','30','30','29','30','29','30');
$tabname = array('JAN','FÉV','MAR','AVR','MAI','JUN','JUL','AOÛ','SEP','OCT','NOV','DÉC');

(int)$year='20'.$date1;
(int)$yy=$date1;
(string)$date1 = '20'.$date1.'-01-01';

$rows1 = array();
$rows2 = array();
$rows1['name'] = 'Chiffre d\'affaires';

$i=0;
while ($date1<date('Y-m-d')) {

$testfevrier=(date("Y")%4);
$nextdate=$tabdate[$i].'days';
$date2=date('Y-m-d', strtotime($date1.$nextdate));

$sql1 = "SELECT
  Sum(prix.PRIXTTC * lignevente.QUANTITECHOISIE) As Chiffre_affaire
From
  `vente` Inner Join
  `lignevente`
    On lignevente.IDVENTE = vente.IDVENTE Inner Join
  `produit`
    On lignevente.IDPRODUIT = produit.IDPRODUIT Inner Join
  `prix`
    On prix.IDPRODUIT = produit.IDPRODUIT
Where
  vente.DATEVENTE Between '$date1' And '$date2'";

$con = new mysqli('localhost', 'root', '', 'pos');

$sth1 = $con->query($sql1);

$con = new mysqli('localhost', 'root', '', 'pos');

while($r = $sth1->fetch_assoc()){
  $val = $r['Chiffre_affaire'];
  if($val==0) {
    $rows1['data'][] = '0';}
  else {
    $rows1['data'][] = $r['Chiffre_affaire'];}
}
$rows2['data'][]=$tabname[$i].' '.$yy;
$i++;
if((($year%4)==0)and($i==1)) {$date1=date('Y-m-d', strtotime($date2. ' + 2 days'));}
else $date1=date('Y-m-d', strtotime($date2. ' + 1 days'));
if($i==12) {$i=0;$year++;$yy++;}

}

$date = date('Y-m-d');
$result1 = array();

for ($j=0; $j <sizeof($rows2['data']) ; $j++) {
  //$data2=$rows2['data'][$j];
  array_push($result1,$rows2['data'][$j]);

}

$result = array();
$resultglo = array();

array_push($result,$rows1);

array_push($resultglo,$result1);
array_push($resultglo,$result);

//print json_encode($result1, JSON_NUMERIC_CHECK);
//print json_encode($result, JSON_NUMERIC_CHECK);
print json_encode($resultglo, JSON_NUMERIC_CHECK);


?>








