<?php

// Require files to be autoloaded
include_once(LIB_PATH . DS . 'Autoload.php');

Autoload::register();

final class Bootstrap{

    protected static $_request;

    public static function run(){

        self::buildRequest();
        self::getRequest()
            ->set('uri', $_SERVER['REQUEST_URI'])
            ->set('is_dispatched', false);
        self::matchRoute();
        self::loadXml();

        //@todo build response object
    }

    public static function matchRoute(){
        $frontController = new Core_Controller_Front();

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

    public static function loadXml(){
        $xmlFiles = glob('app*/*/config.xml', GLOB_NOSORT);
        foreach($xmlFiles as $xmlFile) {
            if(file_exists($xmlFile)) {
                return simplexml_load_file($xmlFile);
            }

        }
    }
}
