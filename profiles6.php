<?php

// Rough



/*$cProfiles =array();
while ($record=$result->fetch_object()) {

    // Converting into associative array
    $cProfiles[$record->id]['id']=$record->id;
    $cProfiles[$record->id]['pno']=$record->pno;
    $cProfiles[$record->id]['photo']=$record->photo;
    $cProfiles[$record->id]['first_name']=$record->first_name;
    $cProfiles[$record->id]['last_name']=$record->last_name;
    $cProfiles[$record->id]['gender']=$record->gender;
    $cProfiles[$record->id]['dob']=$record->dob;

    //$cProfiles[$record->id]['pics'][]['fn']=$record->filename;
    /*foreach($record->filename as $rec){
        $cProfiles[$record->id]['pics'][]['fn']=$record->filename;
        $cProfiles[$record->id]['pics'][]['pp']=$record->pp;
    }*/
    if($record->filename!=null){
        $cProfiles[$record->id]['album'][$record->id][]['fn']=$record->filename;
        $cProfiles[$record->id]['album'][$record->id][]['pp']=$record->pp;
    }

//    $cProfiles[$record->id]->id=$record->id;
//    $cProfiles[$record->id]->pno=$record->pno;
//    if($record->filename!=null){
//        $cProfiles[$record->id]->pics[]=$record->filename;
//    }


}*/
