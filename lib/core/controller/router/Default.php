<?php

class Core_Controller_Router_Default implements Core_Controller_Router_Interface {

    public function matchRequest(Core_Request $request) {

        $request->set('is_dispatched', true);
        echo '404';

    }
}