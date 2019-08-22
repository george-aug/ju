<?php

require_once '../inc/database.php';

$sql="TRUNCATE  TABLE religions";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo " Religions table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$religions = array(
    ['name'=>'Hindu','rank'=>'1'],
    ['name'=>'Muslim','rank'=>'3'],
    ['name'=>'Christian','rank'=>'4'],
    ['name'=>'Buddhist','rank'=>'2'],
    ['name'=>'Sikhs','rank'=>'5'],
    ['name'=>'Jain','rank'=>'6'],
    ['name'=>'Parsi','rank'=>'7'],
    ['name'=>'Jewish','rank'=>'8']
);

$sql = "INSERT INTO religions (name,rank) VALUES (?,?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($religions as $religion) {
    $stmt->bind_param("si", $religion['name'], $religion['rank']);
    $stmt->execute();

}

echo "<br>";
echo "Data inserted successfully into religions table";


