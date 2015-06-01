<?php

class Admin_Controller_Admin extends Core_Controller_Abstract {

    public function indexAction() {

        $view = Bootstrap::getView('admin/admin');
        return $view;
    }

    public function createAction() {

        $view = Bootstrap::getView('admin/create');
        return $view;
    }

    public function postAction() {

        $post = Bootstrap::getModel('blog/blog');
        $post->createBlogPost();
        $redirect = $this->_getResponse()->redirect('/admin/admin/index');

    }

    public function loginAction() {

        $view = Bootstrap::getView('admin/login');
        return $view;
    }

    public function isAdminLoggedIn() {

        $admin = Core_Session::getSessionVariable('admin', 'logged-in');

        if($admin === false) {
            $redirect = $this->_getResponse()->redirect('/home');
        }
    }
}