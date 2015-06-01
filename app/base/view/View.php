<?php

class Base_View_View extends Page_View_Page {

    protected function _setContent($content) {

        $this->_content = $content;
    }

    public function renderPage() {

        $this->setTitle($this->_title);
        $this->setHeader();
        $this->_setContent($content);
        $this->setFooter();
        include_once($this->_title);
        include_once($this->_header);
        include_once($this->_content);
        include_once($this->_footer);


    }

}