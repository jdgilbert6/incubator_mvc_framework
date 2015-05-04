<?php

class Cms_Controller_Index extends Core_Controller_Abstract{

    public function indexAction() {
        $page = Bootstrap::getView('page/page');
//        $page->set('title', 'TEst');
//        $page->set('header', '<h1>Header</h1>');
//        $page->set('content', '<p>TEst</p>');
//        $page->set('footer', '<h3>Footer</h3>');
//        $page->set('template', getcwd() . '/lib/page/view/template/default.phtml');

        $page->renderTemplate('default');

    }

}