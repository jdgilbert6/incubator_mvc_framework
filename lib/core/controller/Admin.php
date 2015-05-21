<?php

class Core_Controller_Admin extends Core_Controller_Abstract {

    public function isAdminLoggedIn() {

        $admin = Core_Session::getSessionVariable('admin', 'logged-in');

        if($admin === false) {
            header('Location: index.php');
        }
    }
}