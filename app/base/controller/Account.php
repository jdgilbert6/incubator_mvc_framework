<?php

class Core_Controller_Account extends Core_Controller_Abstract {

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

    public function adminAction() {

        $page = Bootstrap::getView('page/page');
        $page->setTemplate('page/blog_admin');
        $page->renderTemplate();
    }

    public function loginAction() {
        $login = Bootstrap::getModel('base/access');
        $login->adminLogin();
        $redirect = $this->_getResponse()->redirect(BASE_URL . '/base/admin/index');

    }

    public function logoutAction() {

        $model = Bootstrap::getModel('base/access');
        $model->logout();
    }

    public function validate() {

    }
}