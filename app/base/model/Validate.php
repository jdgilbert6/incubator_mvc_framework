<?php

class Base_Model_Validate extends Core_Model_Model {

    protected $_errors = array();

    public function __construct() {}

    public function validateNotEmpty($field) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(!isset($_POST[$field]) || empty($_POST[$field])) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function validateMaxLength($field, $length) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(strlen($_POST[$field]) > $length) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function validateEmail($email) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(filter_var($_POST[$email], FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function validatePassword($password) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(strlen($_POST[$password]) < 5) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function getErrors() {

        return $this->_errors;
    }
}