<?php
$conn = mysqli_connect("localhost","my_user","my_password","my_db");

if (!$conn) {
  die('Could not connect: ' . mysql_error());
}

$sth = $conn->query("SELECT datetime FROM temphumi WHERE chipid=200");
$rows = array();
$rows['name'] = 'datetime';
while($r = mysqli_fetch_array($sth)) {
    $rows['data'][] = $r['datetime'];
}

$sth = $conn->query("SELECT chipid FROM temphumi WHERE chipid=200");
$rows1 = array();
$rows1['name'] = 'chipid';
while($rr = mysqli_fetch_array($sth)) {
    $rows1['data'][] = $rr['chipid'];
}

$sth = $conn->query("SELECT temperature FROM temphumi WHERE chipid=200");
$rows2 = array();
$rows2['name'] = 'temperature';
while($rrr = mysqli_fetch_array($sth)) {
    $rows2['data'][] = $rrr['temperature'];
}

$sth = $conn->query("SELECT humidity FROM temphumi WHERE chipid=200");
$rows3 = array();
$rows3['name'] = 'humidity';
while($rrrr = mysqli_fetch_array($sth)) {
    $rows3['data'][] = $rrrr['humidity'];
}

//

//

$sth = $conn->query("SELECT datetime FROM temphumi WHERE chipid=2800");
$rowsX = array();
$rowsX['name'] = 'datetime';
while($r = mysqli_fetch_array($sth)) {
    $rowsX['data'][] = $r['datetime'];
}

$sth = $conn->query("SELECT chipid FROM temphumi WHERE chipid=2800");
$rowsX11 = array();
$rowsX1['name'] = 'chipid';
while($rr = mysqli_fetch_array($sth)) {
    $rowsX1['data'][] = $rr['chipid'];
}

$sth = $conn->query("SELECT temperature FROM temphumi WHERE chipid=2800");
$rowsX2 = array();
$rowsX2['name'] = 'temperature';
while($rrr = mysqli_fetch_array($sth)) {
    $rowsX2['data'][] = $rrr['temperature'];
}

$sth = $conn->query("SELECT humidity FROM temphumi WHERE chipid=2800");
$rowsX3 = array();
$rowsX3['name'] = 'humidity';
while($rrrr = mysqli_fetch_array($sth)) {
    $rowsX3['data'][] = $rrrr['humidity'];
}



$result = array();

array_push($result,$rows);
array_push($result,$rows1);
array_push($result,$rows2);
array_push($result,$rows3);

array_push($result,$rowsX);
array_push($result,$rowsX1);
array_push($result,$rowsX2);
array_push($result,$rowsX3);

print json_encode($result, JSON_NUMERIC_CHECK);


mysqli_close($conn);
?>
