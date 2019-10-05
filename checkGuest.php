<?php

/*
 * Check if user is Guest user.
 * If not redirects to welcome page
 * */

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] === true){
    header("location: welcome.php");
    exit;
}
