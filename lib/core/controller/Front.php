<?php

class Core_Controller_Front {

    protected $_routes = array();

    public function __construct() {}

    public function addRoutes(Core_Controller_Router_Interface $route){
        array_push($this->_routes, $route);
    }

    public function dispatch(){
        $i = 0;
        while(!Bootstrap::getRequest()->get('is_dispatched') && $i < 100){
            $i++;
            foreach($this->_routes as $route){
                if($route->matchRequest(Bootstrap::getRequest())){
                    break;
                }
            }
        }
        if(!Bootstrap::getRequest()->get('is_dispatched')){
            return new Core_Controller_Router_Default();
        }
    }
}