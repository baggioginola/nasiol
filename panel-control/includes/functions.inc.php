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

function createName($data = null)
{
    $name = '';
    $name_trimmed = trim(strtolower($data));
    $name_exploded = explode(" ",$name_trimmed);

    foreach ($name_exploded as $key) {
        if ($key !== end($name_exploded)) {
            $name .= $key . "-";
        }
        $name .= $key;
    }
    return $name;
}

function resizeImage($path, $height, $width, $extension)
{
    if($extension == 'jpg') {
        $img_original = imagecreatefromjpeg($path);
    }
    else if($extension == 'png') {
        $img_original = imagecreatefrompng($path);
    }
    else {
        $img_original = imagecreatefromjpeg($path);
    }

    $max_ancho = $width;
    $max_alto = $height;

    list($ancho,$alto) = getimagesize($path);

    $x_ratio = $max_ancho / $ancho;
    $y_ratio = $max_alto / $alto;

    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ) {
        $ancho_final = $ancho;
        $alto_final = $alto;
    }
    elseif (($x_ratio * $alto) < $max_alto) {
        $alto_final = ceil($x_ratio * $alto);
        $ancho_final = $max_ancho;
    }
    else {
        $ancho_final = ceil($y_ratio * $ancho);
        $alto_final = $max_alto;
    }

    $tmp = imagecreatetruecolor($ancho_final,$alto_final);

    imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);

    imagedestroy($img_original);

    $tmp2 = imagecreatetruecolor($width, $height);

    if($extension == 'jpg'){
        $color = imagecolorallocate($tmp2, 255, 255, 255);
        imagefill($tmp2, 0, 0, $color);
    }
    else {
        $color = imagecolorallocate($tmp2, 0, 0, 0);
        imagecolortransparent($tmp2,$color);
    }

    $distancia_x = round(($max_ancho - $ancho_final) / 2);
    $distancia_y = round(($max_alto - $alto_final) / 2);

    imagecopy($tmp2 , $tmp , $distancia_x ,$distancia_y , 0, 0 , $ancho_final , $alto_final );

    if($extension == 'jpg') {
        $calidad = 80;
        imagejpeg($tmp2,$path,$calidad);
    }
    else {
        $calidad = 8;
        imagepng($tmp2, $path, $calidad, PNG_ALL_FILTERS);
    }
}