<?php

class Cms_Controller_Index extends Core_Controller_Abstract{

    public function indexAction() {
        $x = Bootstrap::getModel('cms/user');
        $x->delete();
//        $x->setName('Jack Black');
//        $x->setEmail('jblack@user.com');
//        $x->setUsername('jblack');
//        $x->setPassword('lkdsjf');


        echo "This is inside Cms_Controller_Index.";
//        $request = Bootstrap::getRequest();
//        $request->setModule('home');
//        $request->setController('index');
//        $request->setMethod('indexAction');
//        $request->set('is_dispatched', false);

    }

}