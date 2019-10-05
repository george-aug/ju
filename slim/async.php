<?php

require_once '../app.php';
require_once('slim.php');

try {
    $images = Slim::getImages();
}
catch (Exception $e) {

    Slim::outputJSON(array(
        'status' => SlimStatus::FAILURE,
        'message' => 'Unknown'
    ));

    return;
}

if ($images === false) {

    Slim::outputJSON(array(
        'status' => SlimStatus::FAILURE,
        'message' => 'No data posted'
    ));

    return;
}

$image = array_shift($images);

if (!isset($image)) {

    Slim::outputJSON(array(
        'status' => SlimStatus::FAILURE,
        'message' => 'No images found'
    ));

    return;
}

if (!isset($image['output']['data']) && !isset($image['input']['data'])) {

    Slim::outputJSON(array(
        'status' => SlimStatus::FAILURE,
        'message' => 'No image data'
    ));

    return;
}

if (isset($image['output']['data'])) {

    $txt = md5($_SESSION['pno']);
    $name = $txt.'.jpg';

    // get the crop data for the output image
    $data = $image['output']['data'];

    // If you want to store the file in another directory pass the directory name as the third parameter.
    // $output = Slim::saveFile($data, $name, 'my-directory/');

    // If you want to prevent Slim from adding a unique id to the file name add false as the fourth parameter.
    // $output = Slim::saveFile($data, $name, 'tmp/', false);

    // Default call for saving the output data
    $output = Slim::saveFile($data, $name,'../uploaded/pics/');

    if($output){
        $pid = $_SESSION['pid'];
        $nm = $output['name'];
        $tn = 'tn_'.$nm;
        $img_id = $image['meta']->picId;

        // Creating thumbnail from output image
        $w = $manager->make('../uploaded/pics/'.$nm)->width();
        $img = $manager->make('../uploaded/pics/'.$nm)
            ->crop($w,$w,0,0)
            ->resize(150,150);
        $img->save('../uploaded/tmb/'.$tn);

        //$sql1 = "DELETE FROM images WHERE profile_id='".$pid."' AND img_id ='".$img_id."'";
        //$re=$mysqli->query($sql1);

        //$sql = "INSERT INTO images (profile_id,img_id,filename) VALUES ('$pid','$img_id','$nm')";
        $sql = "INSERT INTO images (profile_id,filename) VALUES ('$pid','$nm')";
        if ($mysqli->query($sql) === TRUE) {
           $_SESSION['msg']="New record created successfully";
        } else {
           $_SESSION['msg']="Error: " . $sql . "<br>" . $mysqli->error;
        }
   }

}

// if we've received input data (do the same as above but for input data)
if (isset($image['input']['data'])) {

    // get the name of the file
    //$name = $image['input']['name'];
    $name = $_SESSION['pno'].'.jpg';

    // get the crop data for the output image
    $data = $image['input']['data'];

    // If you want to store the file in another directory pass the directory name as the third parameter.
    // $input = Slim::saveFile($data, $name, 'my-directory/');

    // If you want to prevent Slim from adding a unique id to the file name add false as the fourth parameter.
    // $input = Slim::saveFile($data, $name, 'tmp/', false);

    // Default call for saving the input data
    $input = Slim::saveFile($data, $name,'../uploaded/pics/');

}



//
// Build response to client
//
$response = array(
    'status' => SlimStatus::SUCCESS
);

if (isset($output) && isset($input)) {

    $response['output'] = array(
        'file' => $output['name'],
        'path' => $output['path']
    );

    $response['input'] = array(
        'file' => $input['name'],
        'path' => $input['path']
    );

}
else {
    $response['file'] = isset($output) ? $output['name'] : $input['name'];
    $response['path'] = isset($output) ? $output['path'] : $input['path'];
}

// Return results as JSON String
Slim::outputJSON($response);
