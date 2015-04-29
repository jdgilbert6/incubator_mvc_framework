<?php

class Page_View_Page extends Page_View_Abstract {

    protected $data;
    protected $templateDirectory;

    public function getTemplateDirectory() {
        return $this->templateDirectory;
    }

    public function setTemplateDirectory($directory) {
        $this->templateDirectory = rtrim($directory, DS);
    }

    public function getTemplatePathname($file) {
        return $this->templateDirectory . DS . ltrim($file, DS);
    }

    public function displayTemplate($template) {
        echo $this->fetchTemplate($template);
    }

    public function fetchTemplate($template) {
        return $this->renderTemplate($template);
    }

    public function renderTemplate($template = 'template/default.phtml'){
        if($this->get('template')){
            include_once $this->get('template');
        } else {
            include_once $template;
        }
    }


}