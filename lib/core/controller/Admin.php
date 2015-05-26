<?php

class Core_Controller_Admin extends Core_Controller_Abstract {

    public function isAdminLoggedIn() {

        $admin = Core_Session::getSessionVariable('admin', 'logged-in');

        if($admin === false) {
            $redirect = $this->_getRequest()->redirect('/home');
        }
    }
}