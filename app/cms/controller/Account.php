<?php

class Cms_Controller_Account extends Core_Controller_Abstract {

    public function indexAction() {

        $page = Bootstrap::getView('page/page');
        $page->setTemplate('page/default');
        $page->renderTemplate();
    }

    public function registerAction() {

        $page = Bootstrap::getView('page/page');
        $page->setTemplate('page/admin_register');
        $page->renderTemplate();
    }

    public function loginAction() {

        $reg = Bootstrap::getModel('cms/access');
        $reg->adminLogin();
    }

    public function logoutAction() {

    }

    public function validateAction() {

    }
}