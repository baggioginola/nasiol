<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 5/11/2016
 * Time: 3:34 PM
 */


$paths = array (
    'controllers' => __CONTROLLER__,
    'classes-common' => CLASSES
);

foreach ($paths as $path) {
    if (!is_dir($path)) {
        continue;
    }

    if (!$handle = opendir($path)) {
        continue;
    }

    while (false !== ($file = readdir($handle))) {
        if (in_array($file, array('.', '..')) or (strpos($file, 'test')) !== false) {
            continue;
        }

        if ((strpos($path, 'controller')) !== false and strcasecmp($file, 'CLogsController.class.inc.php') != 0 ) {
            continue;
        }

        require_once $path . $file;
    }
}