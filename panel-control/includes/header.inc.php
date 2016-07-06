<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 5/11/2016
 * Time: 3:33 PM
 */

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../autoload.common.php';
require_once FRAMEWORK . 'Slim/Slim.php';
require_once 'functions.inc.php';
require_once CLASSES . 'CLogs.class.inc.php';

if (strcasecmp(ENVIRONMENT, 'test') == 0) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

\Slim\Slim::registerAutoloader();

$app  = new \Slim\Slim(array(
        'debug' => true,
        'templates.path' => 'app/view/',
        'view' => '\Slim\LayoutView',
        'layout' => 'layouts/master.php',
        'http.version' => '1.1'
    )
);

$app->notFound(function () use ($app) {

    $response = array(
        'type' => 'not_found',
        'message' => 'The requested resource does not exist.'
    );
});