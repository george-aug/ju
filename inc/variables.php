<?php

/*
 * Note:
 * To be included only during testing inc folder files separately
 * Comment it out after testing
 * */
/*require_once 'env.php';
require_once 'database.php';*/

function getSeedingVars($tbl, $conn){

    $sql= "SELECT * FROM $tbl";
    $result = $conn->query($sql);
    $array =array();
    while ($record=$result->fetch_assoc()) {
        $array[] = $record;
    }
    return $array;
}

$heights_arr = getSeedingVars('heights',$mysqli);
$languages_arr = getSeedingVars('languages',$mysqli);
$religions_arr = getSeedingVars('religions',$mysqli);
$countries_arr = getSeedingVars('countries',$mysqli);
$incomes_arr = getSeedingVars('incomes',$mysqli);
$maritals_arr = getSeedingVars('maritals',$mysqli);
$mangliks_arr = getSeedingVars('mangliks',$mysqli);
$educations_arr = getSeedingVars('educations',$mysqli);
$occupations_arr = getSeedingVars('occupations',$mysqli);
$diets_arr = getSeedingVars('diets',$mysqli);
$smokes_arr = getSeedingVars('smokes',$mysqli);
$drinks_arr = getSeedingVars('drinks', $mysqli);
$challenges_arr = getSeedingVars('challenged',$mysqli);



function getVariables($tbl, $conn){

    $sql= "SELECT * FROM $tbl";
    $result = $conn->query($sql);
    $array =array();
    while ($record=$result->fetch_object()) {
        $array[] = $record;
    }
    return $array;
}

$heights = getVariables('heights',$mysqli);
$languages = getVariables('languages',$mysqli);
$religions = getVariables('religions',$mysqli);
$countries = getVariables('countries',$mysqli);
$incomes = getVariables('incomes',$mysqli);
$maritals = getVariables('maritals',$mysqli);
$mangliks = getVariables('mangliks',$mysqli);
$educations = getVariables('educations',$mysqli);
$occupations = getVariables('occupations',$mysqli);
$diets = getVariables('diets',$mysqli);
$smokes = getVariables('smokes',$mysqli);
$drinks = getVariables('drinks', $mysqli);
$challenges = getVariables('challenged',$mysqli);

//var_dump($languages);

$age_rows = array();
for($i=18;$i<=72;$i++){
    $age_rows[]=$i;
}

$triple=[0,1,2]; // Unknown:Yes:No

