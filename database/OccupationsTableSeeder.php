<?php

require_once '../inc/database.php';

$sql="TRUNCATE TABLE occupations";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo " occupations table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$occupations = array(

    ['name'=>'Admin Professional','sequence'=>'1','category_id'=>'2'],
    ['name'=>'Clerk','sequence'=>'3','category_id'=>'2'],
    ['name'=>'Operator/Technician','sequence'=>'4','category_id'=>'2'],
    ['name'=>'Secretary/Front Office','sequence'=>'2','category_id'=>'2'],


    ['name'=>'Actor/Model','sequence'=>'1','category_id'=>'3'],
    ['name'=>'Advertising Professional','sequence'=>'3','category_id'=>'3'],
    ['name'=>'Film/Entertainment Professional','sequence'=>'4','category_id'=>'3'],
    ['name'=>'Journalist','sequence'=>'2','category_id'=>'3'],
    ['name'=>'Media','sequence'=>'5','category_id'=>'3'],
    ['name'=>'PR Professional','sequence'=>'6','category_id'=>'3'],


    ['name'=>'Agriculture Professional','sequence'=>'1','category_id'=>'4'],
    ['name'=>'Farming','sequence'=>'3','category_id'=>'4'],


    /*['name'=>'','sequence'=>'1','category_id'=>'1'],
    ['name'=>'','sequence'=>'3','category_id'=>'1'],
    ['name'=>'','sequence'=>'4','category_id'=>'1'],
    ['name'=>'','sequence'=>'2','category_id'=>'1'],
    ['name'=>'','sequence'=>'5','category_id'=>'1'],
    ['name'=>'','sequence'=>'6','category_id'=>'1'],
    ['name'=>'','sequence'=>'7','category_id'=>'1'],
    ['name'=>'','sequence'=>'8','category_id'=>'1'],
    ['name'=>'','sequence'=>'9','category_id'=>'1'],
    ['name'=>'','sequence'=>'10','category_id'=>'1'],*/


);

$sql = "INSERT INTO occupations (name,sequence,category_id) VALUES (?,?,?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($occupations as $occupation) {
    $stmt->bind_param("sii", $occupation['name'], $occupation['sequence'],$occupation['category_id']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into occupations table";




