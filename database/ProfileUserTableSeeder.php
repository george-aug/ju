<?php

require_once '../inc/database.php';

$sql="TRUNCATE TABLE profile_user";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

$sql1="SELECT * FROM users";
$results = $mysqli->query($sql1);
$userIdArr=array();
while ($record = $results->fetch_object()){
    $userIdArr[]=$record->id;
}
var_dump(json_encode($userIdArr));

$sql2="SELECT * FROM profiles";
$results = $mysqli->query($sql2);
$profileIdArr=array();
while ($record = $results->fetch_object()){
    $profileIdArr[]=$record->id;
}
var_dump(json_encode($profileIdArr));

$sql = "INSERT INTO profile_user(user_id,profile_id) VALUES (?,?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($profileIdArr as $profile) {
    $uid = array_rand($userIdArr);
    //$uid = $userIdArr[$i];
    $stmt->bind_param("ii",$uid,$profile);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into countries table";
