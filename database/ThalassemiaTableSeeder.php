<?php

require_once '../app.php';

$sql="TRUNCATE TABLE thalassemia";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo " thalassemia table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$thalassemia = array(
    ['status'=>'Major'],
    ['status'=>'Minor'],
    ['status'=>'No'],
);

$sql = "INSERT INTO thalassemia (status) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($thalassemia as $thal) {
    $stmt->bind_param("s", $thal['status']);
    $stmt->execute();

}

echo "<br>";
echo "Data inserted successfully into thalassemia table";



