<?php

require_once '../app.php';

$sql="TRUNCATE TABLE mothers";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Mothers table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$mothers = array(
    ['status'=>'House Wife'],
    ['status'=>'Business Entrepreneur'],
    ['status'=>'Service-Private'],
    ['status'=>'Service-Govt/PSU'],
    ['status'=>'Army/Armed Forces'],
    ['status'=>'Civil Services'],
    ['status'=>'Teacher'],
    ['status'=>'Retired'],
    ['status'=>'Expired']
);

$sql = "INSERT INTO mothers (status) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($mothers as $mother) {
    $stmt->bind_param("s", $mother['status']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into mothers table";



