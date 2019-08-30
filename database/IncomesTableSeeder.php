<?php

require_once '../app.php';

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
    ['level'=>'Rs. 0','ranze'=>'No Income'],
    ['level'=>'Rs.1 Lakh','ranze'=>'1-2 Lakh'],
    ['level'=>'Rs.2 Lakh','ranze'=>'2-3 Lakh'],
    ['level'=>'Rs.3 Lakh','ranze'=>'3-4 Lakh'],
    ['level'=>'Rs.4 Lakh','ranze'=>'4-5 Lakh'],
    ['level'=>'Rs.5 Lakh','ranze'=>'5-7 Lakh'],
    ['level'=>'Rs.7 Lakh','ranze'=>'7-10 Lakh'],
    ['level'=>'Rs.10 Lakh','ranze'=>'10-15 Lakh']
);

$sql = "INSERT INTO incomes (level,ranze) VALUES (?,?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($incomes as $income) {
    $stmt->bind_param("ss", $income['level'],$income['ranze']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into incomes table";


