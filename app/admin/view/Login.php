<?php

class Admin_View_Login extends Base_View_View {

    public function __construct() {

        $this->setTitle('Login');
        $this->renderPage();
    }

    protected function _setContent() {

        $this->_content = TMP_PATH . DS . 'admin/form/admin_login.phtml';
    }
}