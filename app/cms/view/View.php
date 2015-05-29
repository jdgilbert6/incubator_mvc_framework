<?php

class Cms_View_View extends Page_View_Page {

    public function buildPage() {

        $this->_header = TMP_PATH . DS . '/blog/block/header';
        $this->_footer = TMP_PATH . DS . '/blog/block/footer';
    }

    public function renderPage() {

    }
    
}