<?php
$con = new mysqli('localhost', 'root', '', 'chart');

$sql1 = <<<SQL
    SELECT revenue FROM `projections_sample`
SQL;

$sth1 = $con->query($sql1);

$rows1 = array();
$rows1['name'] = 'Revenue';

while($r = $sth1->fetch_assoc()){
    $rows1['data'][] = $r['revenue'];
}


$sql2 = <<<SQL
    SELECT overhead FROM `projections_sample`
SQL;

$sth2 = $con->query($sql2);

$rows2 = array();
$rows2['name'] = 'Overhead';

while($rr = $sth2->fetch_assoc()){
    $rows2['data'][] = $rr['overhead'];
}


$sql3 = <<<SQL
    SELECT valeur FROM `projections_sample`
SQL;

$sth3 = $con->query($sql3);

$rows3 = array();
$rows3['name'] = 'Valeur';

while($rrr = $sth3->fetch_assoc()){
    $rows3['data'][] = $rrr['valeur'];
}

$result = array();
array_push($result,$rows1);
array_push($result,$rows2);
array_push($result, $rows3);


print json_encode($result, JSON_NUMERIC_CHECK);

?>
