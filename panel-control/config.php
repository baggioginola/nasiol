<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 5/11/2016
 * Time: 11:35 AM
 */
define('ENVIRONMENT', 'test'); # must be production or test.
define('__ROOT__', dirname(__FILE__));
//define('PROJECT', 'vc/test/nasiol/panel-control/');
define('PROJECT', 'vc/test/Github/nasiol/panel-control/');
define('DOMAIN', 'http://' . $_SERVER['HTTP_HOST'] . '/' . PROJECT);

define('CSS', DOMAIN . 'includes/public/css/');
define('JS', DOMAIN . 'includes/public/js/');
define('IMAGES', DOMAIN . 'includes/public/img/');
define('FONTS', DOMAIN . 'includes/public/fonts/');
define('DATATABLE',DOMAIN . 'includes/public/dataTable/');
define('FILEINPUT',DOMAIN . 'includes/public/bootstrap-fileinput-master/');
define('CLASSES', __ROOT__ . '/core/classes/');
define('__CONTROLLER__', __ROOT__ . '/app/controller/');
define('__MODEL__', __ROOT__ . '/app/model/');
define('FRAMEWORK', __ROOT__ . '/core/framework/');
define('INCLUDES', DOMAIN . 'includes/');

#templates
define('TEMPLATE',  __ROOT__ . '/app/view/template/');
define('BASE_IMAGES',  __ROOT__ . '/includes/public/img/');
#Databases
define('DBHOST', 'localhost');
define('DBNAME', 'nasiol');
define('DBUSER', 'root');
define('DBPASS', '');

#Mail recipient.
define('MAIL_RECIPIENT', 'mariocuevas88@gmail.com');
define('MAIL_FROM', 'From: Debugger-Core <debug@nasiol.com>');

#Response codes
define('STATUS_SUCCESS', 200);
define('STATUS_FAILURE_CLIENT', 404);
define('STATUS_FAILURE_INTERNAL', 500);

define('MESSAGE_SUCCESS', 'La transaccion fue exitosa');
define('MESSAGE_ERROR', 'La transaccion fue fallida, intente mas tarde');
define('MESSAGE_EMPTY', 'El registro no existe');
define('MESSAGE_EXISTS', 'El nombre ya existe, intente otro diferente');