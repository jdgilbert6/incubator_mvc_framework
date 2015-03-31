<?php

class Core_Request extends Core_Object {

    protected $_module;
    protected $_controller;
    protected $_method;

    static $instance = null;

    private function __construct() {}

    public static function getInstance() {

        if (null === self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->_controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->_controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->_method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->_method = $method;
    }

    /**
     * @return mixed
     */
    public function getModule()
    {
        return $this->_module;
    }

    /**
     * @param mixed $module
     */
    public function setModule($module)
    {
        $this->_module = $module;
    }
}