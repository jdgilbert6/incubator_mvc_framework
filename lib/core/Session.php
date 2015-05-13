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

    public function connect() {

    }

    public function open() {

    }

    public function close() {

    }

    public function read() {

    }

    public function write() {

    }

    public function destroy() {

    }

    public function gc() {

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