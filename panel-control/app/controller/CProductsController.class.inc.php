<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 7/6/2016
 * Time: 3:56 PM
 */

require_once 'CBaseController.class.inc.php';
require_once __MODEL__ . 'CProductsModel.class.inc.php';

class Products extends BaseController
{
    private static $object = null;

    private $parameters = array();

    private $validParameters = array(
        'id' => TYPE_INT,
        'id_categoria' => TYPE_INT,
        'nombre' => TYPE_ALPHA,
        'active' => TYPE_INT,
        'imagenes' => TYPE_INT,
        'descripcion' => TYPE_ALPHA,
        'precio' => TYPE_FLOAT,
        'especificaciones' => TYPE_ALPHA

    );

    public static function singleton()
    {
        if (is_null(self::$object)) {
            self::$object = new self();
        }
        return self::$object;
    }

    public function getAll()
    {
        $result = ProductsModel::singleton()->getAll();
        return json_encode($result);
    }

    public function add()
    {
        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        if (!ProductsModel::singleton()->add($this->parameters)) {
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

        $result = ProductsModel::singleton()->getById($this->parameters['id']);

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

        if (!ProductsModel::singleton()->edit($this->parameters, $id)) {
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

        if (!$user_id = ProductsModel::singleton()->edit($this->parameters, $id)) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        return json_encode($this->getResponse());
    }

    /**
     * @return string
     */
    public function checkDuplicatedName()
    {
        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        if(!$result = ProductsModel::singleton()->getByName($this->parameters['key_nombre'], $this->parameters['id_categoria'])) {
            return json_encode($this->getResponse(STATUS_FAILURE_CLIENT, MESSAGE_EMPTY));
        }

        return json_encode($this->getResponse(STATUS_SUCCESS, MESSAGE_EXISTS));
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