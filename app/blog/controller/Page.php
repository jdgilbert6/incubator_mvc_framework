<?php

class Blog_Controller_Blog extends Core_Controller_Abstract {

    public function viewAction() {

        $test = Bootstrap::getModel('blog/router');
        return $test;
        $view = Bootstrap::getView('blog/entry');
        return $view;
    }
}