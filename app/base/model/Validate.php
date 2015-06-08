<?php

class Base_Model_Validate {

    protected $_error;
    public $fields = array();

    public function __construct() {}

    public function validateNotEmpty($fields) {

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            foreach($this->fields as $field) {
                if(!isset($_POST[$field]) || empty($_POST[$field])) {
                    $this->_error = 'Please complete the ' . $field . ' field.';
                    return $this->_error;
                }
            }
        }
    }
}