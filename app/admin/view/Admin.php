<?php

class Admin_View_Admin extends Base_View_View {

    public function __construct() {

        $this->setTitle('Admin');
        $this->renderPage();
    }

    protected function _setContent() {

        $this->_content = TMP_PATH . DS . 'admin/block/admin_panel_body.phtml';
    }
}