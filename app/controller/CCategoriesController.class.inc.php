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

    private $parameters = array();

    private $validParameters = array(
        'id' => TYPE_INT,
        'nombre' => TYPE_ALPHA,
        'active' => TYPE_INT,
        'imagenes' => TYPE_ALPHA,
        'key_nombre' => TYPE_ALPHA
    );

    /**
     * @return Categories|null
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
    public function getAll()
    {
        if($result = CategoriesModel::singleton()->getAll()) {
            return json_encode($this->getResponse(STATUS_SUCCESS, MESSAGE_SUCCESS, $result));
        }
        return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
    }

   
    /**
     * @return string
     */
    public function getByName()
    {
        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        if($result = CategoriesModel::singleton()->getByName($this->parameters['key_nombre'])) {
            return json_encode($this->getResponse(STATUS_SUCCESS, MESSAGE_SUCCESS, $result));
        }

        return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
    }
    
    /**
     * @return bool
     */
    private function _setParameters()
    {
        if (!isset($_POST) || empty($_POST)) {
            return false;
        }

        if (!$this->validateParameters($_POST, $this->validParameters)) {
            return false;
        }

        foreach ($_POST as $key => $value) {
            $this->parameters[$key] = $value;
        }
        return true;
    }
}