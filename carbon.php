<?php

include_once 'vendor/autoload.php';
use Carbon\Carbon;
$faker = Faker\Factory::create();

echo $faker->date($format = 'Y-m-d', $max= '-18 years'); // '1979-06-09'
echo "<br>";
echo $faker->date($format = 'Y-m-d', $max = 'now'); // '1979-06-09'
echo "<br>";
echo $faker->date($format = 'Y-m-d', $max = 'now'); // '1979-06-09'
echo "<br>";
echo $faker->date($format = 'Y-m-d', $max = 'now'); // '1979-06-09'
echo "<br>";
echo $faker->date($format = 'Y-m-d', $max = 'now'); // '1979-06-09'
echo "<br>";
echo $faker->date($format = 'Y-m-d', $max = 'now'); // '1979-06-09'
echo "<br>";
echo $faker->date($format = 'Y-m-d', $max = 'now'); // '1979-06-09'
