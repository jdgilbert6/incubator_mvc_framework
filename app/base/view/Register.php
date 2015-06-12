<?php

class Base_View_Register extends Base_View_View {

    public function __construct() {

        $this->setTitle('Register');
        $this->setHeader('header_login.phtml');
        $this->renderPage();
    }

    protected function _setContent() {

        $this->_content = TMP_PATH . DS . 'user/form/user_register.phtml';
    }
}