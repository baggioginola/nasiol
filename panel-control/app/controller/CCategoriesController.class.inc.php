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
        'imagenes' => TYPE_ALPHA
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
        $result = CategoriesModel::singleton()->getAll();
        return json_encode($result);
    }

    /**
     * @return string
     */
    public function add()
    {
        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        if (!CategoriesModel::singleton()->add($this->parameters)) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        return json_encode($this->getResponse());
    }

    /**
     * @return string
     */
    public function getById()
    {
        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        $result = CategoriesModel::singleton()->getById($this->parameters['id']);

        return json_encode($result);
    }

    /**
     * @return string
     */
    public function edit()
    {
        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        $id = $this->parameters['id'];

        unset($this->parameters['id']);

        if (!CategoriesModel::singleton()->edit($this->parameters, $id)) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        return json_encode($this->getResponse());
    }

    /**
     * @return string
     */
    public function delete()
    {
        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        $id = $this->parameters['id'];

        unset($this->parameters['id']);

        if (!$user_id = CategoriesModel::singleton()->edit($this->parameters, $id)) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        return json_encode($this->getResponse());
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
            if($key == 'nombre') {
                $this->parameters['key_nombre'] = formatForUrl($value);
            }
            $this->parameters[$key] = formatString($value);
        }
        return true;
    }
}