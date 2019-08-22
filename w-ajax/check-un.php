<?php

include_once '../app.php';

//if(isset($_POST['un'])){
//
//    $un = $_POST['un'];
//    //echo $un;
//    //$sql= "SELECT * FROM users WHERE username = '".$_POST['user_name']."'";
//    $sql= "SELECT * FROM users WHERE username ='$un'";
//
//    $result = $mysqli->query($sql);
//    $num = mysqli_num_rows($result);
//    //var_dump($num);
//    if($num>0){
//        echo '<span class="text-danger">Unavailable</span>';
//    }else{
//        echo '<span class="text-success">Available</span>';
//    }
//}

if(isset($_POST['un']) && $_POST['un']!='' ){

    $un = $_POST['un'];

    if($un==''){
        $n=0;
        $ht = '<span class="text-info">Empty value</span>';
    }
    else{
        $sql= "SELECT * FROM users WHERE username ='$un'";
        $result = $mysqli->query($sql);
        $num = mysqli_num_rows($result);
        //var_dump($num);
        if($num>0){
            $n=0;
            $ht = '<span class="text-danger">Unavailable</span>';
        }else{
            $n=1;
            $ht = '<span class="text-success">Available</span>';
        }
    }
}

$re = ['n'=>$n,'ht'=>$ht];
echo json_encode($re);