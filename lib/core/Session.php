<?php

class Core_Session {

    static $instance = null;

    public function __construct() {}

    public static function getInstance() {

        if (null === self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public static function endSession() {
        session_unset();
    }

    public static function destroySession() {
        session_unset();
        session_destroy();
    }

    public static function getSessionVariable($variable) {
        session_start();
        if($_SESSION[$variable]) {
            return $_SESSION[$variable];
        }
        return false;
    }

    public static function setSessionVariable($variable, $value) {
        session_start();
        $_SESSION[$variable] = $value;
        session_write_close();
    }

    public static function getCookie($name = null) {
        if($_COOKIE[$name]) {
            return $_COOKIE[$name];
        }else {
            return $_COOKIE;
        }
    }

    public static function setCookie($name, $value, $expire = null) {
        if($expire !== null) {
            setcookie($name, $value, $expire);
        } else {
            setcookie($name, $value, time() + (86400 * 7));
        }
    }
}