<?php

require_once '../inc/database.php';

$sql="TRUNCATE TABLE answers";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Answers table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$answers = array(
    ['status'=>'Yes'],
    ['status'=>'No'],
    ['status'=>'Occasionally']
);

$sql = "INSERT INTO answers (status) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($answers as $answer) {
    $stmt->bind_param("s", $answer['status']);
    $stmt->execute();

}

echo "<br>";
echo "Data inserted successfully into answers table";




