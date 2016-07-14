<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 7/8/2016
 * Time: 4:33 PM
 */

require_once 'CBaseController.class.inc.php';
require_once CLASSES . 'CDir.class.inc.php';

class Images extends BaseController
{
    public static $object = null;

    private $parameters = array();

    private $name = null;
    private $pathImage = null;
    private $type = null;

    private $sizes = array(
        'categorias' => array('0' => array('width' => 927, 'height' => 285),
            '1' => array('width' => 307, 'height' => 128),
            '2' => array('width' => 307, 'height' => 128),
            '3' => array('width' => 307, 'height' => 128))
    );

    /**
     * @return Images|null
     */
    public static function singleton()
    {
        if (is_null(self::$object)) {
            self::$object = new self();
        }
        return self::$object;
    }

    /**
     * @return string
     */
    public function add()
    {

        if(!$this->_setPathImageName()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        if(!CDir::singleton()->createDir($this->pathImage)) {
            return false;
        }

        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        if(!$this->uploadImage()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }
        return json_encode($this->getResponse());
    }

    /**
     * @return bool
     */
    private function uploadImage()
    {
        if(empty($this->parameters)) {
            return false;
        }

        ini_set('memory_limit',20000000000);
        foreach ($this->parameters as $parameter => $value) {
            if (!move_uploaded_file($this->parameters[$parameter]['tmp_name'],
                $this->pathImage . $this->parameters[$parameter]['name'])) {
                return false;
            }
        }

        foreach ($this->parameters as $parameter => $value) {
                resizeImage($this->pathImage . $this->parameters[$parameter]['name'], $this->sizes[$this->type][$parameter]['height'], $this->sizes[$this->type][$parameter]['width'], $this->parameters[$parameter]['extension']);
        }
        ini_restore ( 'memory_limit' );
        return true;
    }

    /**
     * @return bool
     */
    private function _setPathImageName()
    {
        if(!isset($_REQUEST['type']) || empty($_REQUEST['type'])) {
            return false;
        }

        if(!$this->_setPathName()) {
            return false;
        }

        $this->type = trim($_REQUEST['type']);
        $this->pathImage = BASE_IMAGES . $this->type . "/" . $this->name . "/";

        return true;
    }

    /**
     * @return bool
     */
    private function _setPathName()
    {
        if(!isset($_REQUEST['name']) || empty($_REQUEST['name'])) {
            return false;
        }
        $this->name = formatForUrl($_REQUEST['name']);
        return true;
    }

    /**
     * @return bool
     */
    private function _setParameters()
    {
        if (!isset($_FILES) || empty($_FILES)) {
            return false;
        }
        $i = 0;
        foreach ($_FILES as $key => $value) {
            foreach ($value as $item => $val) {
                foreach ($val as $tmp => $name) {
                    if($item == 'name') {
                        $ext = explode(".", $name);
                        $lastElement = sizeof($ext);
                        $name = $this->name . "-" . $i . "." . strtolower($ext[$lastElement - 1]);
                        $this->parameters[$i]['extension'] = strtolower($ext[$lastElement - 1]);
                    }
                    $this->parameters[$i][$item] = $name;
                    $i++;
                }
                $i = 0;
            }
        }
        return true;
    }
}