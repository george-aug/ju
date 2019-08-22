<?php

/*$un= $_POST['un'];
echo $un;*/

include_once '../app.php';

//$pid = $_POST['pid'];
//echo $pid;

if(isset($_POST['un'])){

    $un = $_POST['un'];
    $userId = $_SESSION['id'];
    $sql = "UPDATE users SET username =? WHERE id = '$userId'";
    $stmt=$mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        $i = 0;
        $ht = '<span class="text-warning">Server busy! try later</span>';

    }else{
        $stmt->bind_param( "s", $un);
        $stmt->execute();
        $_SESSION['username']=$un;
        $i = 1;
        $ht = '<span class="text-success">Congrats! Username Saved</span>';
        //?
        //?
        //? checking of this part of code is necessary
    }
    $re = ['i'=>$i,'ht'=>$ht];
    echo json_encode($re);
}

