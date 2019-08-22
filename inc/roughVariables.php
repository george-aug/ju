<?php

require_once '../inc/database.php';

/*
 * Creating function to fetch heights from DB
 * */
$conn = $mysqli;
function getHeights($conn){
    $sql= "SELECT * FROM heights";
    $result = $conn->query($sql);

    /*$record=$result->fetch_assoc();
    var_dump($record);*/

    $heights =array();
    while ($record=$result->fetch_assoc()) {
        $heights[] = $record;
    }
    //return json_encode($heights);
    $key= array_rand($heights);
    return $heights[$key]['feet'];
}
echo getHeights($mysqli);

/*
 * Directly fetching heights from DB
 * without creating function
 * */
/*$sql= "SELECT * FROM heights";
$result = $mysqli->query($sql);
$heights =array();
while ($record=$result->fetch_assoc()) {
    $heights[] = $record;
}
echo $key= array_rand($heights);
echo $heights[$key]['feet'];*/


function religions($mysqli){

    $sql= "SELECT * FROM religions";
    $result = $mysqli->query($sql);

    $religions =array();
    while ($record=$result->fetch_assoc()) {
        $religions[] = $record;
    }
    return $religions;

}

/*$religions=religions($mysqli);
echo $x=getRandElement(religions($mysqli));
echo $religions[$x];*/

/*
 * creating $heights variable
 * */
$heights = [
    '1' => "4' 6\"(137 cm)",
    '2' => "4' 7\"(140 cm)",
    '3' => "4' 8\"(142 cm)",
];

$religions = [
    '1' => 'Hindu',
    '2' => 'Muslim',
    '3' => 'Christian',
    '4' => 'Buddhist',
    '5' => 'Sikhs',
    '6' => 'Jain',
    '7' => 'Parsi',
    '8' => 'Jewish',
];

/*$sql= "SELECT * FROM heights";
$result = $mysqli->query($sql);
$heights =array();
while ($record=$result->fetch_assoc()) {
    $heights[] = $record;
}*/

/*$sql= "SELECT * FROM languages";
$result = $mysqli->query($sql);
$languages =array();
while ($record=$result->fetch_assoc()) {
    $languages[] = $record;
}*/

/*$sql= "SELECT * FROM religions";
$result = $mysqli->query($sql);
$religions =array();
while ($record=$result->fetch_assoc()) {
    $religions[] = $record;
}*/

/*$sql= "SELECT * FROM countries";
$result = $mysqli->query($sql);
$countries =array();
while ($record=$result->fetch_assoc()) {
    $countries[] = $record;
}*/

/*$sql= "SELECT * FROM incomes";
$result = $mysqli->query($sql);
$incomes =array();
while ($record=$result->fetch_assoc()) {
    $incomes[] = $record;
}*/

/*$sql= "SELECT * FROM maritals";
$result = $mysqli->query($sql);
$maritals =array();
while ($record=$result->fetch_assoc()) {
    $maritals[] = $record;
}

$sql= "SELECT * FROM mangliks";
$result = $mysqli->query($sql);
$mangliks =array();
while ($record=$result->fetch_assoc()) {
    $mangliks[] = $record;
}

$sql= "SELECT * FROM educations";
$result = $mysqli->query($sql);
$educations =array();
while ($record=$result->fetch_assoc()) {
    $educations[] = $record;
}

$sql= "SELECT * FROM occupations";
$result = $mysqli->query($sql);
$occupations =array();
while ($record=$result->fetch_assoc()) {
    $occupations[] = $record;
}

$sql= "SELECT * FROM diets";
$result = $mysqli->query($sql);
$diets =array();
while ($record=$result->fetch_assoc()) {
    $diets[] = $record;
}

$sql= "SELECT * FROM smokes";
$result = $mysqli->query($sql);
$smokes =array();
while ($record=$result->fetch_assoc()) {
    $smokes[] = $record;
}

$sql= "SELECT * FROM drinks";
$result = $mysqli->query($sql);
$drinks =array();
while ($record=$result->fetch_assoc()) {
    $drinks[] = $record;
}

$sql= "SELECT * FROM challenged";
$result = $mysqli->query($sql);
$challenges =array();
while ($record=$result->fetch_assoc()) {
    $challenges[] = $record;
}*/


$manglikStatus = [
    '0' => 'Non-Manglik',
    '1' => 'Manglik',
    '2' => 'Angshik(Partial Manglik)'
];

$tell = [
    '0' => 'No',
    '1' => 'Yes',
    '2' => 'Occasionally'
];

$photo = [0,1,1];






