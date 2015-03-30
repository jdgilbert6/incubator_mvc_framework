<?php

class Core_Controller_Router_Default implements Core_Controller_Router_Interface {

    public function matchRequest(Core_Request $instance) {

        //Put 404 error message here
        echo "Error 404: Not found.";
        die;

    }
}