<?php

require_once '../app.php';

$sql="TRUNCATE TABLE interests";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Interests table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$interests = array(
    ['text'=>'Writing'],
    ['text'=>'Reading/Book clubs'],
    ['text'=>'Learning new languages'],
    ['text'=>'Listening to music'],
    ['text'=>'Movies'],
    ['text'=>'Theater'],
    ['text'=>'Watching Television'],
    ['text'=>'Travel/Site seeing'],
    ['text'=>'Sports-Outdoor'],
    ['text'=>'Sports-Indoor'],
    ['text'=>'Trekking/Adventure sports'],
    ['text'=>'Video/Computer games'],
    ['text'=>'Health & Fitness'],
    ['text'=>'Yoga & Meditation'],
    ['text'=>'Alternative Healing'],
    ['text'=>'Volunteering/Social Service'],
    ['text'=>'Politics'],
    ['text'=>'Net Surfing'],
    ['text'=>'Blogging']

);

$sql = "INSERT INTO interests (text) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($interests as $interest) {
    $stmt->bind_param("s", $interest['text']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into interests table";



