<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 6/24/2016
 * Time: 4:50 PM
 */
require_once CLASSES . 'CDatabase.class.inc.php';

class CategoriesModel extends Database
{
    private static $object = null;
    private static $table = 'categoria';

    public static function singleton()
    {
        if(is_null(self::$object)) {
            self::$object = new self();
        }
        return self::$object;
    }

    /**
     * @return array|bool
     */
    public function getAll()
    {
        if (!$this->connect()) {
            return false;
        }
        $result_array = array();

        $query = "SELECT id_categoria,nombre FROM " . self::$table . " WHERE active = true";

        $log[] = $query;

        Logs::singleton()->setLog($log,__METHOD__,__LINE__);

        if (!$result = $this->query($query)) {
            Logs::singleton()->addLogs('Categories');
            return false;
        }
        Logs::singleton()->addLogs('Categories');

        while ($row = $this->fetch_assoc($result)) {
            $result_array[] = $row;
        }

        return $result_array;
    }
}