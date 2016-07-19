<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 7/6/2016
 * Time: 4:07 PM
 */

$app->group('/productos', function () use($app) {
    $app->post('/getAll', function() use($app){
        require_once __CONTROLLER__.'CProductsController.class.inc.php';
        if(!$result = Products::singleton()->getAll()){
            echo 'Fail';
        }
        echo $result;

    });

    $app->post('/add', function() use($app){
        require_once __CONTROLLER__ . 'CProductsController.class.inc.php';
        if(!$result = Products::singleton()->add()) {
            echo 'Fail';
        }
        echo $result;
    });

    $app->post('/getById', function() use($app){
        require_once __CONTROLLER__ . 'CProductsController.class.inc.php';
        if(!$result = Products::singleton()->getById()) {
            echo 'Fail';
        }
        echo $result;
    });

    $app->post('/edit', function() use($app){
        require_once __CONTROLLER__ . 'CProductsController.class.inc.php';
        if(!$result = Products::singleton()->edit()) {
            echo 'Fail';
        }
        echo $result;
    });

    $app->post('/delete', function() use($app){
        require_once __CONTROLLER__ . 'CProductsController.class.inc.php';
        if(!$result = Products::singleton()->delete()) {
            echo 'Fail';
        }
        echo $result;
    });

    $app->post('/checkDuplicatedName', function() use($app){
        require_once __CONTROLLER__ . 'CProductsController.class.inc.php';
        if(!$result = Products::singleton()->checkDuplicatedName()) {
            echo 'Fail';
        }
        echo $result;
    });
});