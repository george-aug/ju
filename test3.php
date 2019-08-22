<?php

include_once 'app.php';

/*$mobile = '8887610230';
$password = random_pass(substr($mobile,-4));
echo $password;*/


//var_dump(json_encode($_SESSION));
//var_dump($_SESSION);
//
//if(isset($_SESSION['mid'])){
//    $sql= "SELECT profile_id FROM hide_profile WHERE matri_id='".$_SESSION['mid']."'";
//    $res = $mysqli->query($sql);
//    $rc = mysqli_num_rows($res);
//
//    $hideArr =array();
//    if($rc>0) {
//        while ($record = $res->fetch_assoc()) {
//            $hideArr[] = $record['profile_id'];
//        }
//    }
//}
//echo "<br><br>";
//echo $rc;
//echo "<br><br>";
//var_dump($hideArr);

//header('Content-Type: application/json');

$sql= "SELECT * FROM profiles LEFT JOIN profile_user ON profile_user.profile_id = profiles.id ORDER BY profiles.id";
$results = $mysqli->query($sql);
$num = mysqli_num_rows($results);

$profiles =array();
while($record=$results->fetch_object()){
    $profiles[]=$record;
}

var_dump($num);
echo '<br><br>';
var_dump(json_encode($profiles));