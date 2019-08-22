<?php

include_once '../app.php';

if(isset($_POST['mb'])){

    $mb = $_POST['mb'];

    if($mb == '' ){
        $n=0;
        $ht = '<span class="text-info">Empty value</span>';
    }
    elseif (!preg_match("/^[6-9]\d{9}$/",$mb)) {
        $n=0;
        $ht = '<span class="text-danger">Enter 10 digits valid mobile</span>';
    }
    else{

        $sql= "SELECT mobile FROM users WHERE mobile ='$mb'";
        $result = $mysqli->query($sql);
        $num = mysqli_num_rows($result);
        //var_dump($num);
        if($num>0){
            $n=0;
            $ht = '<span class="text-danger"><b>This mobile exist in our database</b></span>';
        }else{
            $n=1;
            $ht = '<span class="text-success"><b>Ok</b></span>';
        }
    }
}

$re = ['n'=>$n,'ht'=>$ht];
echo json_encode($re);