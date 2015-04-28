<?php

class Page_View_Page extends Page_View_Abstract{

    public function renderTemplate($template = 'template/default.phtml'){
        if($this->get('template')){
            include_once $this->get('template');
        } else {
            include_once $template;
        }
    }


}