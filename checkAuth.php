<?php

/*
 * Check if user is Auth user
 * If not redirects to login page
 *
 * After successful authentication the logged-in user is redirected to
 * last visited URL with the help of $_SESSION['redirectURL']
 * */

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged-in"]) || $_SESSION["logged-in"] !== true){
    $_SESSION['redirectURL'] = $_SERVER['REQUEST_URI'];
    header("location: login.php");
    exit;
}