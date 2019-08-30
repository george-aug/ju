<?php

include_once 'app.php';
include_once 'authenticate.php';

echo $blade->make('matrimony.create-profile',[
    'fors'=>$fors,
    'religions'=>$religions,
    'maritals'=>$maritals,
    'heights'=>$heights
]);
