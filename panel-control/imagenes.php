<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 7/6/2016
 * Time: 4:07 PM
 */

$app->group('/imagenes', function () use($app) {

    $app->post('/add', function() use($app){
        require_once __CONTROLLER__ . 'CImagesController.class.inc.php';
        if(!$result = Images::singleton()->add()) {
            echo 'Fail';
        }
        echo $result;
    });
});