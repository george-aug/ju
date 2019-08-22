<?php

require_once '../inc/database.php';

$sql="TRUNCATE TABLE maritals";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo " maritals table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$maritals = array(
    ['status'=>'Never married'],
    ['status'=>'Awaiting Divorce'],
    ['status'=>'Divorced'],
    ['status'=>'Widowed'],
    ['status'=>'Annulled'],
);

$sql = "INSERT INTO maritals (status) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($maritals as $marital) {
    $stmt->bind_param("s", $marital['status']);
    $stmt->execute();

}

echo "<br>";
echo "Data inserted successfully into maritals table";


