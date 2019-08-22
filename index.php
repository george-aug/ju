<?php

/*include_once 'inc/database.php';
include_once 'vendor/autoload.php';
use Jenssegers\Blade\Blade;
$blade = new Blade('resources/views', 'resources/cache');*/

include_once 'app.php';
//var_dump($_SESSION);
echo $blade->make('index');