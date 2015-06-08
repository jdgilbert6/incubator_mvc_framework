<?php

class Base_View_Welcome extends Base_View_View {

    public function __construct() {

        $this->setTitle('Welcome');
        $this->renderPage();
    }

    protected function _setContent() {

        $this->_content = TMP_PATH . DS . 'admin/form/admin_register.phtml';
    }
}