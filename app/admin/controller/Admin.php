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

    public function updateAction() {

        $view = Bootstrap::getView('admin/edit');
        return $view;
    }

    public function deleteAction() {

        $model = Bootstrap::getModel('admin/admin');
        $model->deleteBlogPost();
        $this->_getResponse()->redirect('/admin/admin/index');
    }

    public function postAction() {

        $post = Bootstrap::getModel('admin/admin');
        $post->getPostArray();
//        $post->createBlogPost();
//        $this->_getResponse()->redirect('/blog/blog/view');

    }

    public function loginAction() {

        $view = Bootstrap::getView('admin/login');
        return $view;
    }

    public function isAdminLoggedIn() {

        $admin = Core_Session::getSessionVariable('admin', 'logged-in');

        if($admin === false) {
            $this->_getResponse()->redirect('/home');
        }
    }
}