<?php

class Cms_View_View extends Page_View_Page {

    public function __construct() {

        $this->setHeader($this->_header);
        $this->setContent($this->_content);
        $this->setFooter($this->_footer);
    }

    public function buildPage() {


    }

    public function renderPage($view) {

        Bootstrap::getView($view);
    }
}