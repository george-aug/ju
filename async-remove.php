<?php

// Uncomment if you want to allow posts from other domains
// header('Access-Control-Allow-Origin: *');
require_once 'app.php';
require_once('slim/slim.php');

// Allowing users to delete files from the server is a serious security risk.
// Use at own discretion.

// get name of file to delete from URL and clean up any path information from name for security purposes
$name = Slim::sanitizeFileName($_GET['name']);
$_SESSION['msg']=$name;
// the path of the uploaded files
$path = '/uploaded/pics/';

// combine both to set path to file
$filename = $path . $name;

// test if file exists, if so, remove
if (file_exists($filename)) {
    unlink($filename);
}