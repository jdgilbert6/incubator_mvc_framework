<?php

class Admin_View_Admin extends Base_View_View {

    public function __construct($_posts) {

        $this->setTitle('Admin');
        $this->getPosts();
        $this->renderPage();
    }

    protected function _setContent() {

        $this->_content = TMP_PATH . DS . 'admin/block/admin_panel_body.phtml';
    }

    public function getPosts() {

        $this->_data = Bootstrap::getModel('blog/blog');
        $this->_data->getPostArray();
        return $this->_data;
    }
}