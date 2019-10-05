<?php

/*include_once 'app.php';

$sql="SELECT p.id, p.pno, i.filename, i.pp
FROM profiles p
LEFT JOIN images i ON i.profile_id = p.id
AND i.linked = 1 
ORDER BY p.id";

$result = $mysqli->query($sql);
$total = mysqli_num_rows($result);

$profiles =array();
while ($record=$result->fetch_assoc()) {
    $profiles[] = $record;
}

var_dump($profiles);

$newProfilesInfo=array();
$newProfileKey=array();
$newKey = 0;

foreach($profiles as $profileKey => $profileValue){

    if(!in_array($profileValue["id"],$newProfileKey)){
        ++$newKey;
        $newProfilesInfo[$newKey]["id"] = $profileValue["id"];
        $newProfilesInfo[$newKey]["pno"] = $profileValue["pno"];
    }
    if($profileValue['filename']!=null){
        $newProfilesInfo[$newKey]['album'][$profileKey]["filename"] = $profileValue["filename"];
        $newProfilesInfo[$newKey]['album'][$profileKey]["pp"] = $profileValue["pp"];
    }

    $newProfileKey[]  = $profileValue["id"];
}

echo "<br><br>";
var_dump($newProfilesInfo);*/

