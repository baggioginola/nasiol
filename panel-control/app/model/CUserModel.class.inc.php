<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 5/12/2016
 * Time: 9:53 AM
 */
require_once CLASSES . 'CDatabase.class.inc.php';

class UserModel extends Database
{
    private static $object = null;
    private static $table = 'usuario';

    public static function singleton()
    {
        if (is_null(self::$object)) {
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

        $query = "SELECT id_usuario,nombre,apellidos,email FROM " . self::$table . " WHERE active = true";

        if (!$result = $this->query($query)) {
            return false;
        }

        while ($row = $this->fetch_assoc($result)) {
            $result_array[] = $row;
        }

        return $result_array;
    }

    public function getById($id_usuario = '')
    {
        if (empty($id_usuario)) {
            return false;
        }

        if (!$this->connect()) {
            return false;
        }

        $result_array = array();

        $query = "SELECT id_usuario,nombre,apellidos,email,password,nivel,password FROM " . self::$table . " WHERE id_usuario = '" . $id_usuario . "' ";

        if (!$result = $this->query($query)) {
            return false;
        }

        $this->close_connection();

        while ($row = $this->fetch_assoc($result)) {
            $result_array = $row;
        }

        return $result_array;
    }

    /**
     * @param array $data
     * @return bool|int|string
     */
    public function add($data = array())
    {
        if (empty($data)) {
            return false;
        }

        if (!$this->connect()) {
            return false;
        }

        if (!$this->insert($data, self::$table)) {
            return false;
        }

        $user_id = $this->getLastId();

        $this->close_connection();

        return $user_id;
    }

    /**
     * @param array $data
     * @return bool|int|string
     */
    public function edit($data = array(), $id_usuario = '')
    {
        if (empty($data) || empty($id_usuario)) {
            return false;
        }

        if (!$this->connect()) {
            return false;
        }

        if (!$result = $this->update($data, $id_usuario, self::$table)) {
            return false;
        }

        $this->close_connection();

        return $result;
    }
}