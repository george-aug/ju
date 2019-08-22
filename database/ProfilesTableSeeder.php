<?php

require_once '../app.php';

$sql="TRUNCATE  TABLE profiles";
$mysqli->query($sql);

if($mysqli->query($sql) === true){
    echo "Table ready for fresh start.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
/*
 * Add faker data to users table
 * */
$num = 25;
$faker = Faker\Factory::create();
$sql = "INSERT INTO profiles (
            profile_id,
            photo,
            first_name,
            last_name,
            gender,
            height_id,   
            dob,                     
            religion_id,
            language_id,
            country_id,
            income_id,
            marital_id,
            manglik_id,
            horoscope,
            education_id,
            occupation_id,
            diet_id,
            smoke_id,
            drink_id,
            challenged_id,
            hiv,
            rsa
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $mysqli->stmt_init();
$stmt->prepare($sql);

/*
 * Note: In case of radio options
 * Yes is always one: based on principle of zero:one
 * exception gender where 1 equals male
 *
 *
 *
 *
 * */

for ($i=0; $i < $num; $i++) {

    $profileId = random_num(7);
    $photo = rand(0,1); // Not Uploaded:Uploaded. default=>0; CC
    $firstName = $faker->firstName;
    $lastName = $faker->lastName;
    $gender = rand(1,2); // Male:Female. default=>null; CC
    $heightId = getRandomTableId($heights_arr);
    $dob = $faker->date($format = 'Y-m-d', $max= '-18 years'); //s
    $religionId = getRandomTableId($religions_arr);
    $languageId = getRandomTableId($languages_arr);
    $countryId = getRandomTableId($countries_arr);
    $incomeId = getRandomTableId($incomes_arr);
    $maritalId = getRandomTableId($maritals_arr);
    $manglikId = getRandomTableId($mangliks_arr);
    $horoscope = array_rand($triple);  // 0:1:2 => NYF : Available : Not Available
    $eduId = getRandomTableId($educations_arr);
    $occId = getRandomTableId($occupations_arr);
    $dietId = getRandomTableId($diets_arr);
    $smokeId = getRandomTableId($smokes_arr);
    $drinkId = getRandomTableId($drinks_arr);
    $chaId = getRandomTableId($challenges_arr);
    $hiv = array_rand($triple);  // 0:1:2 => NYF : Yes : No
    $rsa = array_rand($triple); // 0:1:2 => NYF : Yes : No; NYF here also means undecided

    $stmt->bind_param("sissiisiiiiiiiiiiiiiii", $profileId, $photo,$firstName,$lastName,$gender,$heightId,$dob,
        $religionId,$languageId,$countryId,$incomeId,$maritalId,$manglikId,$horoscope,$eduId,$occId,$dietId,$smokeId,$drinkId,$chaId,$hiv,$rsa);
    $stmt->execute();

}

echo "<br>";
echo " Data inserted successfully";

