<?php

class Cms_Controller_Index extends Core_Controller_Abstract {

    public function indexAction() {
        $page = Bootstrap::getView('cms/welcome');
//        $page->setTemplate('page/default');
//        $page->setChildTemplate('header', 'test');
        $page->renderTemplate();

    }
}