<?php

include_once 'app.php';
//var_dump($_SESSION);
//exit();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged-in"]) || $_SESSION["logged-in"] !== true){
    header("location: login.php");
    exit;
}

/*$sql= "SELECT
    profiles.profile_no as pno,
    profiles.first_name as fn,
    profiles.last_name as ln,
    profiles.gender,
    profiles.dob,
    profiles.marital_id,
    heights.feet as ht,
    religions.name as rel,
    languages.name as mt,
    incomes.level as inc

    FROM profiles  
    LEFT JOIN heights ON heights.id = profiles.height_id
    LEFT JOIN religions ON religions.id = profiles.religion_id
    LEFT JOIN languages ON languages.id = profiles.language_id
    LEFT JOIN incomes ON incomes.id = profiles.income_id

    WHERE profiles.id ='".$_SESSION['mid']."'
 ";*/

$sql="SELECT * FROM profiles WHERE profiles.id ='".$_SESSION['mid']."'";

$result = $mysqli->query($sql);
$profile = $result->fetch_object();

$sql2="SELECT * FROM users WHERE users.id ='".$_SESSION['id']."'";

$result2 = $mysqli->query($sql2);
$user = $result2->fetch_object();

//var_dump($_SESSION);
/*var_dump($profile);
echo '<br>';
var_dump($maritals);*/

echo $blade->make('matrimony.my-profile',
    [
        'profile'=>$profile,
        'user'=>$user,
        'maritals'=>$maritals,
        'religions'=>$religions,
        'languages'=>$languages,
        'heights'=>$heights,
        'educations'=>$educations,
        'degrees'=>$degrees,
        'sectors'=>$sectors,
        'occupations'=>$occupations,
        'universities'=>$universities,
        'incomes'=>$incomes,
        'fathers'=>$fathers,
        'mothers'=>$mothers,
        'famAffluence'=>$famAffluence,
        'famValues'=>$famValues,
        'famTypes'=>$famTypes,
        'famIncomes'=>$famIncomes,
        'diets'=>$diets,
        'smokes'=>$smokes,
        'drinks'=>$drinks,
        'bodies'=>$bodies,
        'complexions'=>$complexions,
        'wts'=>$wts,
        'challenges'=>$challenges,
        'bGroups'=>$bGroups,
        'thalassemia'=>$thalassemia,
        'citizenship'=>$citizenship,
        'hobbies'=>$hobbies,
        'interests'=>$interests,
        'states'=>$states,
        'cities'=>$cities,
        'mangliks'=>$mangliks
    ]);