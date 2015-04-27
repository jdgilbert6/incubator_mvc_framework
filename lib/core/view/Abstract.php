<?php

class Core_View_Abstract implements Core_View_Interface {

    public function getHeader($param) {

        $header = $this->renderView($param);
        return $header;
    }

    public function getBody($param) {

        $body = $this->renderView($param);
        return $body;
    }

    public function insertCSS() {

    }

    public function insertJS() {

    }

    public function insertImage() {

    }

    public function renderView($path) {

        $location = explode('/', str_replace('_', '/',  $path));
        $module = array_shift($location);
        $file = strtolower(array_pop($location));

        $viewPath = APP_PATH . DS . 'view' . DS . $module . DS . $file;

        if(file_exists($viewPath)) {
            return $viewPath;
        }
    }
}