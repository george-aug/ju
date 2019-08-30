<?php

require_once '../app.php';

$sql="TRUNCATE  TABLE complexions";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Complexions table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$complexions = array(
    ['type'=>'Very Fair'],
    ['type'=>'Fair'],
    ['type'=>'Wheatish'],
    ['type'=>'Wheatish Brown'],
    ['type'=>'Dark']
);

$sql = "INSERT INTO complexions (type) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($complexions as $complexion) {
    $stmt->bind_param("s", $complexion['type']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into complexions table";


