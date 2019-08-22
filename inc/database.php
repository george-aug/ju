<?php

/*
 * Note:
 * To be included only during testing inc folder files separately
 * Comment it out after testing
 * */
//require_once 'env.php';


$db_host = $_ENV['DB_SERVER'];
$db_user = $_ENV['DB_USERNAME'];
$db_pass = $_ENV['DB_PASSWORD'];
$db_name = $_ENV['DB_DATABASE'];

$mysqli = new mysqli('p:'.$db_host, $db_user, $db_pass, $db_name);

// Check connection
if($mysqli->connect_error){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

/*
 * Note: Since the mysqli object is always created, in both the cases: either the database is connected
 * or not connected so in the: if condition we can't check !$mysqli or $mysqli===false. The best way to
 * check for the proper db connection is $mysqli->connect_error that is if there is any connection error
 * it will die.
 */

// Print host information
//echo "Database Connect Successfully.<br>";

