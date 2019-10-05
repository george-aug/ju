<?php

include_once 'app.php';

$profileId = $_GET['id'];

$sql = "SELECT 
    profiles.*,
    heights.feet as ht, 
    religions.name as religion,
    languages.text as lang,
    maritals.status as mstatus,
    educations.name as edu,
    degrees.name as deg,
    universities.name as university,
    occupations.name as occ,
    sectors.name as sector,
    incomes.level as income,
    fathers.status as faa,
    mothers.status as maa,
    fam_affluence.status as fama,
    fam_values.name as famv,
    fam_types.name as famt,
    fam_incomes.level as fami,
    diets.type as diet,
    smokes.status as smoke,
    drinks.status as drink,
    bodies.type as body,
    complexions.type as complexion,
    blood_groups.type as bg,
    thalassemia.status as thal,
    challenged.status as chal,
    citizenship.status as res,
    signs.text as sun,
    rashis.text as rashi,
    nakshatras.text as nak,
    mangliks.status as manglik
    
    FROM profiles
    
    LEFT JOIN heights ON heights.id = profiles.height_id
    LEFT JOIN religions ON religions.id = profiles.religion_id
    LEFT JOIN languages ON languages.value = profiles.language_id
    LEFT JOIN maritals ON maritals.id = profiles.marital_id    
    LEFT JOIN educations ON educations.id = profiles.education_id
    LEFT JOIN degrees ON degrees.id = profiles.degree_id
    LEFT JOIN universities ON universities.id = profiles.university_id
    LEFT JOIN occupations ON occupations.id = profiles.occupation_id
    LEFT JOIN sectors ON sectors.id = profiles.sector_id
    LEFT JOIN incomes ON incomes.id = profiles.income_id
    LEFT JOIN fathers ON fathers.id = profiles.father_id
    LEFT JOIN mothers ON mothers.id = profiles.mother_id
    LEFT JOIN fam_affluence ON fam_affluence.id = profiles.famAffluence_id
    LEFT JOIN fam_values ON fam_values.id = profiles.famValue_id
    LEFT JOIN fam_types ON fam_types.id = profiles.famType_id
    LEFT JOIN fam_incomes ON fam_incomes.id = profiles.famIncome_id
    LEFT JOIN diets ON diets.id = profiles.diet_id
    LEFT JOIN smokes ON smokes.id = profiles.smoke_id
    LEFT JOIN drinks ON drinks.id = profiles.drink_id
    LEFT JOIN bodies ON bodies.id = profiles.body_id
    LEFT JOIN complexions ON complexions.id = profiles.complexion_id
    LEFT JOIN blood_groups ON blood_groups.id = profiles.bGroup_id
    LEFT JOIN thalassemia On thalassemia.id = profiles.thalassemia_id
    LEFT JOIN challenged ON challenged.id = profiles.challenged_id
    LEFT JOIN citizenship ON citizenship.id = profiles.citizenship_id
    LEFT JOIN signs ON signs.id = profiles.sun_id
    LEFT JOIN rashis ON rashis.id = profiles.moon_id
    LEFT JOIN nakshatras ON nakshatras.id = profiles.nakshatra_id
    LEFT JOIN mangliks ON mangliks.id = profiles.manglik_id
    
 WHERE pno = ?";
$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);
$stmt->bind_param('s',$profileId);
$stmt->execute();

$result = $stmt->get_result();
if(!$row = $result->fetch_object()){

    header("Location: error-404.php?type=error&sms=no-user");
    exit();
}
else{
    echo $blade->make('profile',['profile'=>$row]);
}
