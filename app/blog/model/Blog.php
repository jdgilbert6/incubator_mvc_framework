<?php

class Cms_Model_Blog extends Core_Model_Model {

    public function __construct() {

        $this->getTableName();
    }

    public function createBlogPost() {

        $author = Core_Session::getSessionVariable('admin', 'admin-logged-in');
        $date = date('m-d-Y');
        $title = $_POST['title'];
        $content = $_POST['content'];
        $image = $_POST['image'];
        $url = $this->createSlug($title);

        $db = Bootstrap::getModel('cms/blog');
        $db->set('author', $author !== null ? $author : '');
        $db->set('date', $date);
        $db->set('title', $title);
        $db->set('content', $content);
        $db->set('image', $image);
        $db->set('url', $url);
        $db->save();

    }

    public function getLastPost() {


    }

    public function createSlug($string) {
        $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $string));
        return $slug . '.html';
    }

    public function getSlugId($slug) {

        $model = Bootstrap::getModel('core/model');
        $model->load('url', $slug, 'blog');
        return $model->_data['id'];
    }
}