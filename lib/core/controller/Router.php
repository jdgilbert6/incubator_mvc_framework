<?php

class Core_Controller_Router {

    protected static $_module = 'core';
    protected static $_controller = 'index';
    protected static $_method = 'index';
    protected static $_params = array();

    public function __construct() {

        $uri = $this->parseUri();

        if(file_exists(LIB_PATH . DS . 'core/controller' . DS . $uri[0] . '.php')) {
            $this->controller = $uri[0];
            unset($uri[0]);
        }
        require_once LIB_PATH . DS . $this->controller . '.php';

        $this->controller = new $this->controller;

        if(isset($uri[1])) {

            if(method_exists($this->controller, $uri[1])) {

                $this->method = $uri[1];
                unset($uri[1]);
            }
        }
    }

    public function parseUri() {

        if(isset($_GET['uri'])) {
            return $uri = explode(DS, filter_var(rtrim($_GET['uri'], DS), FILTER_SANITIZE_URL));
        }
    }

//    public static function setModule($module) {
//        self::$_module = $module;
//    }
//
//    public static function getModule() {
//        return self::$_module;
//    }
//
//    public static function setController($controller) {
//        self::$_controller = $controller;
//    }
//
//    public static function getController() {
//        return self::$_controller;
//    }
//
//    public static function setMethod($method) {
//        self::$_method = $method;
//    }
//
//    public static function getMethod() {
//        return self::$_method;
//    }
//
//    public static function setParams($params) {
//        self::$_params = $params;
//    }
//
//    public static function getParams() {
//        return self::$_params;
//    }
//
//    public static function route() {
//
//        $uri = self::parseUri();
//    }

}