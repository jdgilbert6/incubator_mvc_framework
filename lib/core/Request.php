<?php

class Core_Request extends Core_Object {

    static $instance = null;

    protected $_module;
    protected $_controller;
    protected $_method;
    protected $_params = array();

    private function __construct() {}

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

    }
}