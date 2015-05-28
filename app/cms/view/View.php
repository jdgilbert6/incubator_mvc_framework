<?php

class Cms_View_View extends Page_View_Page {

    protected $_title;
    protected $_header;
    protected $_content;
    protected $_footer;

    public function getTitle() {
        return $this->_title;
    }

    public function setTitle($title) {
        $this->setTemplate($title);
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

    public function getFooter() {
        return $this->_footer;
    }

    public function setFooter($footer) {
        $this->_footer = $footer;
    }
}