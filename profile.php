<?php

include_once 'app.php';
/*include_once 'inc/database.php';
include_once 'inc/variables.php';
include_once 'vendor/autoload.php';
use Jenssegers\Blade\Blade;
$blade = new Blade('resources/views', 'resources/cache');*/

$profileId = $_GET['id'];

$sql = "SELECT * FROM profiles WHERE profile_no = ?";
$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);
$stmt->bind_param('s',$profileId);
$stmt->execute();

$result = $stmt->get_result();
if(!$row = $result->fetch_object()){

    header("Location: error-404.php?type=error&sms=no-user");
    exit();
}
else{
    echo $blade->make('profile',['profile'=>$row]);
}

