<?php

include_once 'app.php';


$cities= array(
    array('value'=>1,'text'=>'Amritsar','continent'=>'Asia'),
    array('value'=>2,'text'=>'Delhi','continent'=>'America'),
    array('value'=>3,'text'=>'Patna','continent'=>'Europe'),
    array('value'=>4,'text'=>'Varanasi','continent'=>'Africa'),
    array('value'=>5,'text'=>'Lucknow','continent'=>'Australia')
);

//$cities=json_encode($cities_arr);
//var_dump(json_encode($cities));

include_once 'app.php';
echo $blade->make('tagmanager2',[
    'cities'=>$cities
]);
