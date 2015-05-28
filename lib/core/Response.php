<?php

class Core_Response {

    protected $_header;
    protected $_content;
    static $instance = null;

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

    public function redirect($url) {
        header('Location:'. $url);
    }

    public function send() {

    }

}