<?php

include_once 'app.php';
include_once 'authenticate.php';


/*var_dump($_SESSION);
exit();*/
/*Interest Send
 * */
$sql="SELECT 
        profiles.profile_no,
        profiles.created_at 
        FROM connect_profile AS cp 
        JOIN profiles ON cp.profile_id=profiles.id 
            WHERE cp.matri_id ='".$_SESSION['mid']."' ORDER BY created_at desc";
$result = $mysqli->query($sql);
$isNo = mysqli_num_rows($result); // interest send number
$profiles =array();
while ($record=$result->fetch_object()) {
    $profiles[] = $record;
}

/*
 * Interest Received
 * How joining works: the profile whose information has to be fetched must be put with "ON" in joining
 * */
$sql2 = "SELECT profiles.profile_no, profiles.created_at FROM connect_profile AS cp JOIN profiles ON cp.matri_id=profiles.id 
            WHERE cp.profile_id='".$_SESSION['mid']."' ORDER BY created_at desc";
$result2 = $mysqli->query($sql2);
$irNo = mysqli_num_rows($result2); // interest received number
$profiles2 =array();
while ($record=$result2->fetch_object()) {
    $profiles2[] = $record;
}

/*
 * Connected Profiles
 * How joining works: the profile whose information has to be fetched must be put with "ON" in joining
 * */
$sql3 = "SELECT profiles.profile_no, profiles.created_at  FROM connect_profile AS cp JOIN profiles ON cp.matri_id=profiles.id 
            WHERE cp.profile_id='".$_SESSION['mid']."' AND cp.response=1
            UNION
            SELECT profiles.profile_no, profiles.created_at FROM connect_profile AS cp JOIN profiles ON cp.profile_id=profiles.id 
            WHERE cp.matri_id ='".$_SESSION['mid']."' AND cp.response=1
            ORDER BY created_at desc
            
            ";

$result3 = $mysqli->query($sql3);
$cpNo = mysqli_num_rows($result3); // interest received number
$profiles3 =array();
while ($record=$result3->fetch_object()) {
    $profiles3[] = $record;
}

/*
 * Favourite Profile
 * How joining works: the profile whose information has to be fetched must be put with "ON" in joining
 * */
$sql4 = "SELECT profiles.profile_no, profiles.created_at FROM fav_profile AS fp JOIN profiles ON fp.profile_id=profiles.id 
            WHERE fp.matri_id='".$_SESSION['mid']."' ORDER BY created_at desc";
$result4 = $mysqli->query($sql4);
$favNo = mysqli_num_rows($result4); // interest received number
$profiles4 =array();
while ($record=$result4->fetch_object()) {
    $profiles4[] = $record;
}

/*
 * Hidden Profile
 * How joining works: the profile whose information has to be fetched must be put with "ON" in joining
 * */
$sql5 = "SELECT profiles.profile_no, profiles.created_at FROM hide_profile AS fp JOIN profiles ON fp.profile_id=profiles.id 
            WHERE fp.matri_id='".$_SESSION['mid']."' ORDER BY created_at desc";
$result5 = $mysqli->query($sql5);
$hnNo = mysqli_num_rows($result5); // interest received number
$profiles5 =array();
while ($record=$result5->fetch_object()) {
    $profiles5[] = $record;
}






var_dump($_SESSION);
echo '<br><br>';
var_dump($profiles3);

echo $blade->make('matrimony.dashboard',[
    'profiles'=>$profiles,
    'isNo'=>$isNo,
    'irNo'=>$irNo,
    'profiles2'=>$profiles2,
    'cpNo'=>$cpNo,
    'profiles3'=>$profiles3,
    'favNo'=>$favNo,
    'profiles4'=>$profiles4,
    'hnNo'=>$hnNo,
    'profiles5'=>$profiles5
]);
