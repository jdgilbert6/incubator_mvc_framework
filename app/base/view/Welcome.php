<?php

class Base_View_Welcome extends Base_View_View {

    public function __construct() {

        $this->setTemplate('page/user_login');
        $this->renderTemplate();

    }
}