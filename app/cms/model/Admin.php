<?php

class Cms_Model_Admin extends Core_Model_Model {

    public function __construct() {

        $this->getTableName();
    }

    public function createBlog() {

        $author = $_SESSION['admin-logged-in'];
        $date = date('m-d-Y');
        $title = $_POST['title'];
        $content = $_POST['content'];
        $image = $_POST['image'];
        $url = null;

        $db = Bootstrap::getModel('cms/admin');
        $db->set('author', $author);
        $db->set('date', $date);
        $db->set('title', $title);
        $db->set('content', $content);
        $db->set('image', $image);


    }

}