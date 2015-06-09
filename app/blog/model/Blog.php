<?php

class Blog_Model_Blog extends Core_Model_Model {

    public function __construct() {

        $this->getTableName();
    }

    public function getPostsArray() {

        $this->_data = $this->select('blog');
        foreach($this->_data as $posts) {
            $key = $posts['id'];
            $postsArray[$key] = $posts;
        }
        return $postsArray;
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

    public function readBlogPost() {

        $postUri = $_SERVER['QUERY_STRING'];
        $parsed = parse_str($postUri);

    }

    public function updateBlogPost() {

        $title = $_POST['title'];
        $image = $_POST['image'];
        $content = $_POST['content'];

        $this->set('title', $title);
        $this->set('image', $image);
        $this->set('content', $content);
        $this->save();
    }

    public function deleteBlogPost() {

        $this->delete($_GET['id']);
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