<?php

include_once '../app.php';

if(isset($_POST['name'])) {

    $nm = $_POST['name'];
    $pid = $_SESSION['pid'];

    $sql =  $sql = "UPDATE images SET linked =0 WHERE profile_id ='".$pid."' AND filename='".$nm."'";
    $re=$mysqli->query($sql);

    // To be commented coz image has to be deleted by admin
    $img_path = '../uploaded/pics/';
    $tmb_path = '../uploaded/tmb/';

    // Delete Image
    $img_name = $img_path . $nm;
    if (file_exists($img_name)) {
        unlink($img_name);
    }

    // Delete thumbnail
    $tmb_name = $tmb_path .'tn_'. $nm;
    if (file_exists($tmb_name)) {
        unlink($tmb_name);
    }


    echo "DELETED successfully";

}