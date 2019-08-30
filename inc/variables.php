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
$degrees_arr = getSeedingVars('degrees',$mysqli);
$sectors_arr = getSeedingVars('sectors',$mysqli);
$universities_arr = getSeedingVars('universities',$mysqli);
$occupations_arr = getSeedingVars('occupations',$mysqli);
$diets_arr = getSeedingVars('diets',$mysqli);
$smokes_arr = getSeedingVars('smokes',$mysqli);
$drinks_arr = getSeedingVars('drinks', $mysqli);
$challenges_arr = getSeedingVars('challenged',$mysqli);

$fathers_arr = getSeedingVars('fathers',$mysqli);
$mothers_arr = getSeedingVars('mothers',$mysqli);



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
$degrees = getVariables('degrees',$mysqli);
$sectors = getVariables('sectors',$mysqli);
$universities = getVariables('universities',$mysqli);
$diets = getVariables('diets',$mysqli);
$smokes = getVariables('smokes',$mysqli);
$drinks = getVariables('drinks', $mysqli);
$challenges = getVariables('challenged',$mysqli);

$fathers = getVariables('fathers',$mysqli);
$mothers = getVariables('mothers',$mysqli);
$famAffluence = getVariables('fam_affluence',$mysqli);
$famValues = getVariables('fam_values',$mysqli);
$famTypes = getVariables('fam_types',$mysqli);
$famIncomes = getVariables('fam_incomes',$mysqli);
$complexions = getVariables('complexions',$mysqli);
$bodies = getVariables('bodies',$mysqli);
$bGroups = getVariables('blood_groups',$mysqli);
$thalassemia = getVariables('thalassemia',$mysqli);
$citizenship = getVariables('citizenship',$mysqli);
$hobbies = getVariables('hobbies',$mysqli);
$interests = getVariables('interests',$mysqli);
$states = getVariables('states',$mysqli);
$cities = getVariables('cities',$mysqli);

$fors = getVariables('fors',$mysqli);
//var_dump($languages);

/*Age Variable*/
$age_rows = array();
for($i=18;$i<=72;$i++){
    $age_rows[]=$i;
}

/*Weight Variable*/
$wts = array();
for($i=40;$i<=90;$i++){
    $wts[]=$i;
}

/*
 * Used for HIV and RSA etc
 * Stands for Unknown:Yes:No
 * */
$triple=[0,1,2];

