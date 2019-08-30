<?php

include_once 'app.php';
include_once 'authenticate.php';

$sqlN="SELECT 
        profiles.id,
        profiles.dob,
        profiles.profile_no as pno, 
        profiles.first_name,
        profiles.last_name, 
        profiles.gender,
        profiles.created_at,
        fors.name as cfor
        
        FROM profiles
        JOIN fors ON fors.id = profiles.for_id
        JOIN profile_user ON profiles.id = profile_user.profile_id WHERE user_id='".$_SESSION['id']."'";
$results=$mysqli->query($sqlN);
$num= mysqli_num_rows($results);
$profiles =array();
while ($record=$results->fetch_object()) {
    $profiles[] = $record;
}
var_dump($profiles);

$sql2="SELECT * FROM users WHERE id='".$_SESSION['id']."'";
$result2=$mysqli->query($sql2);
$user = $result2->fetch_object();



if(isset($_GET['ref']) && $_GET['ref']!=null){
    $cc = $user->click_count+1;
    $sql3="UPDATE users SET click_count='$cc' WHERE refid='".$_GET['ref']."'";
    $mysqli->query($sql3);
}

echo $blade->make('matrimony.matrimony',[
    'profiles'=>$profiles,
    'num'=>$num,
    'user'=>$user
]);