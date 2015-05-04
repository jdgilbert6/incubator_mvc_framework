<?php

class Page_View_Page extends Page_View_Abstract {

    protected $template;

    public function displayTemplate($template) {
        include_once $this->fetchTemplate($template);
    }

    public function fetchTemplate($template) {
        return $this->renderTemplate($template);
    }

    public function renderTemplate($template){
        if(file_exists(strtolower($this->get('template', $template)))) {
            $this->get('template', $template);
        } else {
            include_once $template;
        }
    }

//    public function renderTemplate($template) {
//
//        $templateName = $this->getTemplate($template);
//        if(!file_exists($template)) {
//            return $this->getTemplate('default.phtml');
//        } else {
//            return $template;
//        }
//    }
}