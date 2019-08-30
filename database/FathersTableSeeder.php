<?php

require_once '../app.php';

$sql="TRUNCATE TABLE fathers";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Fathers table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$fathers = array(
    ['status'=>'Business Entrepreneur'],
    ['status'=>'Service-Private'],
    ['status'=>'Service-Govt/PSU'],
    ['status'=>'Army/Armed Forces'],
    ['status'=>'Civil Services'],
    ['status'=>'Teacher'],
    ['status'=>'Retired'],
    ['status'=>'Expired']
);

$sql = "INSERT INTO fathers (status) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($fathers as $father) {
    $stmt->bind_param("s", $father['status']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into fathers table";



