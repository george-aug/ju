<?php

include_once 'inc/session.php';
include_once 'inc/messages.php';
include_once 'inc/database.php';
include_once 'vendor/autoload.php';
use Jenssegers\Blade\Blade;
$blade = new Blade('resources/views', 'resources/cache');

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged-in"]) || $_SESSION["logged-in"] !== true){
    header("location: login.php");
    exit;
}

if (isset($_POST['change-password-submit'])) {

    $email = $_POST['email'];
    $old_password = $_POST['old_password'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if (empty($old_password) || empty($password) || empty($confirmPassword)) {
        header("Location: change.php?type=error&sms=empty-fields");
        exit();
    } else {

        if ($password !== $confirmPassword) {
            header("Location: change.php?type=error&sms=password-mismatch");
            exit();
        } else {

            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $mysqli->stmt_init();
            if (!$stmt->prepare($sql)) {
                header("Location: change.php?type=error&sms=sql-error");
                exit();
            } else {

                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                //echo "$result";
                //exit();
                if ($row = $result->fetch_assoc()) {
                    $pwdCheck = password_verify($old_password, $row['password']);
                    if ($pwdCheck == false) {
                        header("Location: change.php?type=error&sms=current-pass");
                        exit();
                    } elseif ($pwdCheck == true) {

                        $sql = "UPDATE users SET password=? WHERE email=?";
                        $stmt = $mysqli->stmt_init();
                        if (!$stmt->prepare($sql)) {
                            echo "There was an error !";
                            exit();
                        } else {
                            $newPasswordHash = password_hash($password, PASSWORD_DEFAULT);
                            $stmt->bind_param("ss", $newPasswordHash, $email);
                            $stmt->execute();

                            session_start();
                            session_unset();
                            session_destroy();

                            header("Location: login.php?type=success&sms=pwd-changed");
                            exit();

                        }
                    } else {
                        header("Location: change.php?type=error&sms=current-pass");
                        exit();
                    }

                } else {
                    header("Location: change.php?type=error&sms=no-user");
                    exit();
                }
            }
        }
    }
}

echo $blade->make('auth.password.change',['msg'=>$msg,'alert'=>$alert]);