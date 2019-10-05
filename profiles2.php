<?php

include_once 'app.php';

/*
 * Fetch Profiles logged-in user as well as guest user
 * */
include_once 'sql_profiles.php';

$result = $mysqli->query($sql);
$total = mysqli_num_rows($result);
$profiles =array();
while ($record=$result->fetch_object()) {
    $profiles[] = $record;
}


$connArr =array();
$favArr =array();
$hideArr =array();

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

/*
 * For Testing Purpose
 * */
var_dump($_SESSION);
//var_dump($rc);
//var_dump($hideArr);
//var_dump($profiles);
//var_dump(json_encode($profiles));


/*
 * Blade Template
 * */
echo $blade->make('profiles2',['profiles'=>$profiles,'total'=>$total,'hideArr'=>$hideArr,'favArr'=>$favArr,'connArr'=>$connArr]);