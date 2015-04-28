<?php

class Cms_Controller_Home extends Core_Controller_Abstract {

    public function indexAction() {
        $request = Bootstrap::getRequest();
        $request->setModule('Cms');
        $request->setController('Login');
        $request->setMethod('indexAction');
        $request->set('is_dispatched', false);

    }
}