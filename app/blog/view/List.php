<?php

class Blog_View_List extends Base_View_View {

    public function __construct() {

        $this->setTitle('Blog Posts');
        $this->getPosts();
        $this->renderPage();
    }

    protected function _setContent() {

        $this->_content = TMP_PATH . DS . 'blog/block/list_posts.phtml';
    }

    public function getPage() {

        $blogModel = Bootstrap::getModel('blog/blog');
        $pageArray = $blogModel->getPaginator()->setItemsPerPage(4)->getPage();
        return $pageArray;
    }

    public function getTotalPages() {

        $blogModel = Bootstrap::getModel('blog/blog');
        $totalPages = $blogModel->getPaginator()->setItemsPerPage(4)->getTotalPages();
        return $totalPages;
    }
}