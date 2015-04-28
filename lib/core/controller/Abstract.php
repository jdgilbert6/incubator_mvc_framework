<?php

class Core_Controller_Abstract {

    protected function _getRequest(){
        return Bootstrap::getRequest();
    }

    protected function _getResponse(){
        return Bootstrap::getResponse();
    }

    public function renderPage(Page_View_Abstract $page){
        $this->_getRequest()->set('is_dispatched', true);

        $this->_getResponse()->setContent($page->renderTemplate());
    }


    public function dispatch($actionMethodName = false) {
        if($actionMethodName){
            return $this->$actionMethodName();
        }
    }
}

