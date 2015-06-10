<?php

class Blog_View_List extends Base_View_View {

    public function __construct() {

        $this->setTitle('View Recent');
        $this->getPosts();
        $this->renderPage();
    }

    protected function _setContent() {

        $this->_content = TMP_PATH . DS . 'blog/block/list_posts.phtml';
    }
}