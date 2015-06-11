<?php

class Base_Controller_Router_Base implements Core_Controller_Router_Interface {

    protected $_path;
    protected $_row;

    public function matchRequest(Core_Request $request) {

        if(!$request->get('uri_parsed')) {
            $uri = $request->getData();
            $path = $uri['uri'];
            $this->_path = trim($path, '/');
        }

        if($this->matchUrl($this->_path)) {
            $newUri = 'blog/page/view/id' . DS . $this->_row['id'];
            Bootstrap::getRequest()->set('uri', $newUri);
        }
        return false;
    }

    protected function matchUrl($path) {

        $model = Bootstrap::getModel('blog/blog');
        $model->load('url', $path, 'blog');
        $this->_row = $model->getData();
        return $this->_row;

    }
}