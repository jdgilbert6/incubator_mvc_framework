<?php

class Core_Session {

    static $instance = null;

    private function __construct() {}

    public static function getInstance() {

        if (null === self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public function getSessionVariable($session, $variable) {
        session_id($session);
        session_start();
        if($_SESSION($variable)) {
            return $_SESSION($variable);
        }
    }

    public function setSessionVariable($session, $variable, $value) {
        session_id($session);
        session_start();
        $_SESSION[$variable] = $value;
    }

    public function userLoggedIn() {
        if(self::getSessionVariable('account', 'logged_in')) {
            return true;
        } else {
            return false;
        }
    }
}