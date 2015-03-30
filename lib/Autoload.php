<?php

class Autoload {

    private function __construct() {}

    public static function register() {

        spl_autoload_register(function($className) {

            $classNameArr = explode('_', $className);
            $fileName = array_pop($classNameArr);
            $className = implode(DS, $classNameArr);
            $fileName = str_replace('_', DS, strtolower($className)) . DS . $fileName . '.php';

            $fileName = stream_resolve_include_path($fileName);
            if (file_exists($fileName)) {
                include($fileName);
            }

        });
    }
}




