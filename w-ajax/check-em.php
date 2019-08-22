<?php

include_once '../app.php';

if(isset($_POST['em'])){

    $em = $_POST['em'];

    if($em=='' ){
        $n=0;
        $ht = '<span class="text-info">Empty value</span>';
    }
    elseif (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
        $n=0;
        $ht = '<span class="text-danger">Enter valid email address</span>';
    }
    else{

        $sql= "SELECT email FROM users WHERE email ='$em'";
        $result = $mysqli->query($sql);
        $num = mysqli_num_rows($result);
        //var_dump($num);
        if($num>0){
            $n=0;
            $ht = '<span class="text-danger"><b>This email exist in our database</b></span>';
        }else{
            $n=1;
            $ht = '<span class="text-success"><b>Ok</b></span>';
        }
    }
}

$re = ['n'=>$n,'ht'=>$ht];
echo json_encode($re);