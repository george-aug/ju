<?php

require_once '../vendor/autoload.php';

/*
 * Load .env file so that we can use $_ENV
 * Note: Inside create paths don't write .env just
 * give path to folder where .env file is located.
 * */
$dotenv = Dotenv\Dotenv::create('../');
$dotenv->load();

