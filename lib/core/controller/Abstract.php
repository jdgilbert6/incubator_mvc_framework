<?php

class Core_Controller_Abstract {

    public function dispatch($actionMethodName = false) {
        if($actionMethodName){
            return $this->$actionMethodName();
        }
    }
}

