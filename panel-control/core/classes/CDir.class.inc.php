<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 7/11/2016
 * Time: 9:43 AM
 */
class CDir{

    private static $object = null;
    private $log = array();
    private $dir = null;

    public static function singleton()
    {
        if(!isset(self::$object)) {
            self::$object = new CDir();
        }
        return self::$object;
    }

    public function createDir($dir = null)
    {
        if(empty($dir)) {
            return false;
        }

        $this->dir = $dir;

        if(file_exists($this->dir)) {
            return true;
        }

        mkdir($this->dir, 0777);
        return true;
    }

    public function scanDir()
    {
        $this->log[] = 'Scan directory: ';
        $this->log[] = scandir($this->dir);
    }

    public function getLog()
    {
        return $this->log;
    }
}