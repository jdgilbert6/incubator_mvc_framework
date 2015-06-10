<?php

class Base_View_About extends Base_View_View {

    public function __construct() {

        $this->setTitle('About');
        $this->renderPage();
    }

    protected function _setContent() {

        $this->_content = TMP_PATH . DS . '';
    }
}