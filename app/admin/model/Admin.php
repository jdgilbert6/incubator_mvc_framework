<?php

class Admin_Model_Admin extends Core_Model_Model {

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


        $this->set('author', $author !== null ? $author : '');
        $this->set('date', $date);
        $this->set('title', $title);
        $this->set('content', $content);
        $this->set('image', $image);
        $this->set('url', $url);
        $this->save();
    }

    public function updateBlogPost() {


    }

    public function deleteBlogPost() {

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
