<?php

include_once '../app.php';

if(isset($_POST['userId'])){

    $userId = $_POST['userId'];

    $sql="SELECT * FROM users WHERE id='$userId'";
    $res=$mysqli->query($sql);
    $user = $res->fetch_object();

    if($user->refid==null){
        $selector = bin2hex(random_bytes(8));
        $sql="UPDATE users SET refid='$selector' WHERE id='$userId' ";
        $mysqli->query($sql);
        echo $selector;
    }else{
        echo 'already done';
    }

}
