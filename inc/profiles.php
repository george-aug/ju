<?php

if(isset($_SESSION["logged-in"]) && $_SESSION["logged-in"] === true){
    $sqlN="SELECT id, first_name, profile_no as pno, gender FROM profiles JOIN profile_user ON profiles.id = profile_user.profile_id WHERE  user_id='".$_SESSION['id']."'";

    $results=$mysqli->query($sqlN);
    $num= mysqli_num_rows($results);
    $profiles =array();
    while ($record=$results->fetch_object()) {
        $profiles[] = $record;
    }

    $_SESSION['matri_profiles'] = $profiles;
}

