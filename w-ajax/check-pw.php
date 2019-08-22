<?php

include_once '../app.php';

if(isset($_POST['pw'])){

    $pw = $_POST['pw'];

    if($pw == '' ){
        $n=0;
        $ht = '<span class="text-info">Empty value</span>';
    }
    elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*^#?&]{7,}$/",$pw)) {
        $n=0;
        $ht = '<span class="text-danger">Min: (7 digits) & 1 number</span>';
    }
    else{
        $n=1;
        $ht = '<span class="text-success"><b>Ok</b></span>';
    }
}

$re = ['n'=>$n,'ht'=>$ht];
echo json_encode($re);