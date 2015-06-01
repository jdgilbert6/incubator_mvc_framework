<?php

class Blog_Controller_Blog extends Core_Controller_Abstract {

    public function viewAction() {

        $view = Bootstrap::getView('blog/entry');
        return $view;
    }
}