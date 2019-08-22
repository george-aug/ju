<?php

include_once 'inc/session.php';
include_once 'inc/messages.php';
include_once 'inc/database.php';
include_once 'vendor/autoload.php';
use Jenssegers\Blade\Blade;
$blade = new Blade('resources/views', 'resources/cache');

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] === true){
    session_unset();
    session_destroy();
    //header("Location: forgot.php");
    //exit;
}

if (isset($_POST['forgot-password-submit'])) {

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $val = bin2hex($token);
    $url = "reset.php?selector=$selector&validator=$val";
    $expires = date("U") + 1800;
    $userEmail = $_POST['email'];

    /*
     * Validate User Input
     * */
    if (empty($userEmail)) {
        header("Location: forgot.php?type=error&sms=empty-fields");
        exit();
    }
    elseif (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        header("Location: forgot.php?type=error&sms=invalid-email");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $mysqli->stmt_init();
        if (!$stmt->prepare($sql)) {
            header("Location: forgot.php?type=error&sms=sql-error");
            exit();
        }
        else{
            $stmt->bind_param("s", $userEmail);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows==0){
                header("Location: forgot.php?type=error&sms=no-user");
                exit();
            }
        }
    }/* --- End: Validate User Input --- */




    $query = "DELETE FROM reset WHERE email=?";
    $stmt = $mysqli->stmt_init();
    if (!$stmt->prepare($query)) {
        header("Location: forgot.php?type=error&sms=sql-error&no=2");
        exit();
    }
    else
    {
        $stmt->bind_param("s", $userEmail);
        $stmt->execute();
    }

    $query = "INSERT INTO reset(email, selector, token, expires, url) VALUES (?,?,?,?,?)";
    $stmt = $mysqli->stmt_init();
    if (!$stmt->prepare($query)) {
        header("Location: forgot.php?type=error&sms=sql-error&no=3");
        exit();
    }
    else
    {
        $hashedToken = password_hash($token,PASSWORD_DEFAULT);
        $stmt->bind_param("sssis", $userEmail,$selector,$hashedToken,$expires,$url);
        $stmt->execute();
    }

    $stmt->close();
    $mysqli->close();

    header("Location: forgot.php?type=success&sms=reset");
}

echo $blade->make('auth.password.forgot',['msg'=>$msg,'alert'=>$alert]);

