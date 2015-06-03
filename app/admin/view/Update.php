<?php

class Admin_View_Update extends Base_View_View {

    public function __construct() {

        $this->setTitle('Edit Post');
        $this->getPosts();
        $this->getParam('id');
        $this->renderPage();
    }

    protected function _setContent() {

        $this->_content = TMP_PATH . DS . 'admin/form/update_post.phtml';
    }
}