<?php

class Base_View_View extends Page_View_Page {

    protected $_posts = array();
    protected $_param;
    protected $_id;

    protected function _setContent($content) {

        $this->_content = $content;
    }

    public function renderPage() {

        $this->setTitle($this->_title);
        $this->setHeader($this->_header);
        $this->_setContent($this->_content);
        $this->setFooter();
        include_once($this->_title);
        include_once($this->_header);
        include_once($this->_content);
        include_once($this->_footer);
    }

    public function getPosts() {

        $this->_posts = Bootstrap::getModel('blog/blog')->getPostsArray();
        return $this->_posts;
    }

    public function getParam() {

        $this->_param = Bootstrap::getRequest()->getParam('id');
        return $this->_param;
    }

    public function getPostId() {

        $this->_id = Bootstrap::getModel('blog/blog')->getPostIdFromUrl();
        return $this->_id;
    }
}