<?php

require_once '../inc/database.php';

$sql="TRUNCATE TABLE educations";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo " educations table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$educations = array(
    ['name'=>'B.Arch','sequence'=>'1','stream_id'=>'1'],
    ['name'=>'B.Des','sequence'=>'3','stream_id'=>'1'],
    ['name'=>'B.E/B.Tech','sequence'=>'4','stream_id'=>'1'],
    ['name'=>'B.Pharma','sequence'=>'2','stream_id'=>'1'],
    ['name'=>'M.Arch','sequence'=>'5','stream_id'=>'1'],
    ['name'=>'M.Des','sequence'=>'6','stream_id'=>'1'],
    ['name'=>'M.E/M.Tech','sequence'=>'7','stream_id'=>'1'],
    ['name'=>'M.Pharma','sequence'=>'8','stream_id'=>'1'],
    ['name'=>'M.S.(Engineering)','sequence'=>'9','stream_id'=>'1'],

    ['name'=>'B.IT','sequence'=>'1','stream_id'=>'2'],
    ['name'=>'BCA','sequence'=>'3','stream_id'=>'2'],
    ['name'=>'MCA/PGDCA','sequence'=>'4','stream_id'=>'2'],


    ['name'=>'B.Com','sequence'=>'1','stream_id'=>'3'],
    ['name'=>'CA','sequence'=>'3','stream_id'=>'3'],
    ['name'=>'CFA','sequence'=>'4','stream_id'=>'3'],
    ['name'=>'CS','sequence'=>'2','stream_id'=>'3'],
    ['name'=>'ICWA','sequence'=>'5','stream_id'=>'3'],
    ['name'=>'M.Com','sequence'=>'6','stream_id'=>'3']


   /* ['name'=>'','sequence'=>'1','stream_id'=>'1'],
    ['name'=>'','sequence'=>'3','stream_id'=>'1'],
    ['name'=>'','sequence'=>'4','stream_id'=>'1'],
    ['name'=>'','sequence'=>'2','stream_id'=>'1'],
    ['name'=>'','sequence'=>'5','stream_id'=>'1'],
    ['name'=>'','sequence'=>'6','stream_id'=>'1'],
    ['name'=>'','sequence'=>'7','stream_id'=>'1'],
    ['name'=>'','sequence'=>'8','stream_id'=>'1'],
    ['name'=>'','sequence'=>'9','stream_id'=>'1'],
    ['name'=>'','sequence'=>'10','stream_id'=>'1'],

    ['name'=>'','sequence'=>'1','stream_id'=>'1'],
    ['name'=>'','sequence'=>'3','stream_id'=>'1'],
    ['name'=>'','sequence'=>'4','stream_id'=>'1'],
    ['name'=>'','sequence'=>'2','stream_id'=>'1'],
    ['name'=>'','sequence'=>'5','stream_id'=>'1'],
    ['name'=>'','sequence'=>'6','stream_id'=>'1'],
    ['name'=>'','sequence'=>'7','stream_id'=>'1'],
    ['name'=>'','sequence'=>'8','stream_id'=>'1'],
    ['name'=>'','sequence'=>'9','stream_id'=>'1'],
    ['name'=>'','sequence'=>'10','stream_id'=>'1'],

    ['name'=>'','sequence'=>'1','stream_id'=>'1'],
    ['name'=>'','sequence'=>'3','stream_id'=>'1'],
    ['name'=>'','sequence'=>'4','stream_id'=>'1'],
    ['name'=>'','sequence'=>'2','stream_id'=>'1'],
    ['name'=>'','sequence'=>'5','stream_id'=>'1'],
    ['name'=>'','sequence'=>'6','stream_id'=>'1'],
    ['name'=>'','sequence'=>'7','stream_id'=>'1'],
    ['name'=>'','sequence'=>'8','stream_id'=>'1'],
    ['name'=>'','sequence'=>'9','stream_id'=>'1'],
    ['name'=>'','sequence'=>'10','stream_id'=>'1'],

    ['name'=>'','sequence'=>'1','stream_id'=>'1'],
    ['name'=>'','sequence'=>'3','stream_id'=>'1'],
    ['name'=>'','sequence'=>'4','stream_id'=>'1'],
    ['name'=>'','sequence'=>'2','stream_id'=>'1'],
    ['name'=>'','sequence'=>'5','stream_id'=>'1'],
    ['name'=>'','sequence'=>'6','stream_id'=>'1'],
    ['name'=>'','sequence'=>'7','stream_id'=>'1'],
    ['name'=>'','sequence'=>'8','stream_id'=>'1'],
    ['name'=>'','sequence'=>'9','stream_id'=>'1'],
    ['name'=>'','sequence'=>'10','stream_id'=>'1'],

    ['name'=>'','sequence'=>'1','stream_id'=>'1'],
    ['name'=>'','sequence'=>'3','stream_id'=>'1'],
    ['name'=>'','sequence'=>'4','stream_id'=>'1'],
    ['name'=>'','sequence'=>'2','stream_id'=>'1'],
    ['name'=>'','sequence'=>'5','stream_id'=>'1'],
    ['name'=>'','sequence'=>'6','stream_id'=>'1'],
    ['name'=>'','sequence'=>'7','stream_id'=>'1'],
    ['name'=>'','sequence'=>'8','stream_id'=>'1'],
    ['name'=>'','sequence'=>'9','stream_id'=>'1'],
    ['name'=>'','sequence'=>'10','stream_id'=>'1'],*/

);

$sql = "INSERT INTO educations (name,sequence,stream_id) VALUES (?,?,?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($educations as $education) {
    $stmt->bind_param("sii", $education['name'], $education['sequence'],$education['stream_id']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into educations table";



