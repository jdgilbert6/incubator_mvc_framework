<?php

class Cms_Controller_Index extends Core_Controller_Abstract{

    public function indexAction() {
        $request = Bootstrap::getRequest();
        $request->set('is_dispatched', true);
        $response = Bootstrap::getResponse();
        $response->setContent('This is inside Cms_Controller_Index.');

    }

}