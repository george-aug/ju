<?php

include_once 'app.php';

// to finally create image instances
$w = $manager->make('uploaded/pics/IMG-JU74407-JU00.jpg')->width();

//echo $w;

$img = $manager->make('uploaded/pics/IMG-JU74407-JU00.jpg')
            ->crop($w,$w,0,0)
            ->resize(150,150);

$img->save('uploaded/tmb/test2.jpg');