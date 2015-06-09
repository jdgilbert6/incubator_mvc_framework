<?php

class Blog_Controller_Page extends Core_Controller_Abstract {

    public function viewAction() {

        $view = Bootstrap::getView('blog/entry');
        return $view;
    }

    public function recentAction() {

        $view = Bootstrap::getView('blog/recent');
        return $view;
    }


}