<?php

require_once 'vendor/autoload.php';

/* Load env variables */
$dotEnv = Dotenv\Dotenv::create(__DIR__);
$dotEnv->load();

/* Using Carbon  */
use Carbon\Carbon;

/* New Blade Object */
use Jenssegers\Blade\Blade;
$blade = new Blade('resources/views', 'resources/cache');

include 'inc/database.php';
include 'inc/functions.php';
include 'inc/messages.php';
include 'inc/session.php';
include 'inc/profiles.php';
include 'inc/variables.php';

//var_dump($_SESSION);