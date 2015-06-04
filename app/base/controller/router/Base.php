<?php

class Base_Controller_Router_Base implements Core_Controller_Router_Interface {

    public function matchRequest(Core_Request $request) {

        if(!$request->get('uri_parsed')) {
            $uri = $request->getData();
            $path = $uri['uri'];
            $path = str_replace('/', '', $path);
            var_dump($path);
        }
    }
}