<?php

class Cms_Controller_Index extends Core_Controller_Abstract{

    public function indexAction() {
        $page = Bootstrap::getView('page/page');
        $page->set('content', 'stuff');
        $page->setTemplate('page/default');
        $page->renderTemplate();

    }

}