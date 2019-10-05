<?php

/*require_once 'inc/database.php';
require_once 'inc/variables.php';
require_once 'vendor/autoload.php';
use Jenssegers\Blade\Blade;
$blade = new Blade('resources/views', 'resources/cache');*/

require_once 'app.php';

$sql = "SELECT
    profiles.id,
    profiles.pno,
    profiles.user_id,
    profiles.photo,
    profiles.first_name,
    profiles.last_name,
    profiles.gender,
    profiles.dob,
    
    heights.feet as ht, 
    religions.name as religen,
    languages.text as lang,
    countries.name as country,
    incomes.level as income,
    maritals.status as mstatus,
    mangliks.status as manglik,
    
    profiles.horoscope, 
    educations.name as edu,
    occupations.name as occ,
    diets.type as diet,
    smokes.status as smoke,
    drinks.status as drink,
    challenged.status as challeng,    
    
    profiles.hiv,
    profiles.rsa
    
    FROM profiles
    
    JOIN heights ON heights.id = profiles.height_id
    JOIN religions ON religions.id = profiles.religion_id
    JOIN languages ON languages.value = profiles.language_id
    JOIN countries ON countries.id = profiles.country_id
    JOIN incomes ON incomes.id = profiles.income_id
    JOIN maritals ON maritals.id = profiles.marital_id
    JOIN mangliks ON mangliks.id = profiles.manglik_id
    
    JOIN educations ON educations.id = profiles.education_id
    JOIN occupations ON occupations.id = profiles.occupation_id
    
    JOIN diets ON diets.id = profiles.diet_id
    JOIN smokes ON smokes.id = profiles.smoke_id
    JOIN drinks ON drinks.id = profiles.drink_id
    JOIN challenged ON challenged.id = profiles.challenged_id
   
    ORDER BY profiles.id";

$result = $mysqli->query($sql);
$profiles =array();
while ($record=$result->fetch_object()) {
    $profiles[] = $record;
}

//var_dump(json_encode($profiles));

echo $blade->make('profiles',['profiles'=>$profiles]);