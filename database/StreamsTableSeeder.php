<?php

require_once '../inc/database.php';

$sql="TRUNCATE TABLE streams";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo " streams table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$streams = array(
    ['name'=>'Engineering/Design','sequence'=>'1'],
    ['name'=>'Computers','sequence'=>'3'],
    ['name'=>'Finance/Commerce','sequence'=>'4'],
    ['name'=>'Management','sequence'=>'2'],
    ['name'=>'Medicine','sequence'=>'5'],
    ['name'=>'Law','sequence'=>'6'],
    ['name'=>'Arts/Science','sequence'=>'7'],
    ['name'=>'Doctorate','sequence'=>'8'],
    ['name'=>'Non-Graduate','sequence'=>'9'],
    ['name'=>'Others','sequence'=>'10'],
);

$sql = "INSERT INTO streams (name,sequence) VALUES (?,?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($streams as $stream) {
    $stmt->bind_param("si", $stream['name'], $stream['sequence']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into streams table";


