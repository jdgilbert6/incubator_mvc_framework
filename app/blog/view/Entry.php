<?php

class Blog_View_Entry extends Base_View_View {

    public function __construct() {

        $this->setTitle('View Post');
        $this->renderPage();
    }

    protected function _setContent() {

        $this->_content = TMP_PATH . DS . 'blog/block/view_post.phtml';
    }
}