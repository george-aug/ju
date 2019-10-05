<?php

include_once 'app.php';
include_once 'checkAuth.php';
var_dump($_SESSION);

if(isset($_SESSION['pid'])){
    $sql="SELECT * FROM images WHERE profile_id='".$_SESSION['pid']."' AND linked=1";
    $result = $mysqli->query($sql);
    $num = mysqli_num_rows($result);
    $images = array();
    while($record = $result->fetch_object()){
        $images[]=$record;
    }
    echo $blade->make('album',['images'=>$images,'num'=>$num]);

}else{
    echo $blade->make('album');
}

