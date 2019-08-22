<?php

include_once 'app.php';

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged-in"]) || $_SESSION["logged-in"] !== true){
    header("location: login.php");
    exit;
}

$sqlN="SELECT id, profile_no as pno, gender FROM profiles JOIN profile_user ON profiles.id = profile_user.profile_id WHERE  user_id='".$_SESSION['id']."'";

$results=$mysqli->query($sqlN);
$num= mysqli_num_rows($results);
$profiles =array();
while ($record=$results->fetch_object()) {
    $profiles[] = $record;
}

//var_dump($profiles);

echo $blade->make('matrimony.matrimony',[
    'profiles'=>$profiles,
    'num'=>$num
]);