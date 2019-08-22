<?php

function flash($type,$msg){
    $_SESSION['type']=$type;
    $_SESSION['msg']=$msg;
}

function stmtPrepare($stmt,$sql,$loc){

    if (!$stmt->prepare($sql)) {
        header("Location: $loc?type=error&sms=sql-error");
        exit();
    }
    return true;
}


function random_pass($fourDigit){
    $initial = ['ABC','DEF','GHI','JKL','MNO','OPQ','RST','UVW','XYZ'];
    $i= array_rand($initial);
    return $initial[$i].$fourDigit;
}

function random_num($size) {
    $alpha_key = '';
    $keys = range('A', 'Z');

    for ($i = 0; $i < 2; $i++) {
        $alpha_key .= $keys[array_rand($keys)];
    }

    $length = $size - 2;

    $key = '';
    $keys = range(0, 9);

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $alpha_key . $key;
}

function randomAge(){
    $age = array();
    for ($i=18; $i<=65; $i++){
        $age[] = $i;
    }
    $key= array_rand($age);
    return $age[$key];
}

function getRandomTableId($array){
    $key= array_rand($array);
    return $array[$key]['id'];
}
