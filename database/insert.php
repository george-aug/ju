<?php

require_once '../inc/database.php';
require_once '../vendor/autoload.php';

$sql="TRUNCATE  TABLE users";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */
$num = 25;
//$password = 'titanic2019';
$faker = Faker\Factory::create();
$sql = "INSERT INTO users (name,username,email,password) VALUES (?,?,?,?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

for ($i=0; $i < $num; $i++) {

    $name = $faker->name;
    $username = $faker->userName;
    $email = $faker->email;
    $hashedPwd = password_hash('titanic', PASSWORD_DEFAULT);
    $stmt->bind_param("ssss", $name, $username, $email, $hashedPwd);
    $stmt->execute();

}

echo "<br>";
echo " Data inserted successfully";


/*$sql = "INSERT INTO users (name,email) VALUES (?,?)";
$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);
$stmt->bind_param("ss", $name, $email);
$stmt->execute();*/

