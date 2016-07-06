<?php

require_once __DIR__ . '/includes/header.inc.php';

require_once 'routes_backend.php';

$app->get('/', function() use($app){
   $app->render('index.php');
});

$app->get('/usuarios', function() use($app){
    $app->render('usuarios.php');
});

$app->get('/categorias', function() use($app){
    $app->render('/categorias.php');
});


$app->get('/test/:id', function($id) use($app){
    switch($id){
        case 'users':
            require_once __CONTROLLER__ . 'CUserController.class.inc.php';
            require_once 'core/classes/CLogs.class.inc.php';

            $log[__LINE__] = 'test';
            if(!$result = UserController::singleton()->getAll()){
                echo 'Fail';
            }


            break;
        case 'logs':
            require_once 'core/classes/CLogs.class.inc.php';
            $array = array('test' => 'test1', 'data' => 'dat2');
            $log[] = 'test';
            $log[] = $array;

            Logs::singleton()->setLog($log,'index.php',__LINE__);
            Logs::singleton()->addLogs('test');
            break;
    }
});

$app->run();