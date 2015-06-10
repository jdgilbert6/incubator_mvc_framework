<?php

class Base_Controller_Index extends Core_Controller_Abstract {

    public function indexAction() {

        $view = Bootstrap::getView('base/login');
        return $view;
    }

    public function aboutAction() {

        $view = Bootstrap::getView('base/about');
        return $view;
    }

    public function contactAction() {

        $view = Bootstrap::getView('base/contact');
        return $view;
    }
}