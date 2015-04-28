<?php

// Require files to be autoloaded
include_once(LIB_PATH . DS . 'Autoload.php');
include_once(LIB_PATH . DS . 'MergeXML.php');

Autoload::register();

final class Bootstrap {

    protected static $_request;
    protected static $_response;

    public static function run() {

//        self::getModel('db/connection');
        self::buildRequest();
        self::buildResponse();
        self::getRequest()
            ->set('uri', $_SERVER['REQUEST_URI'])
            ->set('is_dispatched', false);
        self::matchRoute();

        //@todo build response object
    }

    public static function matchRoute() {

        $front = new Core_Controller_Front();

        $config = self::getConfig();
        $routers = $config->getRouters();
        foreach($routers as $routerClass){
            $routerInstance = new $routerClass();
            $front->addRoutes($routerInstance);
        }
        $front->dispatch();
    }

    public static function buildRequest() {
        static::$_request = Core_Request::getInstance();
    }

    public static function getRequest() {
        return static::$_request;
    }

    public static function buildResponse() {
        static::$_response = Core_Response::getInstance();
    }

    public static function getResponse() {
        return static::$_response;
    }

    public static function getConfig() {
        return Core_Config::getInstance();
    }

    public static function getModel($path, $isSingleton = true) {

        $pathArray = explode(DS, $path);

        foreach($pathArray as $key => $pathIndex) {
            $pathArray[$key] = ucwords(strtolower($pathIndex));
        }

        $className = $pathArray[0] . '_Model_' . $pathArray[1];

        if($isSingleton) {
            return $className::getInstance();
        }
        else {
            return new $className();
        }
    }
}
