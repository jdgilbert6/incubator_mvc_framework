<?php

// Require files to be autoloaded
include_once(LIB_PATH . DS . 'Autoload.php');

Autoload::register();

final class Bootstrap{

    public static function run(){
        $test = new Core_Controller_Test();

        //@todo new $controller->$action()

    }

}