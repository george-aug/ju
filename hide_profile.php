<?php

include_once 'app.php';

//$pid = $_POST['pid'];
//echo $pid;

if(isset($_POST['pid'])){

    $matri_id = $_SESSION['mid'];
    $profile_id = $_POST['pid'];

    $sql ="INSERT INTO hide_profile(matri_id,profile_id) VALUES ($matri_id,$profile_id)";
    $res = $mysqli->query($sql);
    echo $res;

}

