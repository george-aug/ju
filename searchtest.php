<?php

/*require_once 'inc/database.php';
require_once 'inc/variables.php';
require_once 'vendor/autoload.php';
use Jenssegers\Blade\Blade;
$blade = new Blade('resources/views', 'resources/cache');*/

require_once 'app.php';

if(isset($_GET['srch-submit'])) {

    var_dump($_GET);
    echo "<br>";

    foreach ($_GET['srch_rel_array'] as $key=>$value){

        $k='srch_rel-'.$value;
        $_GET[$k]=$value;

     /*   $x= "$key=>$value";
        var_dump($x);*/
    }
    echo "<br>";
    echo "<br>";

    var_dump(json_encode($_GET));

    exit();


}
echo $blade->make('searchtest',[
        'maritals'=>$maritals,
        'religions'=>$religions
]);
