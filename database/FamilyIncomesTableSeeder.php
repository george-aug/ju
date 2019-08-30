<?php

require_once '../app.php';

$sql="TRUNCATE TABLE fam_incomes";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo " fam_incomes table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$fam_incomes = array(
    ['level'=>'1-2 Lakh'],
    ['level'=>'2-3 Lakh'],
    ['level'=>'3-4 Lakh'],
    ['level'=>'4-5 Lakh'],
    ['level'=>'5-7 Lakh'],
    ['level'=>'7-10 Lakh'],
    ['level'=>'10-15 Lakh']
);

$sql = "INSERT INTO fam_incomes (level) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($fam_incomes as $fam_income) {
    $stmt->bind_param("s", $fam_income['level']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into fam_incomes table";



