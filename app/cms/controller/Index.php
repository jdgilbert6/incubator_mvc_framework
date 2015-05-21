<?php

class Cms_Controller_Index extends Core_Controller_Abstract {

    public function indexAction() {
        $page = Bootstrap::getView('page/page');
        $page->setTemplate('page/admin');
//        $page->setChildTemplate('header', 'test');
        $page->renderTemplate();
       Bootstrap::getModel('cms/blog')->load(1);
    }

}