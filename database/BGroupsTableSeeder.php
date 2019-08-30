<?php

require_once '../app.php';

$sql="TRUNCATE  TABLE blood_groups";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Blood Groups table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$blood_groups = array(
    ['type'=>'A+'],
    ['type'=>'A-'],
    ['type'=>'B+'],
    ['type'=>'B-'],
    ['type'=>'AB+'],
    ['type'=>'AB-'],
    ['type'=>'O+'],
    ['type'=>'O-']
);

$sql = "INSERT INTO blood_groups (type) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($blood_groups as $blood_group) {
    $stmt->bind_param("s", $blood_group['type']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into blood_groups table";



