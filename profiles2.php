<?php

require_once 'app.php';

$usi = isset($_SESSION['id'])?$_SESSION['id']:'';
$gen = isset($_SESSION['gen'])?$_SESSION['gen']:'';
$connArr =array();
$favArr =array();
$hideArr =array();

$sql = "SELECT
    profiles.id,
    profiles.profile_no,
    profiles.photo,
    profiles.first_name,
    profiles.last_name,
    profiles.gender,
    profiles.dob,
    
    heights.feet as ht, 
    religions.name as religen,
    languages.name as lang,
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
    JOIN languages ON languages.id = profiles.language_id
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
    
    JOIN profile_user ON profile_user.profile_id = profiles.id
   
    WHERE profiles.gender != '".$gen."' 
    AND profile_user.user_id != '".$usi."'
    ORDER BY profiles.id";

$result = $mysqli->query($sql);
$total = mysqli_num_rows($result);
$profiles =array();
while ($record=$result->fetch_object()) {
    $profiles[] = $record;
}

if(isset($_SESSION['mid'])){
    $sql1= "SELECT profile_id FROM connect_profile WHERE matri_id='".$_SESSION['mid']."'";
    $res1 = $mysqli->query($sql1);
    $rc1 = mysqli_num_rows($res1);

    if($rc1>0){
        while ($record=$res1->fetch_object()) {
            $connArr[] = $record->profile_id;
        }
    }
}

if(isset($_SESSION['mid'])){
    $sql2= "SELECT profile_id FROM hide_profile WHERE matri_id='".$_SESSION['mid']."'";
    $res2 = $mysqli->query($sql2);
    $rc2 = mysqli_num_rows($res2);

    if($rc2>0){
        while ($record=$res2->fetch_object()) {
            $hideArr[] = $record->profile_id;
        }
    }
}

if(isset($_SESSION['mid'])){
    $sql3= "SELECT profile_id FROM fav_profile WHERE matri_id='".$_SESSION['mid']."'";
    $res3 = $mysqli->query($sql3);
    $rc3 = mysqli_num_rows($res3);

    if($rc3>0){
        while ($record=$res3->fetch_object()) {
            $favArr[] = $record->profile_id;
        }
    }
}
//var_dump($_SESSION);
//var_dump($rc);
//var_dump($hideArr);

//var_dump(json_encode($profiles));

echo $blade->make('profiles2',['profiles'=>$profiles,'total'=>$total,'hideArr'=>$hideArr,'favArr'=>$favArr,'connArr'=>$connArr]);