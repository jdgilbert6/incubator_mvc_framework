<?php

class Blog_Controller_Page extends Core_Controller_Abstract {

    public function viewAction() {

        $view = Bootstrap::getView('blog/entry');
        return $view;
    }

    public function listAction() {

        $pageId = Bootstrap::getRequest()->getParam('pg');
        $pageId = !is_null($pageId) ? $pageId : 1;
        $view = Bootstrap::getView('blog/list');
        return $view;
    }
}