<?php

// Require files to be autoloaded
include_once(LIB_PATH . DS . 'Autoload.php');

Autoload::register();

final class Bootstrap{

    protected static $_request;

    public static function run(){

        self::getConfig();
        self::buildRequest();
        self::getRequest()
            ->set('uri', $_SERVER['REQUEST_URI'])
            ->set('is_dispatched', false);
        self::matchRoute();

        //@todo build response object
    }

    public static function matchRoute(){
        $frontController = new Core_Controller_Front();

        //@todo Add via config.xml via Core_Config not hardcoded..
        $frontController->addRoutes(new Core_Controller_Router_Standard());
        $frontController->addRoutes(new Core_Controller_Router_Default());

        $frontController->dispatch();
    }

    public static function loadDefault() {
        $controllerInstance = new Core_Controller_Router_Default();
        $controllerInstance->matchRequest(Core_Request::getInstance());
    }

    public static function buildRequest(){
        static::$_request = Core_Request::getInstance();
    }

    public static function getRequest(){
        return static::$_request;
    }

    public static function getConfig(){
        return Core_Config::getInstance();
    }
}
