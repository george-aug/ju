<?php

require_once '../app.php';

$sql="TRUNCATE TABLE fam_types";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Fam_types table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$fam_types = array(
    ['name'=>'Joint'],
    ['name'=>'Nuclear'],
    ['name'=>'Others']
);

$sql = "INSERT INTO fam_types (name) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($fam_types as $type) {
    $stmt->bind_param("s", $type['name']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into fam_types table";



