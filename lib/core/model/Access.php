<?php

class Core_Model_Access extends Core_Model_Model {

    public function __construct() {}

    public function adminRegister() {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $db = Bootstrap::getModel('core/admin');
        $db->set('name', $name);
        $db->set('email', $email);
        $db->set('password', sha1($password));
        $db->save();
    }

    public function adminLogin() {

        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $login = Bootstrap::getModel('core/admin')->load('email');
        $pass = Bootstrap::getModel('core/admin')->load(sha1('password'));

        if($email === $login && $password === $pass)
            Core_Session::setSessionVariable('admin', 'logged-in', true);
    }

    public function logout() {

        Core_Session::endSession();
    }
}