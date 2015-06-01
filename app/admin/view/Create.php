<?php

class Admin_View_Create extends Base_View_View {

    public function __construct() {

        $this->setTitle('Create Post');
        $this->renderPage();
    }

    protected function _setContent() {

        $this->_content = TMP_PATH . DS . 'admin/form/create_post.phtml';
    }
}