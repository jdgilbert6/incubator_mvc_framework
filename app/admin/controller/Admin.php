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

    public function editAction() {

        $model = Bootstrap::getModel('blog/blog');
        $model->updateBlogPost();
        $this->_getResponse()->redirect('/admin/admin/index');
    }

    public function updateAction() {

        $view = Bootstrap::getView('admin/update');
        return $view;
    }

    public function deleteAction() {

        $model = Bootstrap::getModel('blog/blog');
        $model->deleteBlogPost();
        $this->_getResponse()->redirect('/admin/admin/index');
    }

    public function postAction() {

        Core_Session::endSession();
        $validator = Bootstrap::getModel('base/validate');
        if(!$validator->validateAdminCrudForm()) {
            Core_Session::setSessionVariable('error', $validator->getErrors());
            $this->_getResponse()->redirect();
        } else {
            $post = Bootstrap::getModel('blog/blog');
            $post->createBlogPost();
            $this->_getResponse()->redirect('/blog/page/view');
        }
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