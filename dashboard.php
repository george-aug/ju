<?php

include_once 'app.php';
//var_dump($_SESSION);
//exit();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged-in"]) || $_SESSION["logged-in"] !== true){
    header("location: login.php");
    exit;
}

$sql= "SELECT * FROM profiles WHERE id ='".$_SESSION['mid']."'";

$result = $mysqli->query($sql);
$profile = $result->fetch_object();

//var_dump($_SESSION);

echo $blade->make('matrimony.dashboard',['profile'=>$profile]);