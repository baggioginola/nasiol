<?php

/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 5/12/2016
 * Time: 9:03 AM
 */
class Database
{
    private $link = null;

    protected function connect()
    {
        $this->link = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

        if (!$this->link) {
            return false;
        } else {
            return self::query('USE ' . DBNAME);
        }
    }

    protected function insert($data = array(), $table = '')
    {
        if (empty($data) || empty($table)) {
            return false;
        }

        $addString = queryAddString($data);

        if (empty($addString)) {
            return false;
        }

        $sql = 'INSERT INTO ' . $table . ' ' . $addString . ';';

        return self::query($sql);
    }

    protected function update($data = array(), $id_usuario = '', $table = '')
    {
        if (empty($data) || empty($table) || empty($id_usuario)) {
            return false;
        }

        $updateString = queryUpdateString($data);

        if (empty($updateString)) {
            return false;
        }

        $sql = 'UPDATE ' . $table . ' SET ' . $updateString . ' WHERE id_usuario = "' . $id_usuario . '" ;';

        return self::query($sql);
    }

    protected function remove($table = '', $where = '')
    {
        if (empty($table) || empty($where)) {
            return false;
        }

        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $where;

        $log[] = $sql;
        Logs::singleton()->setLog($log,__METHOD__,__LINE__);
        return self::query($sql);

    }

    protected function query($query = '')
    {
        if (is_null($this->link)) {
            return false;
        }
        if (empty($query)) {
            return false;
        }

        $result = mysqli_query($this->link, $query);

        $log[] = $result;

        Logs::singleton()->setLog($log,__METHOD__,__LINE__);
        if (!$result) {
            self::close_connection();
        }
        return $result;
    }

    protected function fetch_array($result)
    {
        $result = mysqli_fetch_array($result);
        return $result;
    }

    protected function fetch_assoc($result)
    {
        $result = mysqli_fetch_assoc($result);
        return $result;
    }

    protected function getLastId()
    {
        return mysqli_insert_id($this->link);
    }

    protected function close_connection()
    {
        mysqli_close($this->link);
        $this->link = null;
    }
}