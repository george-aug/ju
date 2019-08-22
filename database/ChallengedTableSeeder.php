<?php

require_once '../inc/database.php';

$sql="TRUNCATE TABLE challenged";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Challenged table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$challenges = array(
    ['status'=>'None'],
    ['status'=>'Physically - From birth'],
    ['status'=>'Physically - Due to accident'],
    ['status'=>'Mentally - From birth'],
    ['status'=>'Mentally - Due to accident']
);

$sql = "INSERT INTO challenged (status) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($challenges as $challenge) {
    $stmt->bind_param("s", $challenge['status']);
    $stmt->execute();

}

echo "<br>";
echo "Data inserted successfully into challenged table";





