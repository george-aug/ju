<?php

require_once '../app.php';

$sql="TRUNCATE TABLE bodies";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Bodies table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$bodies = array(
    ['type'=>'Slim'],
    ['type'=>'Average'],
    ['type'=>'Athletic'],
    ['type'=>'Heavy']
);

$sql = "INSERT INTO bodies (type) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($bodies as $body) {
    $stmt->bind_param("s", $body['type']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into bodies table";


