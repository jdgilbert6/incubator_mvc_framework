<?php

class Core_Controller_Router_Default implements Core_Controller_Router_Interface {

    public function matchRequest(Core_Request $request) {

        $request->set('is_dispatched', true);
        $controllerInstance = new Core_Controller_Error();
        $controllerInstance->dispatch('indexAction');
        return true;
    }
}