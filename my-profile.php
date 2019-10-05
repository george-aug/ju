<?php

include_once 'app.php';
include_once 'checkAuth.php';

if(!isset($_SESSION['pid'])){
    echo $blade->make('matrimony.my-profile');
    exit();
}

$sql="SELECT * FROM profiles WHERE profiles.id ='".$_SESSION['pid']."'";
$result = $mysqli->query($sql);
$profile = $result->fetch_object();

$sql2="SELECT * FROM users WHERE users.id ='".$_SESSION['id']."'";
$result2 = $mysqli->query($sql2);
$user = $result2->fetch_object();

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