<?php

include_once 'app.php';

if(!isset($_SESSION["logged-in"]) || $_SESSION["logged-in"] !== true){
    header("location: login.php");
    exit;
}

echo $blade->make('account');