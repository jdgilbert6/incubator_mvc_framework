<?php

class Core_Response extends Core_Object {

    protected $_headers;
    protected $_content;

    public function __construct() {}

    public function getHeaders() {
        return $this->_headers;
    }

    public function setHeaders($headers) {
        $this->_headers = $headers;
    }

    public function getContent() {
        return $this->_content;
    }

    public function setContent($content) {
        $this->_content = $content;
    }

    public function redirect() {

    }

    public function send() {

    }

}