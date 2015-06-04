<?php

class Blog_Controller_Index extends Core_Controller_Index {

    public function indexAction() {

        $view = Bootstrap::getView('blog/entry');
        return $view;
    }
}