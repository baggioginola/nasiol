<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 6/24/2016
 * Time: 11:43 AM
 */

require_once 'CDatabase.class.inc.php';

class Logs extends Database
{
    private static $object = null;
    private static $table = 'logs';

    private $parameters = array();
    private $log = array();

    public static function singleton()
    {
        if (is_null(self::$object)) {
            self::$object = new self();
        }
        return self::$object;
    }

    public function addLogs($service = '')
    {
        if (empty($service)) {
            return false;
        }

        if (!$this->connect()) {
            return false;
        }

        $this->_setParameters($service);

        if (!$this->insert($this->parameters, self::$table)) {
            return false;
        }

        $this->close_connection();

        return true;

    }

    public function setLog($info, $method = '', $line = '')
    {
        if (empty($info) || empty($method) || empty($line)) {
            return false;
        }
        $this->log[$method][$line] = $info;
    }

    public function getLog()
    {
        if(empty($this->log)) {
            return false;
        }
        return print_r($this->log,1);
    }

    private function _setParameters($service)
    {
        $this->parameters['service'] = $service;
        $this->parameters['info'] = $this->getLog();
    }
}