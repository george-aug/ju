<?php

require_once '../app.php';

$sql="TRUNCATE TABLE sectors";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Degrees table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$sectors = array(
    ['name'=>'Private Sector'],
    ['name'=>'Government/Public Sector'],
    ['name'=>'Civil Services'],
    ['name'=>'Defence'],
    ['name'=>'Business/Self Employed'],
    ['name'=>'Not Working'],
);

$sql = "INSERT INTO sectors (name) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($sectors as $sector) {
    $stmt->bind_param("s", $sector['name']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into sectors table";




