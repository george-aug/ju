<?php

/*
 * This file authenticates if the visitor is Guest
 * user or authenticated logged-in user. If the user is
 * guest it redirects to the login page and after successful
 * authentication the logged-in user is redirected to last visited
 * URL with the help of $_SESSION['redirectURL']
 *
 */

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged-in"]) || $_SESSION["logged-in"] !== true){
    $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
    header("location: login.php");
    exit;
}