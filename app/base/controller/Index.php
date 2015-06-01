<?php

class Base_Controller_Index extends Core_Controller_Abstract {

    public function indexAction() {
        $page = Bootstrap::getView('base/welcome');
//        $page->setTemplate('page/default');
//        $page->setChildTemplate('header', 'test');
        $page->renderTemplate();

    }
}