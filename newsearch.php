<?php

require_once 'app.php';

$sql = "SELECT
    profiles.id,
    profiles.profile_no,
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
   
    ";

$fields = ['rel','lan','con','mar','edu','ocu','die','smo','dri','man','cha']; // Only fields which are array
foreach($fields as $field){
    ${$field} = array();
    ${$field.'_query'} = array();
}
$queries=array();
$getters = array();
$minAge=21;
$maxAge=35;
$minHt=1;
$maxHt=30;
$gen=null;
$pho=null;
$hor=null;
$hiv=0; // has to be 2
$rsa=null;

if(isset($_POST['srch-submit'])){

    foreach($_POST as $key =>$value){
        //$value = is_array($value) ? $value : trim($value);

        if(!empty($value) ) {

            if(is_array($value)){

                //var_dump($key);
                //var_dump($value);
                echo "<br>";

                /*
                 * Processing ${$key}
                 * */
                foreach ($_POST[$key] as $ke => $val) {
                    array_push(${$key}, $val); // Pushing into array eg. $rel array for religion
                }
                ${$key} = array_filter(${$key}); // Removing null values from array
                //var_dump(${$key});
                echo "<br>";

                ${$key.'_query'} = implode(",", ${$key});

                if(!empty(${$key.'_query'})){

                    switch ($key){
                        case 'rel':
                            $query = ${$key.'_query'};
                            array_push($queries,"profiles.religion_id IN ($query)");
                            break;

                        case 'lan':
                            $query = ${$key.'_query'};
                            array_push($queries,"profiles.language_id IN ($query)");
                            break;

                        case 'con':
                            $query = ${$key.'_query'};
                            array_push($queries,"profiles.country_id IN ($query)");
                            break;

                        case 'mar':
                            $query = ${$key.'_query'};
                            array_push($queries,"profiles.marital_id IN ($query)");
                            break;

                        case 'edu':
                            $query = ${$key.'_query'};
                            array_push($queries,"profiles.education_id IN ($query)");
                            break;

                        case 'ocu':
                            $query = ${$key.'_query'};
                            array_push($queries,"profiles.occupation_id IN ($query)");
                            break;

                        case 'die':
                            $query = ${$key.'_query'};
                            array_push($queries,"profiles.diet_id IN ($query)");
                            break;

                        case 'smo':
                            $query = ${$key.'_query'};
                            array_push($queries,"profiles.smoke_id IN ($query)");
                            break;

                        case 'dri':
                            $query = ${$key.'_query'};
                            array_push($queries,"profiles.drink_id IN ($query)");
                            break;

                        case 'man':
                            $query = ${$key.'_query'};
                            array_push($queries,"profiles.manglik_id IN ($query)");
                            break;

                        case 'cha':
                            $query = ${$key.'_query'};
                            array_push($queries,"profiles.challenged_id IN ($query)");
                            break;
                    }

                }

            }

            else{

               /* echo "Not Array: ";
                var_dump($key);
                var_dump($value);*/
                echo "<br>";

                /*
                 * Processing ${$key}
                 * */
                $v=${$key} = trim($value);
                //var_dump(${$key});
                echo "<br>";

                if(!empty($v)){
                    switch ($key){
                        case 'gen':
                            array_push($queries,"profiles.gender=$v");
                            break;

                        case 'pho':
                            array_push($queries,"profiles.photo=$v");
                            break;

                        case 'hor':
                            array_push($queries,"profiles.horoscope=$v");
                            break;

                        case 'hiv':
                            if($v==2){
                                array_push($queries,"profiles.hiv<>1");
                            }else{
                                array_push($queries,"profiles.hiv=$v");
                            }
                            break;

                        case 'rsa':
                            if($v==1){
                                // Yes option will show all rows with 0 & 1
                                array_push($queries,"profiles.rsa<>2");
                            }else{
                                array_push($queries,"profiles.rsa=$v");
                            }
                            break;

                        case 'minHt':
                            array_push($queries, "profiles.height_id >=$v");
                            break;

                        case 'maxHt':
                            array_push($queries, "profiles.height_id <=$v");
                            break;

                        case 'minAge':
                            $maxDate = \Carbon\Carbon::today()->subYears($v)->endOfDay()->toDateString();
                            array_push($queries, "profiles.dob <= CAST('$maxDate' AS DATE)");
                            break;

                        case 'maxAge':
                            $minDate = \Carbon\Carbon::today()->subYears($v)->toDateString();
                            array_push($queries, "profiles.dob >= CAST('$minDate' AS DATE)");
                            break;
                    }
                }
            }
        }
       /* if($key=="rsa" && $value==0){
            //${$key}=0;
            array_push($queries,"profiles.rsa<>2");
        }*/
    }

    //var_dump($queries);

    echo "<br>";
    echo "<br>";

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


    //var_dump($sql);

    echo "<br>";
    echo "<br>";

}


$result = $mysqli->query($sql);
$num = mysqli_num_rows($result);
$profiles =array();
while ($record=$result->fetch_object()) {
    $profiles[] = $record;
}


echo $blade->make('newsearch',
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
        'challenges'=>$challenges,
        'rel'=>$rel,
        'lan'=>$lan,
        'con'=>$con,
        'mar'=>$mar,
        'edu'=>$edu,
        'ocu'=>$ocu,
        'die'=>$die,
        'smo'=>$smo,
        'dri'=>$dri,
        'man'=>$man,
        'cha'=>$cha,
        'gen'=>$gen,
        'pho'=>$pho,
        'hor'=>$hor,
        'hiv'=>$hiv,
        'rsa'=>$rsa,
        'minAge'=>$minAge,
        'maxAge'=>$maxAge,
        'minHt'=>$minHt,
        'maxHt'=>$maxHt
    ]);

