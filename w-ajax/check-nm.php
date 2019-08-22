<?php

include_once '../app.php';

if(isset($_POST['nm'])){

    $nm = $_POST['nm'];

    if($nm == '' ){
        $n=0;
        $ht = '<span class="text-info">Empty value</span>';
    }
    elseif (!preg_match("/^([a-zA-Z']{3,}+[\ ]+([\ A-Za-z]+){2,})$/",$nm)) {
        $n=0;
        $ht = '<span class="text-danger">Enter your first & last name</span>';
    }
    else{
        $n=1;
        $ht = '<span class="text-success"><b>Ok</b></span>';
    }
}

$re = ['n'=>$n,'ht'=>$ht];
echo json_encode($re);