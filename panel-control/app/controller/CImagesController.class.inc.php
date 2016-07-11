<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 7/8/2016
 * Time: 4:33 PM
 */

require_once 'CBaseController.class.inc.php';
class Images extends BaseController
{
    public static $object = null;

    private $parameters = array();

    private $name = null;
    private $pathImage = null;

    private $validParameters = array(
        'imagenes' => TYPE_ALPHA
    );

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
        if(!$this->_setPathImage()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
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

        foreach ($this->parameters as $parameter => $value) {
            if (!move_uploaded_file($this->parameters[$parameter]['tmp_name'], 
                $this->_getPathImage() . $this->parameters[$parameter]['name'])) {
                return false;
            }
        }
        return true;
    }

    private function _setPathImage()
    {
        if(!isset($_REQUEST['type']) || empty($_REQUEST['type'])) {
            return false;
        }

        $type = trim($_REQUEST['type']);
        $this->pathImage = BASE_IMAGES . "/" . $type . "/";

        return true;
    }

    private function _getPathImage()
    {
        return $this->pathImage;
    }

    /**
     * @return bool
     */
    private function _setParameters()
    {
        if (!isset($_FILES) || empty($_FILES)) {
            return false;
        }

        if(!$this->_setPathName()) {
            return false;
        }

        $i = 0;
        foreach ($_FILES as $key => $value) {
            foreach ($value as $item => $val) {
                foreach ($val as $tmp => $name) {
                    if($item == 'name') {
                        $ext = explode(".", $name);
                        $name = $this->name . $i . "." . $ext[1];
                    }
                    $this->parameters[$i][$item] = $name;
                    $i++;
                }
                $i = 0;
            }
        }
        echo print_r($this->parameters);

        return true;
    }

    private function _setPathName()
    {
        if(!isset($_REQUEST['name']) || empty($_REQUEST['name'])) {
            return false;
        }
        $name_trimmed = trim(strtolower($_REQUEST['name']));
        $name_exploded = explode(" ",$name_trimmed);

        foreach ($name_exploded as $key) {
            $this->name .= $key . "-";
        }
        return true;
    }
}