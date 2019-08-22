<?php
$religionsAry=array();
$maritalsAry=array();
$locations=array();
$getters=array();
$queries=array();

foreach ($_GET as $key => $value) {
$temp = is_array($value) ? $value : trim($value);
var_dump($temp);
echo "<br>";

//exit();

if(!empty($temp)) {
var_dump(list($key)=explode("-",$key));
}

if ($key == 'srch_mar'){
array_push($maritalsAry,$value);
}

if ($key == 'srch_rel'){
array_push($religionsAry,$value);
/*foreach($_GET['srch_rel'] as $key =>$value){
array_push($religionsAry,$value);
}*/
}

if (!in_array($key,$getters)){
$getters[$key]=$value;
}


echo "<br>";
echo "<br>";
}

echo "<br>";
echo "<br>";
var_dump($maritalsAry);
echo "<br>";
var_dump($religionsAry);
echo "<br>";
var_dump($getters);
echo "<br>";


exit();
