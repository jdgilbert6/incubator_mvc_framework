<?php

class Core_Controller_Router_Standard implements Core_Controller_Router_Interface{

    const CONTROLLER_DIRECTORY = 'Controller';

    protected $_module     = 'Core';
    protected $_controller = 'Index';
    protected $_method     = 'indexAction';
    protected $_params     = array();

    public function matchRequest(Core_Request $request){

        if(!$request->get('uri_parsed')){
            $this->parseUri($request->get('uri'));
        }
        $request->set('uri_parsed', true);

        //Build class name
        $controllerClass =
            ($request->getModule() ? $request->getModule() : $this->_module)
            . '_' . self::CONTROLLER_DIRECTORY . '_'
            . ($request->getController() ? $request->getController() : $this->_controller);

        //Test for class and method existence
        if(class_exists($controllerClass)) {
            $controllerInstance = new $controllerClass();

            if (method_exists($controllerInstance, $this->_method)) {

                $method = $this->_method;

                $request->setModule($request->getModule() ? $request->getModule() : $this->_module);
                $request->setController($request->getController() ? $request->getController() : $this->_controller);
                $request->setMethod($request->getMethod() ? $request->getMethod() : $method);
                $request->set('is_dispatched', true);

                $controllerInstance->dispatch($method);

                return true;

            }

        }
        return false;
    }

    protected function parseUri($uri) {

        if($uri){

            $uri = ltrim($uri, DS);
            $uri = rtrim($uri, DS);
            $uri = explode(DS, $uri);

            if(isset($uri[0]) && !empty($uri[0])) {
                $this->_module = ucwords(strtolower($uri[0]));

                if(isset($uri[1])) {
                    $this->_controller = ucwords(strtolower($uri[1]));

                    if(isset($uri[2])) {
                        $this->_method = strtolower($uri[2]) . 'Action';
                    }
                }
            }

            return;

        }

    }



}