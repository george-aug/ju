<?php

include_once 'inc/session.php';
include_once 'inc/messages.php';
include_once 'inc/database.php';
include_once 'vendor/autoload.php';
use Jenssegers\Blade\Blade;
$blade = new Blade('resources/views', 'resources/cache');

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] === true){
    header("location: welcome.php");
    exit;
}

if (isset($_POST['signup-submit'])){

    $type='';
    $sms='';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        header("Location: signup.php?type=error&sms=empty-fields&username=".$username."&email=".$email);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: signup.php?type=error&sms=invalid-uid&username=".$username."&email=".$email);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup.php?type=error&sms=invalid-email&username=".$username);
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: signup.php?type=error&sms=invalid-username&email=".$email);
        exit();
    }
    elseif ($password !== $confirmPassword) {
        header("Location: signup.php?type=error&sms=password-mismatch&username=".$username."&email=".$email);
        exit();
    }
    else{
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt=$mysqli->stmt_init();
        if (!$stmt->prepare($sql)) {
            header("Location: signup.php?type=error&sms=sql-error");
            exit();
        }
        else{
            $stmt->bind_param( "s", $username);
            $stmt->execute();
            $stmt->store_result();
            $resultCheck = $stmt->num_rows();

            if ($resultCheck > 0) {
                header("Location: signup.php?type=error&sms=username-taken&email=".$email);
                exit();
            }
            else{
                $sql = "INSERT INTO users(username,email,password) VALUES(?,?,?)";
                $stmt=$mysqli->stmt_init();
                if (!$stmt->prepare($sql)) {
                    header("Location: signup.php?type=error&sms=sql-error");
                    exit();
                }
                else{

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    $stmt->bind_param( "sss", $username, $email, $hashedPwd);
                    $stmt->execute();
                    header("Location: login.php?type=success&sms=registered");
                    exit();

                }

            }
        }

    }

    $stmt->close();
    $mysqli->close();
}

echo $blade->make('auth.signup',['msg'=>$msg,'alert'=>$alert]);
