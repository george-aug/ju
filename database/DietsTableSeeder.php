<?php

require_once '../inc/database.php';

$sql="TRUNCATE TABLE diets";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo " Diets table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$diets = array(
    ['status'=>'Vegetarian'],
    ['status'=>'Non-Vegetarian'],
    ['status'=>'Eggetarian'],
    ['status'=>'Jain']
);

$sql = "INSERT INTO diets (status) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($diets as $diet) {
    $stmt->bind_param("s", $diet['status']);
    $stmt->execute();

}

echo "<br>";
echo "Data inserted successfully into diets table";



