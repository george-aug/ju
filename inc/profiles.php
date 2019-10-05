<?php

/*if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] === true){
    $sqlN="SELECT id, first_name, profile_no as pno, gender FROM profiles JOIN profile_user ON profiles.id = profile_user.profile_id WHERE  user_id='".$_SESSION['id']."'";

    $results=$mysqli->query($sqlN);
    $num= mysqli_num_rows($results);
    $profiles =array();
    while ($record=$results->fetch_object()) {
        $profiles[] = $record;
    }

    $_SESSION['matri_profiles'] = $profiles;
}*/

function loadMatriProfile($uid,$conn){
        $sqlN="SELECT id,pno,gender,first_name,last_name FROM profiles WHERE  user_id='$uid'";
        $result = $conn->query($sqlN);
        $num= mysqli_num_rows($result);
        if($num===1){
            $profile = $result->fetch_object();

            $_SESSION['pid'] = $profile->id;        // treated as matri profile id
            $_SESSION['pno'] = $profile->pno;       // treated as matri profile number
            $_SESSION['gen'] = $profile->gender;
            $_SESSION['fn'] = $profile->first_name;
            $_SESSION['ln'] = $profile->last_name;
        }
}
