<?php

class Core_Response {

    static $instance = null;

    protected $_header;
    protected $_content;

    private function __construct() {}

    public static function getInstance() {

        if (null === self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public function getHeader() {
        return $this->_header;
    }

    public function setHeader($header) {
        $this->_header = $header;
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