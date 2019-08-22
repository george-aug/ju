<?php

require_once '../inc/database.php';

$sql="TRUNCATE  TABLE countries";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Countries table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$countries = array(
    ['name'=>'India'],
    ['name'=>'Australia'],
    ['name'=>'Canada'],
    ['name'=>'United Arab'],
    ['name'=>'United Kingdom'],
    ['name'=>'United States'],
    ['name'=>'France'],
    ['name'=>'Fiji'],
    ['name'=>'Myanmar'],
    ['name'=>'Malaysia']
);

$sql = "INSERT INTO countries (name) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($countries as $country) {
    $stmt->bind_param("s", $country['name']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into countries table";


