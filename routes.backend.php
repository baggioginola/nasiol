<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 7/14/2016
 * Time: 1:02 PM
 */

$app->group('/categorias', function () use($app) {
    $app->post('/getAll', function() use($app){
        require_once __CONTROLLER__.'CCategoriesController.class.inc.php';
        if(!$result = Categories::singleton()->getAll()){
            echo 'Fail';
        }
        echo $result;

    });

    $app->post('/getByName', function() use($app){
        require_once __CONTROLLER__.'CCategoriesController.class.inc.php';
        if(!$result = Categories::singleton()->getByName()){
            echo 'Fail';
        }
        echo $result;

    });
});

$app->group('/productos', function () use($app) {
    $app->post('/getByCategory', function() use($app){
        require_once __CONTROLLER__.'CProductsController.class.inc.php';
        if(!$result = Products::singleton()->getByCategory()){
            echo 'Fail';
        }
        echo $result;

    });
});