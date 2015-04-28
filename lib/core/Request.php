<?php

class Core_Request {

    static $instance = null;

    protected $_module;
    protected $_controller;
    protected $_method;
    protected $_data = array();


    private function __construct() {}

    public static function getInstance() {

        if (null === self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public function __call($methodName, $params = null) {

        if($methodName == 'set' && count($params) == 2) {

            $key = $params[0];
            $value = $params[1];
            $this->_data[$key] = $value;
            return $this;
        }
        elseif($methodName == 'get' && count($params) == 1) {

            $key = $params[0];
            if(array_key_exists($key, $this->_data)) {
                return $this->_data[$key];
            } else {
                return false;
            }
        }
        return false;
    }

    public function getController()
    {
        return $this->_controller;
    }

    public function setController($controller)
    {
        $this->_controller = $controller;
    }

    public function getMethod()
    {
        return $this->_method;
    }

    public function setMethod($method)
    {
        $this->_method = $method;
    }

    public function getModule()
    {
        return $this->_module;
    }

    public function setModule($module)
    {
        $this->_module = $module;
    }
}