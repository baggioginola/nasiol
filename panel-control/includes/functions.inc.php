<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 5/14/2016
 * Time: 12:02 PM
 */

function queryAddString($data = array())
{
    $addString = '';

    $columns = '';
    $values = '';
    $counter = 0;
    foreach ($data as $key => $value) {
        if($counter == sizeof($data) - 1){
            $columns .= $key;
            $values .= "'$value'";
        }
        else {
            $columns .= $key . ',';
            $values .= "'$value'" . ',';
        }
        $counter++;
    }

    if(!empty($columns) && !empty($values)) {
        $addString = '(' . $columns . ') VALUES (' . $values . ')';
    }

    return $addString;
}

function queryUpdateString($data = array())
{
    $updateString = '';
    $counter = 0;
    foreach($data as $key => $value) {
        if($counter == sizeof($data) - 1) {
            $updateString .= $key . '="' . $value . '"';
        }
        else {
            $updateString .= $key . ' = "' . $value . '", ';
        }
        $counter++;
    }

    return $updateString;
}

