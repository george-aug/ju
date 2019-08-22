<?php

include_once 'inc/database.php';

$uid = "athena02@hotmail.com";
$sql = "SELECT * FROM users WHERE email=?";
$stmt=$mysqli->stmt_init();
if(!$stmt->prepare($sql)){
    echo "Error with mysqli stmt prepare";
}

/*
 * Note: $result fetch_assoc() always get 1 row at a time
 * Note: To only get number of rows use $stmt->store_result();
 *
 * */
else {

    $stmt->bind_param("s", $uid);
    $stmt->execute();
    /*$result = $stmt->get_result();
    $row = $result->fetch_assoc();*/



    $stmt->store_result();
    echo $stmt->num_rows();
}

//var_dump($row);