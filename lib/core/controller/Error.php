<?php

class Core_Controller_Error extends Core_Controller_Abstract {

    public function indexAction() {
//        echo "404: Page not found.";
        $page = Bootstrap::getView('page/page');
        $page->setTemplate('page/error');
        $page->renderTemplate();
    }
}