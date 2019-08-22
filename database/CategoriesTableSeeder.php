<?php

require_once '../inc/database.php';

$sql="TRUNCATE TABLE categories";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo " categories table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$categories = array(
    ['name'=>'Most Common','sequence'=>'1'],
    ['name'=>'Administration','sequence'=>'3'],
    ['name'=>'Advertising Media & Entertainment','sequence'=>'4'],
    ['name'=>'Agriculture','sequence'=>'2'],
    ['name'=>'Airline/Aviation','sequence'=>'5'],
    ['name'=>'Architecture','sequence'=>'6'],
    ['name'=>'Arts/Science','sequence'=>'7'],
    ['name'=>'Armed Forces','sequence'=>'8'],
    ['name'=>'Banking & Finance','sequence'=>'9'],
    ['name'=>'BPO & Customer Services','sequence'=>'10'],
    ['name'=>'Civil Services','sequence'=>'11'],
    ['name'=>'Corporate Management Professional','sequence'=>'12'],
    ['name'=>'Doctor','sequence'=>'13'],
    ['name'=>'Education & Training','sequence'=>'14'],
    ['name'=>'Engineering','sequence'=>'15'],
    ['name'=>'Hospitality','sequence'=>'16'],
    ['name'=>'Law Enforcement','sequence'=>'17'],
    ['name'=>'Legal','sequence'=>'18'],
    ['name'=>'Merchant Navy','sequence'=>'19'],
    ['name'=>'Not Working','sequence'=>'20'],
    ['name'=>'Medical & Health Care','sequence'=>'21'],
    ['name'=>'Science & Research','sequence'=>'22'],
    ['name'=>'Software & IT','sequence'=>'23'],
    ['name'=>'Top Management','sequence'=>'24'],
    ['name'=>'Others','sequence'=>'25']

);

$sql = "INSERT INTO categories (name,sequence) VALUES (?,?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($categories as $category) {
    $stmt->bind_param("si", $category['name'], $category['sequence']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into categories table";



