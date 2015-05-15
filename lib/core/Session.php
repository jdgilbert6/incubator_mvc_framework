<?php

class Core_Session {

    public function __construct() {
        $this->startSession();
    }

    public function startSession() {
        if(!isset($_SESSION) && session_id() == '') {
            session_start();
        }
    }

    public function endSession() {
        session_unset();
    }

    public function destroySession() {
        session_destroy();
    }

    public function getSessionVariable($session, $variable) {
        session_id($session);
        if($_SESSION[$variable]) {
            return $_SESSION[$variable];
        }
    }

    public function setSessionVariable($session, $variable, $value) {
        session_id($session);
        $_SESSION[$variable] = $value;
    }

    public function getCookie($name) {
        if($_COOKIE[$name]) {
            return $_COOKIE[$name];
        }
    }

    public function setCookie($name, $value, $expire = null) {
        if(!$expire === null) {
            setcookie($name, $value, $expire);
        } else {
            setcookie($name, $value, time() + 3600);
        }
    }
}