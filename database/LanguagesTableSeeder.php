<?php

require_once '../inc/database.php';

$sql="TRUNCATE TABLE languages";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo " Languages table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$languages = array(
    ['name'=>'Hindi','rank'=>'1'],
    ['name'=>'Bihari','rank'=>'3'],
    ['name'=>'Kashmiri','rank'=>'4'],
    ['name'=>'Gujarati','rank'=>'2'],
    ['name'=>'Marathi','rank'=>'5'],
    ['name'=>'Bengali','rank'=>'6'],
    ['name'=>'Sindhi','rank'=>'7'],
    ['name'=>'Assamese','rank'=>'8']
);

$sql = "INSERT INTO languages (name,rank) VALUES (?,?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($languages as $language) {
    $stmt->bind_param("si", $language['name'], $language['rank']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into languages table";


