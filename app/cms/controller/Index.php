<?php

class Cms_Controller_Index extends Core_Controller_Abstract{

    public function indexAction() {
        $page = Bootstrap::getView('page/page');
        $page->set('title', 'TEst');
        $page->set('content', '<h1>TEst</h1>');
        $page->set('template', getcwd() . '/lib/page/view/template/test.phtml');

        $this->renderPage($page);

    }

}