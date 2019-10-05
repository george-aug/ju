<?php

include_once 'app.php';
include_once 'checkAuth.php';

/*
 * Profile of logged in user
 * */
$sql1="SELECT profiles.*,fors.name as cfor FROM profiles 
        JOIN fors ON fors.id=profiles.for_id
        WHERE user_id='".$_SESSION['id']."'
";
$result1 = $mysqli->query($sql1);
$num = mysqli_num_rows($result1);
$profile = $result1->fetch_object();

/*
 * User info of logged in user
 * */
$sql2="SELECT * FROM users WHERE id='".$_SESSION['id']."'";
$result2=$mysqli->query($sql2);
$user = $result2->fetch_object();

if(isset($_GET['ref']) && $_GET['ref']!=null){

    $sql3="SELECT * FROM users WHERE ref='".$_GET['ref']."'";
    $re=$mysqli->query($sql3);
    $refUser = $re->fetch_object();

    $cc = $refUser->click_count+1;
    $sql4="UPDATE users SET click_count='$cc' WHERE ref='".$_GET['ref']."' AND id !='".$_SESSION['id']."'";
    $mysqli->query($sql4);
}

echo $blade->make('matrimony.matrimony',[
    'profile'=>$profile,
    'num'=>$num,
    'user'=>$user,
    'religions'=>$religions,
    'languages'=>$languages
]);