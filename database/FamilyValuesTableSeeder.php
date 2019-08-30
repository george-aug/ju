<?php

require_once '../app.php';

$sql="TRUNCATE TABLE fam_values";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Fam_values table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$fam_values = array(
    ['name'=>'Orthodox'],
    ['name'=>'Conservative'],
    ['name'=>'Moderate'],
    ['name'=>'Liberal']
);

$sql = "INSERT INTO fam_values (name) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($fam_values as $fam_value) {
    $stmt->bind_param("s", $fam_value['name']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into fam_values table";



