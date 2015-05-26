<?php

class Cms_Model_Access extends Core_Model_Model {

    public function __construct() {}

    public function adminRegister() {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $db = Bootstrap::getModel('cms/admin');
        $db->set('name', $name);
        $db->set('email', $email);
        $db->set('password', sha1($password));
        $db->save();
    }

    public function adminLogin() {

        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $login = Bootstrap::getModel('cms/admin')->load('email', $email);
        foreach($login->_data as $key => $dbEmail) {
            $login->_data[$key] = $dbEmail;
//            var_dump($dbEmail);
        }

        $pass = Bootstrap::getModel('cms/admin')->load('password', $password);
        foreach($pass->_data as $key => $value) {
            $pass->_data[$key] = $value;
            var_dump($pass->_data);
        }

        if($login && $pass) {
            Core_Session::setSessionVariable('admin', 'logged-in', true);
            Core_Session::setSessionVariable('admin', 'current-admin-id', $login->getId());
        } else {
            echo "Incorrect email and/or password.";
            $redirect = $this->_getRequest()->redirect('/');
        }

    }

    public function userRegister() {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $db = Bootstrap::getModel('cms/users');
        $db->set('firstname', $firstname);
        $db->set('lastname', $lastname);
        $db->set('email', $email);
        $db->set('password', sha1($password));
        $db->save();
    }

    public function userLogin() {

        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $login = Bootstrap::getModel('cms/users')->load('email', $email);
        $pass = Bootstrap::getModel('cms/users')->load('password', sha1($password));

        if($login && $pass) {
            Core_Session::setSessionVariable('user', 'logged-in', true);
            Core_Session::setSessionVariable('user', 'current-user-id', $login->getId());        }
    }

    public function logout() {

        Core_Session::setSessionVariable('user', 'logged-in', false);;
        $request = $this->_getRequest()->redirect('/');
    }
}