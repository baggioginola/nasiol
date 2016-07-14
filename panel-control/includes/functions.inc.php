<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 5/14/2016
 * Time: 12:02 PM
 */

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

    $max_width = $width;
    $max_height = $height;

    list($ancho,$alto) = getimagesize($path);

    $x_ratio = $max_width / $ancho;
    $y_ratio = $max_height / $alto;

    if( ($ancho <= $max_width) && ($alto <= $max_height) ) {
        $ancho_final = $ancho;
        $alto_final = $alto;
    }
    elseif (($x_ratio * $alto) < $max_height) {
        $alto_final = ceil($x_ratio * $alto);
        $ancho_final = $max_width;
    }
    else {
        $ancho_final = ceil($y_ratio * $ancho);
        $alto_final = $max_height;
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

    $distancia_x = round(($max_width - $ancho_final) / 2);
    $distancia_y = round(($max_height - $alto_final) / 2);

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

/**
 * Sanitizes an user inputed variable or a GET variable
 *
 * @param string $variable Variable to be sanitized
 * @param string $filter Filter to be used. Default FILTER_SANITIZE_STRING,
 *        all the available filters are listed at http://php.net/manual/en/filter.filters.php
 *
 * @return array Information about the country.
 */
function sanitizeVariable($variable, $filter = FILTER_SANITIZE_STRING) {
    return filter_var($variable, FILTER_SANITIZE_STRING);
}

function stripNonAlphaNumeric( $string ) {
    return preg_replace( "/[^a-z0-9]/i", "", $string );
}

function stripExcessWhitespace($string)
{
    return preg_replace( '/  +/', ' ', $string );
}

function stripNonAlphaNumericSpaces( $string ) {
    return preg_replace( "/[^a-z0-9 ]/i", "", $string );
}

function formatForUrl( $string )
{
    $string = stripNonAlphaNumericSpaces( trim( strtolower( $string ) ) );

    return str_replace( " ", "-", stripExcessWhitespace( trim($string) ) );
}

function formatString($string)
{
    $string = stripNonAlphaNumericSpaces(trim($string));

    return stripExcessWhitespace(trim($string));
}