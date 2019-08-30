<?php

require_once '../app.php';

$sql="TRUNCATE TABLE hobbies";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Hobbies table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */

$hobbies = array(
    ['text'=>'Collecting Stamps'],
    ['text'=>'Collecting Coins'],
    ['text'=>'Collecting Antiques'],
    ['text'=>'Art/Handicraft'],
    ['text'=>'Painting'],
    ['text'=>'Cooking'],
    ['text'=>'Photography'],
    ['text'=>'Film Making'],
    ['text'=>'Model Building'],
    ['text'=>'Gardening/Landscaping'],
    ['text'=>'Fishing'],
    ['text'=>'BIrd Watching'],
    ['text'=>'Taking Care of Pets'],
    ['text'=>'Playing musical instrument'],
    ['text'=>'Singing'],
    ['text'=>'Dancing'],
    ['text'=>'Acting'],
    ['text'=>'Ham Radio'],
    ['text'=>'Astrology/Palmistry'],
    ['text'=>'Graphology'],
    ['text'=>'Solving Crosswords/Puzzles']
);

$sql = "INSERT INTO hobbies (text) VALUES (?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

foreach($hobbies as $hobby) {
    $stmt->bind_param("s", $hobby['text']);
    $stmt->execute();
}

echo "<br>";
echo "Data inserted successfully into hobbies table";



