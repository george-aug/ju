<?php

require_once '../app.php';

$sql="TRUNCATE TABLE degrees";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Degrees table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$degrees = array(
    ['name'=>'B.Des'],
    ['name'=>'BE/B.Tech'],
    ['name'=>'B.Ed'],
    ['name'=>'B.IT'],
    ['name'=>'B.Pharma'],
    ['name'=>'BAMS'],
    ['name'=>'BUMS'],
    ['name'=>'BDS'],
    ['name'=>'BA'],
    ['name'=>'B.Sc'],
    ['name'=>'MBBS']
);

$sql = "INSERT INTO degrees (name) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($degrees as $degree) {
    $stmt->bind_param("s", $degree['name']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into degrees table";



