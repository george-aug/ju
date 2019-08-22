<?php

include_once 'app.php';

if(isset($_POST['join-submit'])){

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];

    if (empty($name) || empty($mobile)) {
        header("Location: join.php?type=error&sms=empty-fields&name=".$name."&mobile=".$mobile);
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        header("Location: join.php?type=error&sms=invalid-name&name=".$name."&mobile=".$mobile);
        exit();
    }
    elseif (!preg_match("/^[6-9]\d{9}$/",$mobile)) {
        header("Location: join.php?type=error&sms=invalid-mb&name=".$name."&mobile=".$mobile);
        exit();
    }
    else{
        $sql = "SELECT mobile FROM users WHERE mobile=?";
        $stmt=$mysqli->stmt_init();
        stmtPrepare($stmt,$sql,'join.php');

        $stmt->bind_param( "s", $mobile);
        $stmt->execute();
        $stmt->store_result();
        $resultCheck = $stmt->num_rows();

        if ($resultCheck > 0) {
            header("Location: join.php?type=error&sms=mb-exist&name=".$name."&mobile=".$mobile);
            exit();
        }
        else{
            // ==================================
            // Interaction with DB
            // Insert into users table
            // ==================================

            $sql = "INSERT INTO users(name,mobile,password) VALUES(?,?,?)";
            $stmt=$mysqli->stmt_init();
            stmtPrepare($stmt,$sql,'join.php');

            $temPwd = random_pass(substr($mobile,-4));                          // Temporary Password
            $hashedPwd = password_hash($temPwd, PASSWORD_DEFAULT);              // Hashed Password
            $stmt->bind_param( "sss", $name, $mobile, $hashedPwd);
            $stmt->execute();

            /*
             * Notebox:
             * You can't pass variable to next page
             * as $_POST as done below with $_SESSION
             * */

            $_SESSION['temPwd']=$temPwd;
            header("Location: pass.php?type=success&sms=registered");
            exit();
        }
    }

    $stmt->close();
    $mysqli->close();
}

echo $blade->make('auth.join',['msg'=>$msg,'alert'=>$alert]);
