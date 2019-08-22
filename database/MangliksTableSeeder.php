<?php

require_once '../inc/database.php';

$sql="TRUNCATE TABLE mangliks";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo " mangliks table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$mangliks = array(
    ['status'=>'Non-Manglik'],
    ['status'=>'Manglik'],
    ['status'=>'Angshik(Partial Manglik)']
);

$sql = "INSERT INTO mangliks (status) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($mangliks as $manglik) {
    $stmt->bind_param("s", $manglik['status']);
    $stmt->execute();

}

echo "<br>";
echo "Data inserted successfully into mangliks table";


