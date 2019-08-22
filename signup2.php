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

var_dump($_SESSION);
echo '<br>';
var_dump($_POST);
echo '<br>';
var_dump($_GET);
$un='';
if (isset($_POST['signup-submit'])){

    $type='';
    $sms='';

    $un=$username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    /*var_dump($_POST['username']);
    exit();*/

    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        header("Location: signup2.php?type=error&sms=empty-fields&username=".$username."&email=".$email);
        $_POST['af_username']=$username;
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: signup2.php?type=error&sms=invalid-uid&username=".$username."&email=".$email);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup2.php?type=error&sms=invalid-email&username=".$username);
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: signup2.php?type=error&sms=invalid-username&email=".$email);
        exit();
    }
    elseif ($password !== $confirmPassword) {
        header("Location: signup2.php?type=error&sms=password-mismatch&username=".$username."&email=".$email);
        exit();
    }
    else{
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt=$mysqli->stmt_init();
        stmtPrepare($stmt,$sql,'signup2.php');

        $stmt->bind_param( "s", $username);
        $stmt->execute();
        $stmt->store_result();
        $resultCheck = $stmt->num_rows();

        if ($resultCheck > 0) {
            header("Location: signup2.php?type=error&sms=username-taken&email=".$email);
            exit();
        }
        else{
             // ==================================
             // Interaction with DB
             // Insert into users table
             // ==================================

            $sql = "INSERT INTO users(username,email,password) VALUES(?,?,?)";
            $stmt=$mysqli->stmt_init();
            stmtPrepare($stmt,$sql,'signup2.php');

            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bind_param( "sss", $username, $email, $hashedPwd);
            $stmt->execute();
            header("Location: login.php?type=success&sms=registered");
            exit();
        }
    }

    $stmt->close();
    $mysqli->close();
}

echo $blade->make('auth.signup',['msg'=>$msg,'alert'=>$alert,'un'=>$un]);