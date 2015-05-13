<?php

class Core_Controller_Error extends Core_Controller_Abstract {

    public function indexAction() {
        $page = Bootstrap::getView('page/page');
        $page->setTemplate('page/error');
        $page->renderTemplate();
    }
}