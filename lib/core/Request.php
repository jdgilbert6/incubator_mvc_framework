<?php

class Core_Request extends Core_Object {

    static $instance = null;

    protected $_module;
    protected $_controller;
    protected $_method;
    protected $_params = array();

    private function __construct() {

        $this->_params['post'] = $_POST;
        $this->_params['get'] = $_GET;
    }

    public static function getInstance() {

        if (null === self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public function getController() {
        return $this->_controller;
    }

    public function setController($controller) {
        $this->_controller = $controller;
    }

    public function getMethod() {
        return $this->_method;
    }

    public function setMethod($method) {
        $this->_method = $method;
    }

    public function getModule() {
        return $this->_module;
    }

    public function setModule($module) {
        $this->_module = $module;
    }

    public function getParams() {
        return $this->_params;
    }

    public function getParam($key) {
        foreach($this->getParams() as $global) {
            if(array_key_exists($key, $global)) {
                return $global[$key];
            }
        }
    }

    public function setParam($global, $key, $value) {
        $this->_params[$global][$key] = $value;
    }
}