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

    private $validParameters = array(


    );

    public static function singleton()
    {
        if (is_null(self::$object)) {
            self::$object = new self();
        }
        return self::$object;
    }

    public function add()
    {
        echo print_r($_FILES['imagenes']);

        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }
    }

    /**
     * @return bool
     */
    private function _setParameters()
    {
        if (!isset($_POST) || empty($_POST)) {
            return false;
        }

        echo print_r($_POST,1);
        die();
        if (!$this->validateParameters($_POST, $this->validParameters)) {
            return false;
        }

        foreach ($_POST as $key => $value) {
            $this->parameters[$key] = $value;
        }

        return true;
    }
}