<?php

include_once 'app.php';
/*include_once 'inc/database.php';
include_once 'vendor/autoload.php';
use Jenssegers\Blade\Blade;
$blade = new Blade('resources/views', 'resources/cache');*/

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged-in"]) || $_SESSION["logged-in"] !== true){
    header("location: login.php");
    exit;
}

echo $blade->make('welcome');