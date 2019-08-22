<?php

include_once 'inc/session.php';
include_once 'inc/messages.php';
include_once 'inc/database.php';
include_once 'vendor/autoload.php';
use Jenssegers\Blade\Blade;
$blade = new Blade('resources/views', 'resources/cache');

$selector = $_GET['selector'];
$validator = $_GET['validator'];

if (isset($_POST['reset-password-submit'])) {

    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    if (empty($password) || empty($passwordRepeat)) {
        header("Location: reset.php?type=error&sms=empty-fields");
        exit();
    }elseif ($password != $passwordRepeat) {
        header("Location: reset.php?type=error&sms=password-mismatch");
        exit();
    }

    $currentDate = date("U");

    $sql = "SELECT * FROM reset WHERE selector=? AND expires>=?";
    $stmt = $mysqli->stmt_init();
    if (!$stmt->prepare($sql)) {
        header("Location: reset.php?type=error&sms=sql-error&no=1");
        exit();
    }
    else
    {
        $stmt->bind_param("si", $selector, $currentDate);
        $stmt->execute();

        $result = $stmt->get_result();
        if (!$row = $result->fetch_assoc()) {
            header("Location: forgot.php?type=error&sms=resubmit-request&no=4");
            exit();
        }
        else{
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row['token']);
            if ($tokenCheck == false) {
                header("Location: forgot.php?type=error&sms=resubmit-request&no=5");
                exit();
            }elseif ($tokenCheck == true) {

                $tokenEmail = $row['email'];
                $sql = "SELECT * FROM users WHERE email=?";
                $stmt = $mysqli->stmt_init();
                if (!$stmt->prepare($sql)) {
                    header("Location: reset.php?type=error&sms=sql-error");
                    exit();
                }
                else{
                    $stmt->bind_param("s", $tokenEmail);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if (!$row = $result->fetch_assoc()) {
                        echo "There was an error !";
                        exit();
                    }
                    else{
                        $sql = "UPDATE users SET password=? WHERE email=?";
                        $stmt = $mysqli->stmt_init();
                        if (!$stmt->prepare($sql)) {
                            header("Location: reset.php?type=error&sms=sql-error");
                            exit();
                        }
                        else{
                            $newPasswordHash = password_hash($password, PASSWORD_DEFAULT);
                            $stmt->bind_param("ss", $newPasswordHash, $tokenEmail);
                            $stmt->execute();

                            /*
                                Deleting the existing used row
                            */
                            $query = "DELETE FROM reset WHERE email=?;";
                            $stmt = $mysqli->stmt_init();
                            if (!$stmt->prepare($query)) {
                                header("Location: reset.php?type=error&sms=sql-error");
                                exit();
                            }
                            else
                            {
                                $stmt->bind_param("s", $tokenEmail);
                                $stmt->execute();
                            }

                            header("Location: login.php?type=success&sms=reset-success");
                            exit();

                        }
                    }
                }
            }
        }
    }
}

echo $blade->make('auth.password.reset',['msg'=>$msg,'alert'=>$alert,'selector'=>$selector,'validator'=>$validator]);