<?php

class Base_View_Contact extends Base_View_View {

    public function __construct() {

        $this->setTitle('Contact');
        $this->renderPage();
    }

    protected function _setContent() {

        $this->_content = TMP_PATH . DS . '';
    }
}