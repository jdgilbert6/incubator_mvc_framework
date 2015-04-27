<?php

class Core_Singleton {

//    static $instance = null;

    protected function __construct() {}

    public static function getInstance() {

//        if (null === self::$instance) {
//            self::$instance = new static();
//        }
//
//        return self::$instance;
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;

    }

}