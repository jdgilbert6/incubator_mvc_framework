<?php

class Blog_View_Recent extends Base_View_View {

    public function __construct() {

        $this->setTitle('View Recent');
        $this->getPosts();
        $this->renderPage();
    }

    protected function _setContent() {

        $this->_content = TMP_PATH . DS . 'blog/block/recent_posts.phtml';
    }
}