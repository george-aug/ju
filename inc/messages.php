<?php

$msg = '';
$alert = '';

if (isset($_GET['type'])){

    $type=$_GET['type'];
    switch ($type) {
        case "error":
            $alert = 'alert alert-danger';
            break;
        case "success":
            $alert = 'alert alert-success';
            break;
        case "warning":
            $alert = 'alert alert-warning';
            break;
        default:
            $alert = 'alert alert-info';
    }
}

if(isset($_GET['sms'])){

    $sms=$_GET['sms'];
    switch ($sms) {
        case "empty-fields":
            $msg = "Some fields are empty!";
            break;
        case "sql-error":
            $msg = "Oops! Unable to connect database.";
            break;
        case "wrong-pass":
            $msg = "You entered a wrong password.";
            break;
        case "current-pass":
            $msg = "You entered a wrong current-password.";
            break;
        case "no-user":
            $msg = "No such user exist!";
            break;
        case "un-auth":
            $msg = "Sorry! Can't let you in. Un-authorised access";
            break;
        case "logged-in":
            $msg = "Welcome back! Logged-In Successfully";
            break;
        case "pwd-changed":
            $msg = "Password Changed Successfully";
            break;
        case "invalid-uid":
            $msg = "Invalid username or email";
            break;
        case "invalid-email":
            $msg = "Invalid user email";
            break;
        case "invalid-mb":
            $msg = "Invalid mobile! Please enter only 10 digits valid mobile number";
            break;
        case "invalid-name":
            $msg = "Invalid name! Only letters and white space allowed";
            break;
        case "invalid-username":
            $msg = "Invalid username";
            break;
        case "username-taken":
            $msg = "Username already taken";
            break;
        case "mb-exist":
            $msg = "Oops! Mobile already exist in our record.";
            break;
        case "password-mismatch":
            $msg = "Password and confirm password do not match";
            break;
        case "registered":
            $msg = "Registration Successful, Plz. login to continue... ";
            break;
        case "reset":
            $msg = "Reset Instantiated, Please check your Email... ";
            break;
        case "reset-success":
            $msg = "Reset Success, Please login to continue... ";
            break;
        case "resubmit-request":
            $msg = "Resubmit forgot password request";
            break;
        default:
            $msg = "Oops! Something went wrong.";
    }
}