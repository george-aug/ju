<?php

require_once 'app.php';

/*
 * Code for pagination
 * */
$rpp = 10;
$pno = (isset($_GET['pno']))?($_GET['pno']):1;
$offset = ($pno-1) * $rpp;
$sq = "SELECT * FROM users ORDER BY id ASC";
$res = $mysqli->query($sq);
$num = mysqli_num_rows($res);
$pages = ceil($num / $rpp);

/*
 * Code for Inserting new user
 * */
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){

    //extract($_POST);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(name,email,password) values (?,?,?)";
    $stmt=$mysqli->stmt_init();
    $stmt->prepare($sql);

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bind_param( "sss", $name, $email, $hashedPwd);
    $stmt->execute();
}

/*
 * Fetching Records
 * */
$sql = "SELECT * FROM users ORDER BY id ASC LIMIT $offset,$rpp";
$result = $mysqli->query($sql);
$users =array();
while ($record=$result->fetch_object()) {
    $users[] = $record;
}
echo $blade->make('admin.users',['users'=>$users,'num'=>$num,'pno'=>$pno,'pages'=>$pages]);
