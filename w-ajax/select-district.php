<?php

include_once '../app.php';

if(isset($_POST['state_id'])){

    $sid = $_POST['state_id'];
    //echo $sid;
    $sql = "SELECT * FROM districts WHERE sid ='$sid'";
    $result = $mysqli->query($sql);

    // Generate HTML of city options list
    if($result->num_rows > 0){
        echo '<option value="">Select city</option>';
        while($row = $result->fetch_assoc()){
            echo '<option value="'.$row['id'].'">'.$row['text'].'</option>';
        }
    }else{
        echo '<option value="">District not available</option>';
    }


}