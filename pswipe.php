<?php

include_once 'app.php';

$sql= "SELECT * FROM images WHERE user_id = 61";
$result = $mysqli->query($sql);
$images=array();
while ($record=$result->fetch_object()){
    $images[]=$record;
}

var_dump($images);

echo $blade->make('pswipe',['images'=>$images]);