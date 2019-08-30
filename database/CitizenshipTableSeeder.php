<?php

require_once '../app.php';

$sql="TRUNCATE TABLE citizenship";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo " citizenship table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$citizenship = array(
    ['status'=>'Citizen'],
    ['status'=>'Permanent Resident'],
    ['status'=>'Work Permit'],
    ['status'=>'Student Visa'],
    ['status'=>'Temporary Visa']

);

$sql = "INSERT INTO citizenship (status) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($citizenship as $cs) {
    $stmt->bind_param("s", $cs['status']);
    $stmt->execute();

}

echo "<br>";
echo "Data inserted successfully into citizenship table";
