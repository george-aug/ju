<?php

require_once '../vendor/autoload.php';

/* Load env variables
 * Note: no env filename has to be given
 * */
$dotEnv = Dotenv\Dotenv::create('../');
$dotEnv->load();

/* Using Carbon  */
use Carbon\Carbon;

/* New Blade Object */
use Jenssegers\Blade\Blade;
$blade = new Blade('../resources/views', '../resources/cache');

include '../inc/database.php';
include '../inc/functions.php';
include '../inc/messages.php';
include '../inc/session.php';
include '../inc/variables.php';
