<?php

class Base_Controller_Account extends Core_Controller_Abstract {

//    public function registerAction() {
//
//        $view = Bootstrap::getView('base/welcome');
//        return $view;
//    }

    public function adminAction() {

//        $page = Bootstrap::getView('page/page');
//        $page->setTemplate('page/blog_admin');
//        $page->renderTemplate();
    }

    public function loginAction() {

        $view = Bootstrap::getView('base/login');
        $model = Bootstrap::getModel('base/access');
        $model->login();
        return $view;


    }

    public function logoutAction() {

        $model = Bootstrap::getModel('base/access');
        $model->logout();
    }
}