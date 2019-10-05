<?php
include_once '../app.php';
if(isset($_POST['name'])) {

    $profileId = $_SESSION['pid'];
    $fileName = $_POST['name'];
    //echo $fileName;

    $sql0 = "UPDATE images SET pp=0 WHERE profile_id = '".$profileId."'";
    $re=$mysqli->query($sql0);

    $sql = "UPDATE images SET pp=1 WHERE profile_id = '".$profileId."' AND filename='".$fileName."'";
    $re=$mysqli->query($sql);
    if($re){
        echo "Record updated Successfully";
    }else{
        echo "Problem with server";
    }

}