<?php

include_once 'app.php';

$sql = "SELECT id,ptype,name,abbreviation FROM parties ORDER BY ptype,id";

if ($result = $mysqli->query($sql)) {
    if ($result->num_rows > 0) {

        $types =array();
        while ($record=$result->fetch_object()) {
            $types[$record->ptype][] = $record;
        }

        //var_dump($types);
        echo $blade->make('parties', ['types'=>$types]);

    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
