<?php

include_once 'app.php';

$sql = "SELECT * FROM problems";
$result = $mysqli->query($sql);
$problems =array();
while ($record=$result->fetch_object()) {
    $problems[] = $record;
}

echo $blade->make('problems',[
    'problems'=>$problems,
]);