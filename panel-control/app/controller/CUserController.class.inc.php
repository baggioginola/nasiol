<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 5/12/2016
 * Time: 8:54 AM
 */
require_once __CONTROLLER__ . 'CChatUserController.class.inc.php';
require_once __CONTROLLER__ . 'CBaseController.class.inc.php';
require_once __MODEL__ . 'CUserModel.class.inc.php';
define('PATH_MOVISTAR_UY_LOGS', 'F:/Movistar_Logs/');
class UserController extends BaseController
{
    private static $object = null;

    private $parameters = array();

    private $log = array();

    private $validParameters = array(
        'id_usuario' => TYPE_INT,
        'nombre' => TYPE_ALPHA,
        'apellidos' => TYPE_ALPHA,
        'email' => TYPE_ALPHA,
        'password' => TYPE_PASSWORD,
        'nivel' => TYPE_INT,
        'active' => TYPE_INT
    );

    /**
     * @return null|UserController
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
        $result = UserModel::singleton()->getAll();

        return json_encode($result);
    }

    /**
     * @return string
     */
    public function getById()
    {
        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        $result = UserModel::singleton()->getById($this->parameters['id_usuario']);

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

        if (!$user_id = UserModel::singleton()->add($this->parameters)) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        return json_encode($this->getResponse());
    }

    /**
     * @return string
     */
    public function edit()
    {
        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        $id_usuario = $this->parameters['id_usuario'];

        unset($this->parameters['id_usuario']);

        if (!$data = UserModel::singleton()->getById($id_usuario)) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        if (!UserModel::singleton()->edit($this->parameters, $id_usuario)) {
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

        $id_usuario = $this->parameters['id_usuario'];

        unset($this->parameters['id_usuario']);

        if (!$user_id = UserModel::singleton()->edit($this->parameters, $id_usuario)) {
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
            $this->parameters[$key] = $value;
        }

        return true;
    }
}