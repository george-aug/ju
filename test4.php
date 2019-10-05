<?php

include_once 'app.php';

//echo $blade->make('test4');
$name = md5($_SESSION['pno']);
$img_name = $name.'.jpg';

echo $img_name;