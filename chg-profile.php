<?php

include_once 'app.php';

/*var_dump($_POST);
exit();*/
if(isset($_POST['pid']) && isset($_POST['pno']) ){

    $_SESSION['mid']=$_POST['pid']; // matri id
    $_SESSION['mno']=$_POST['pno']; // matri no
    $_SESSION['gen']=$_POST['gen']; // matri no

    //header("Location: dashboard.php");
    //echo $_POST['pno'];
}

//var_dump($_SESSION);