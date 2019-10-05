<?php

/*
 * Following three conditions as handled:
 * 1st: The user is logged in but not created profile means gender not set
 * 2nd: The user is logged in and created profile means gender set
 * 3rd: The user is not logged in
 * */

if(isset($_SESSION['logged-in']) && isset($_SESSION['gen'])){

    $usi = $_SESSION['id'];
    $gen = $_SESSION['gen'];

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
   
    WHERE profiles.gender != '".$gen."' 
    AND profiles.user_id != '".$usi."'
    ORDER BY profiles.id";

}elseif(isset($_SESSION['logged-in']) && !isset($_SESSION['gen'])){

    $usi = $_SESSION['id'];
    $gen = isset($_POST['gen']) ? $_POST['gen']:1;

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
   
    WHERE profiles.gender != '".$gen."' 
    AND profiles.user_id != '".$usi."'
    ORDER BY profiles.id";

}else{
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
}

