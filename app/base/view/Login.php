<?php

class Base_View_Login extends Base_View_View {

    public function __construct() {

        $this->setTitle('Login');
        $this->setHeader('header_login.phtml');
        $this->renderPage();
    }

    protected function _setContent() {

        $this->_content = TMP_PATH . DS . 'blog/form/login.phtml';
    }
}