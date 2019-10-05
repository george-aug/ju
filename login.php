<?php

include_once 'app.php';
include_once 'checkGuest.php';

if (isset($_POST['login-submit'])) {

    $type='';
    $sms='';
    $uid = $_POST['uid']; // uid stands for unique identity
    $password = $_POST['password'];

    //include ('../csrf/verify_token.php');

    if (empty($uid)||empty($password)) {
        header("Location: login.php?type=error&sms=empty-fields&uid=".$uid);
        exit();
    }
    else{

        $sql = "SELECT * FROM users WHERE username=? or email=? or mobile=?";
        $stmt=$mysqli->stmt_init();
        if(!$stmt->prepare($sql)){
            header("Location: login.php?type=success&sms=sql-error");
            exit();
        }

        /*$sql = "SELECT * FROM users WHERE username=? or email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../login.php?type=error&sms=sql-error");
            exit();
        }*/
        else{

            $stmt->bind_param("sss",$uid,$uid,$uid);
            $stmt->execute();
            $result = $stmt->get_result();
            /*mysqli_stmt_bind_param($stmt, "ss", $uid,$uid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            */

            if ($row = $result->fetch_assoc()) {
                $pwdCheck = password_verify($password,$row['password']);
                if ($pwdCheck == false){
                    header("Location: login.php?type=error&sms=wrong-pass");
                    exit();
                }
                elseif($pwdCheck == true){
                    //include('../cookies/auth/set.php');
                    //session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['mobile'] = $row['mobile'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['logged-in'] = true;

                    loadMatriProfile($_SESSION['id'],$mysqli);
                    //header("Location: index.php");
                    (isset($_SESSION['redirectURL'])
                        ?header("Location:".$_SESSION['redirectURL'])
                        :header("Location: index.php"));
                    flash('success','Welcome back! Logged-In Successfully Aloo');
                    exit();
                }
                else{
                    header("Location: login.php?type=error&sms=wrong-pass");
                    exit();
                }
            }
            else{
                header("Location: login.php?type=error&sms=no-user");
                exit();
            }
        }
    }
}
/*else{
    header("Location: ../index.php?type=error&sms=un-auth");
    exit();
}*/

echo $blade->make('auth.login',['msg'=>$msg,'alert'=>$alert]);