<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 5/4/2016
 * Time: 6:10 PM
 */

$app->get('/', function() use ($app) {
    $app->render('index.php');
});

$app->get('/informacion-nanotecnologia', function() use ($app){
    $app->render('informacion.php');
});

$app->get('/acerca-nanotecnologia', function() use ($app){
    $app->render('acerca_nanotecnologia.php');
});

$app->get('/nano-capas', function() use ($app){
    $app->render('nano_capas.php');
});

$app->get('/nano-capas-catalogo', function() use ($app){
    $app->render('nano_capas_catalogo.php');
});

$app->get('/acerca', function() use ($app){
    $app->render('acerca.php');
});

$app->get('/franquicia', function() use ($app){
    $app->render('franquicia.php');
});

$app->get('/contacto', function() use ($app){
    $app->render('contacto.php');
});

$app->get('/videos-producto', function() use ($app){
    $app->render('producto_videos.php');
});