<?php
$religionsAry=array();
$maritalsAry=array();
$locations=array();
$getters=array();
$queries=array();

foreach ($_GET as $key => $value) {
$temp = is_array($value) ? $value : trim($value);
var_dump($temp);
echo "<br>";

//exit();

if(!empty($temp)) {
var_dump(list($key)=explode("-",$key));
}

if ($key == 'srch_mar'){
array_push($maritalsAry,$value);
}

if ($key == 'srch_rel'){
array_push($religionsAry,$value);
/*foreach($_GET['srch_rel'] as $key =>$value){
array_push($religionsAry,$value);
}*/
}

if (!in_array($key,$getters)){
$getters[$key]=$value;
}


echo "<br>";
echo "<br>";
}

echo "<br>";
echo "<br>";
var_dump($maritalsAry);
echo "<br>";
var_dump($religionsAry);
echo "<br>";
var_dump($getters);
echo "<br>";


exit();

//============================================================


$usi = isset($_SESSION['id'])?$_SESSION['id']:'0';
$gen = isset($_SESSION['gen'])?$_SESSION['gen']:'0';

$sql = "SELECT
    profiles.id,
    profiles.pno,
    profiles.user_id,
    profiles.photo,
    profiles.first_name,
    profiles.last_name,
    profiles.gender,
    profiles.dob,
    
    heights.feet as ht, 
    religions.name as religen,
    languages.text as lang,
    countries.name as country,
    incomes.level as income,
    maritals.status as mstatus,
    mangliks.status as manglik,
    
    profiles.horoscope, 
    educations.name as edu,
    occupations.name as occ,
    diets.type as diet,
    smokes.status as smoke,
    drinks.status as drink,
    challenged.status as challeng,    
    
    profiles.hiv,
    profiles.rsa
    
    FROM profiles
    
    JOIN heights ON heights.id = profiles.height_id
    JOIN religions ON religions.id = profiles.religion_id
    JOIN languages ON languages.value = profiles.language_id
    JOIN countries ON countries.id = profiles.country_id
    JOIN incomes ON incomes.id = profiles.income_id
    JOIN maritals ON maritals.id = profiles.marital_id
    JOIN mangliks ON mangliks.id = profiles.manglik_id
    
    JOIN educations ON educations.id = profiles.education_id
    JOIN occupations ON occupations.id = profiles.occupation_id
    
    JOIN diets ON diets.id = profiles.diet_id
    JOIN smokes ON smokes.id = profiles.smoke_id
    JOIN drinks ON drinks.id = profiles.drink_id
    JOIN challenged ON challenged.id = profiles.challenged_id
   
    WHERE profiles.gender != '".$gen."' 
    AND profiles.user_id != '".$usi."'
    ORDER BY profiles.id";


