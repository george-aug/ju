<?php

include_once 'app.php';

//$pid = $_POST['pid'];
//echo $pid;

if(isset($_POST['pid'])){

    $matri_id = $_SESSION['mid'];
    $profile_id = $_POST['pid'];

    $sql ="INSERT INTO connect_profile(matri_id,profile_id) VALUES (?,?)";
    $stmt=$mysqli->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param( "ii", $matri_id, $profile_id);
    $stmt->execute();

    echo $profile_id;

}