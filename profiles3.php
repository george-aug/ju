<?php

require_once 'app.php';
$connArr =array();
$favArr =array();
$hideArr =array();


$sql = "SELECT 
    p.id,
    p.pno,
    p.first_name,
    p.last_name,
    p.gender,
    p.dob,
    i.linked,
    i.filename,
    i.pp,
    i.profile_id
    FROM profiles as p
    LEFT JOIN images as i ON i.profile_id = p.id
    AND i.linked = 1
 ORDER BY p.id";

$result = $mysqli->query($sql);
$total = mysqli_num_rows($result);

$profiles =array();
while ($record=$result->fetch_assoc()) {
    $profiles[] = $record;
}

//var_dump($profiles);

$newProfilesInfo=array();
$newProfileKey=array();
$newKey = 0;

foreach($profiles as $profileKey => $profileValue){

    if(!in_array($profileValue["id"],$newProfileKey)){
        ++$newKey;
        $newProfilesInfo[$newKey]["id"] = $profileValue["id"];
        $newProfilesInfo[$newKey]["pno"] = $profileValue["pno"];
        $newProfilesInfo[$newKey]["first_name"] = $profileValue["first_name"];
        $newProfilesInfo[$newKey]["last_name"] = $profileValue["last_name"];
        $newProfilesInfo[$newKey]["gender"] = $profileValue["gender"];
        $newProfilesInfo[$newKey]["dob"] = $profileValue["dob"];
    }
    if($profileValue['filename']!=null){
        $newProfilesInfo[$newKey]['pics'][$profileKey]["fn"] = $profileValue["filename"];
        $newProfilesInfo[$newKey]['pics'][$profileKey]["pp"] = $profileValue["pp"];
    }

    $newProfileKey[]  = $profileValue["id"];
}

//echo "<br><br>";
//var_dump($newProfilesInfo);

echo $blade->make('profiles3',['profiles'=>$newProfilesInfo,'total'=>$total,'hideArr'=>$hideArr,'favArr'=>$favArr,'connArr'=>$connArr]);

