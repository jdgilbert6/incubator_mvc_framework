<?php

class Cms_Controller_Index extends Core_Controller_Abstract {

    public function indexAction() {
//        $page = Bootstrap::getView('page/page');
//        $page->setTemplate('page/default');
//        $page->setChildTemplate('header', 'test');
//        $page->renderTemplate();
        $db = Bootstrap::getModel('cms/user');
        $db->set('name', 'Some Body');
        $db->set('email', 'somebody@here.com');
        $db->set('username', 'somebody');
        $db->set('password', 'smbdy');
        $db->save();
    }

}