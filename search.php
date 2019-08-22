<?php

/*require_once 'inc/database.php';
require_once 'inc/variables.php';
require_once 'vendor/autoload.php';
use Jenssegers\Blade\Blade;
$blade = new Blade('resources/views', 'resources/cache');*/

require_once 'app.php';

$sql = "SELECT
    profiles.id,
    profiles.profile_id,
    profiles.photo,
    profiles.first_name,
    profiles.last_name,
    profiles.gender,
    profiles.dob,
    
    heights.feet as ht, 
    religions.name as religen,
    languages.name as lang,
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
    JOIN languages ON languages.id = profiles.language_id
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
   
    ";

if(isset($_GET['srch-submit'])){

    $religionsAry=array();
    $locations=array();
    $getters=array();
    $queries=array();

    foreach ($_GET as $key =>$value){
        $temp = is_array($value) ? $value : trim($value);

        if(!empty($temp)){
            list($key) = explode("-",$key);

            if ($key == 'srch_rel'){
                array_push($religionsAry,$value);
            }

            if ($key == 'srch_locations'){
                array_push($locations,$value);
            }
            if (!in_array($key,$getters)){
                $getters[$key]=$value;
            }

        }

        var_dump($temp);
        echo "<br>";
    }

    var_dump($religionsAry);
    echo "<br>";
    echo "<br>";

    if (!empty($religionsAry)){
        $rel_qry = implode(",",$religionsAry);
    }
    var_dump($religionsAry);

    if (!empty($locations)){
        $loc_qry = implode(",",$locations);
    }
    echo "Madharchood";
    var_dump($loc_qry);

    if (!empty($getters)){
        foreach ($getters as $key=>$value){
            ${$key}=$value;
            switch ($key){
                /*case 'srch_for':
                    array_push($queries,"(
                    bk.title LIKE '%".$_GET['srch_for']."%' ||
                    bk.description LIKE '%".$_GET['srch_for']."%' ||
                    bk.isbn LIKE '%".$_GET['srch_for']."%'
                )");
                    break;*/



                case 'srch_gen':
                    array_push($queries,"profiles.gender='".$_GET['srch_gen']."'");
                    break;

                case 'srch_rel':
                    array_push($queries,"profiles.religion_id IN ($rel_qry)");
                    break;

                /*case 'srch_language':
                    array_push($queries,"profiles.language_id='".$_GET['srch_language']."'");
                    break;*/



                /*case 'srch_year':
                    array_push($queries,"YEAR(bk.date_released)='".$_GET['srch_year']."'");
                    break;

                case 'srch_locations':
                    array_push($queries,"bk_lc.location_id IN ($loc_qry)");
                    break;*/
            }
        }
    }

    if(!empty($queries)){
        $sql .= " WHERE ";
        $i=1;
        foreach ($queries as $query){
            if($i < count($queries)){
                $sql .= $query." AND ";
            }else{
                $sql .= $query;
            }
            $i++;
        }
    }

    $sql .= " ORDER BY profiles.id ASC";

}

$result = $mysqli->query($sql);
$num = mysqli_num_rows($result);
$profiles =array();
while ($record=$result->fetch_object()) {
    $profiles[] = $record;
}


echo $blade->make('search',
        [
            'profiles'=>$profiles,
            'num' => $num,
            'languages'=>$languages,
            'religions'=>$religions,
            'countries'=>$countries,
            'maritals'=>$maritals,
            'age_rows'=>$age_rows,
            'heights'=>$heights,
            'mangliks'=>$mangliks,
            'educations'=>$educations,
            'occupations'=>$occupations,
            'diets'=>$diets,
            'drinks'=>$drinks,
            'smokes'=>$smokes,
            'challenges'=>$challenges
        ]);
