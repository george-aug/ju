<?php

include_once 'app.php';

/*var_dump($_SESSION);
exit();*/

if(!isset($_SESSION['temPwd'])){
    header("Location: join.php?type=warning&sms=un-auth");
}

$temPwd=$_SESSION['temPwd'];
unset($_SESSION['temPwd']);

echo $blade->make('auth.pass',['pass'=>$temPwd]);
