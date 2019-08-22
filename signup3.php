<?php

/*include_once 'inc/session.php';
include_once 'inc/messages.php';
include_once 'inc/database.php';
include_once 'inc/functions.php';
include_once 'vendor/autoload.php';
use Jenssegers\Blade\Blade;
$blade = new Blade('resources/views', 'resources/cache');*/

include_once 'app.php';

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] === true){
    header("location: welcome.php");
    exit;
}

if (isset($_POST['signup-submit'])){

    $type='';
    $sms='';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];

    var_dump($_POST);

    if (empty($name) || empty($email) || empty($password) || empty($mobile)) {
        header("Location: signup3.php?type=error&sms=empty-fields&name=".$name."&email=".$email."&mobile=".$mobile);

        exit();
    }
    elseif (!preg_match("/^([a-zA-Z']{3,}+[\ ]+([\ A-Za-z]+){2,})$/", $name)) {
        header("Location: signup3.php?type=error&sms=invalid-name&name=".$name."&email=".$email."&mobile=".$mobile);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup3.php?type=error&sms=invalid-email&name=".$name."&email=".$email."&mobile=".$mobile);
        exit();
    }
    elseif (!preg_match("/^[6-9]\d{9}$/",$mobile)) {
        header("Location: signup3.php?type=error&sms=invalid-mobile&name=".$name."&email=".$email."&mobile=".$mobile);
        exit();
    }
    else{
        $sql1 = "SELECT email FROM users WHERE email='$email'";
        $result = $mysqli->query($sql1);
        $emailCheck = mysqli_num_rows($result);
        if ($emailCheck > 0) {
            header("Location: signup3.php?type=error&sms=email-exist&name=".$name."&email=".$email."&mobile=".$mobile);
            exit();
        }

        $sql2 = "SELECT mobile FROM users WHERE mobile='$mobile'";
        $result = $mysqli->query($sql2);
        $mobileCheck = mysqli_num_rows($result);
        if ($mobileCheck > 0) {
        header("Location: signup3.php?type=error&sms=mobile-exist&name=".$name."&email=".$email."&mobile=".$mobile);
        exit();
    }

        // ==================================
        // Interaction with DB
        // Insert into users table
        // ==================================

        $sql = "INSERT INTO users(name,email,mobile,password) VALUES(?,?,?,?)";
        $stmt=$mysqli->stmt_init();
        stmtPrepare($stmt,$sql,'signup3.php');

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param( "ssss", $name, $email,$mobile, $hashedPwd);
        $stmt->execute();
        header("Location: login.php?type=success&sms=registered");
        exit();

    }

    $stmt->close();
    $mysqli->close();
}

echo $blade->make('auth.signup3',['msg'=>$msg,'alert'=>$alert]);
