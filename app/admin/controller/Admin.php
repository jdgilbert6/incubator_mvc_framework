<?php

class Admin_Controller_Admin extends Core_Controller_Abstract {

    public function indexAction() {

        $page = Bootstrap::getView('page/page');
        $page->setTemplate('page/blog');
        $page->renderTemplate();
    }

    public function postAction() {

        $post = Bootstrap::getModel('cms/blog');
        $post->createBlogPost();
        $redirect = $this->_getRequest()->redirect('/admin/admin/index');

    }

    public function isAdminLoggedIn() {

        $admin = Core_Session::getSessionVariable('admin', 'logged-in');

        if($admin === false) {
            $redirect = $this->_getRequest()->redirect('/home');
        }
    }
}