<?php

class Blog_Controller_Blog extends Core_Controller_Abstract {

    public function viewAction() {

        $post = Bootstrap::getModel('blog/blog');
        $post->getPostArray();
    }
}