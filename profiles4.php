<?php

require_once 'app.php';
$sql = "SELECT 
    p.id,
    p.pno,
    p.photo,
    p.first_name,
    p.last_name,
    p.gender,
    p.dob,
    i.linked as xxx_linked,
    i.filename as xxx_filename,
    i.pp as xxx_pp,
    i.profile_id as xxx_profile_id
    FROM profiles as p
    LEFT JOIN images as i ON i.profile_id = p.id
    AND i.linked = 1
 ORDER BY p.id";


$result = $mysqli->query($sql);
$total = mysqli_num_rows($result);

/*$profiles =array();
while ($record=$result->fetch_assoc()) {
    $profiles[] = $record;
}*/

foreach($result as &$row){
    $album = array();
    foreach ($row as $key=>$value){
        if (strpos($key, 'xxx_') === 0) {
            $album[substr($key, 4)] = $value;
            unset($row[$key]);
        }
    }
    $row['album'] = $album;
}

//var_dump($album);
//var_dump($profiles);

var_dump($result);