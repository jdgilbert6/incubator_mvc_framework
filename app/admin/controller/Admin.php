<?php

class Admin_Controller_Admin extends Core_Controller_Abstract {

    public function indexAction() {

        $page = Bootstrap::getView('page/page');
        $page->setTemplate('admin/block/admin_panel_body');
        $page->renderTemplate();
    }

    public function createAction() {

        $new = Bootstrap::getView('page/page');
        $new->setTemplate('admin/form/create_post');
        $new->renderTemplate();
    }

    public function postAction() {

        $post = Bootstrap::getModel('blog/blog');
        $post->createBlogPost();
        $redirect = $this->_getResponse()->redirect('/admin/admin/index');

    }

    public function isAdminLoggedIn() {

        $admin = Core_Session::getSessionVariable('admin', 'logged-in');

        if($admin === false) {
            $redirect = $this->_getResponse()->redirect('/home');
        }
    }
}