<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 6/24/2016
 * Time: 4:46 PM
 */

require_once 'CBaseController.class.inc.php';
require_once __MODEL__ . 'CCategoriesModel.class.inc.php';

class Categories extends BaseController
{
    private static $object = null;

    public static function singleton()
    {
        if (is_null(self::$object)) {
            self::$object = new self();
        }
        return self::$object;
    }

    public function getAll()
    {
        $result = CategoriesModel::singleton()->getAll();
        return json_encode($result);
    }

}