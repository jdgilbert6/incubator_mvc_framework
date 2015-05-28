<?php

class Cms_View_Welcome extends Cms_View_View {

    public function __construct() {

        $this->setTitle('page/user_login');
        $this->setChildTemplate('block/');
        $this->renderTemplate();

    }
}