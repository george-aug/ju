<?php

require_once 'app.php';

if (isset($_GET['pno'])) {
    $pno = $_GET['pno'];
} else {
    $pno = 1;
}

$rpp = 10;
$offset = ($pno-1) * $rpp;

$sq = "SELECT * FROM rups ORDER BY id ASC";
$res = $mysqli->query($sq);
$num = mysqli_num_rows($res);
$pages = ceil($num / $rpp);

$sql = "SELECT * FROM rups ORDER BY id ASC LIMIT $offset,$rpp";
$result = $mysqli->query($sql);

$rups =array();
while ($record=$result->fetch_object()) {
    $rups[] = $record;
}

echo $blade->make('rups',['rups'=>$rups,'num'=>$num,'pno'=>$pno,'pages'=>$pages]);
