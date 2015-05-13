<?php

class Core_Session {

    public function __construct() {
        session_start();
    }

    public function getCookie() {

    }

    public function setCookie() {

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

    public function isUser() {
        if(self::getSessionVariable('account', 'logged_in'));
            return self::getSessionVariable('account', 'logged_in');
    }
}