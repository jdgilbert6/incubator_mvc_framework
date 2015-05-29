<?php

class Cms_View_Welcome extends Cms_View_View {

    public function __construct() {

        $this->setTemplate('page/user_login');
        $this->renderTemplate();

    }
}