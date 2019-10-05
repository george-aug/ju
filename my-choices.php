<?php

include_once 'app.php';
include_once 'checkAuth.php';

$sql="SELECT * FROM profiles WHERE profiles.id ='".$_SESSION['pid']."'";
$result = $mysqli->query($sql);
$profile = $result->fetch_object();

echo $blade->make('matrimony.my-choices',['profile'=>$profile,'langs'=>$languages,'hobbies'=>$hobbies]);
