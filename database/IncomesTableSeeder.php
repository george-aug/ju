<?php

require_once '../inc/database.php';

$sql="TRUNCATE TABLE incomes";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo " incomes table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$incomes = array(
    ['level'=>'Rs. 0'],
    ['level'=>'Rs.1 Lakh'],
    ['level'=>'Rs.2 Lakh'],
    ['level'=>'Rs.3 Lakh'],
    ['level'=>'Rs.4 Lakh'],
    ['level'=>'Rs.5 Lakh'],
    ['level'=>'Rs.7 Lakh'],
    ['level'=>'Rs.10 Lakh']
);

$sql = "INSERT INTO incomes (level) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($incomes as $income) {
    $stmt->bind_param("s", $income['level']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into incomes table";


