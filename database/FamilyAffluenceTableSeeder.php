<?php

require_once '../app.php';

$sql="TRUNCATE TABLE affluence";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Affluence table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$affluence = array(
    ['status'=>'Rich/Affluent'],
    ['status'=>'Upper Middle'],
    ['status'=>'Middle']
);

$sql = "INSERT INTO affluence (status) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($affluence as $affluence) {
    $stmt->bind_param("s", $affluence['status']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into affluence table";



