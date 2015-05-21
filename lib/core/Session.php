<?php

class Core_Session {

    static $instance = null;

    public static function __construct() {}

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
        session_destroy();
    }

    public static function getSessionVariable($session, $variable) {
        session_id($session);
        if($_SESSION[$variable]) {
            return $_SESSION[$variable];
        }
    }

    public static function setSessionVariable($session, $variable, $value) {
        session_id($session);
        $_SESSION[$variable] = $value;
    }

    public static function getCookie($name = null) {
        if($_COOKIE[$name]) {
            return $_COOKIE[$name];
        }else {
            return $_COOKIE;
        }
    }

    public static function setCookie($name, $value, $expire = null) {
        if(!$expire === null) {
            setcookie($name, $value, $expire);
        } else {
            setcookie($name, $value, time() + (86400 * 7));
        }
    }
}