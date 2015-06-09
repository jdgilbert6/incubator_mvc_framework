<?php

class Base_Model_Access extends Core_Model_Model {

    public function __construct() {}

    public function adminRegister() {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $db = Bootstrap::getModel('admin/admin');
        $db->set('name', $name);
        $db->set('email', $email);
        $db->set('password', sha1($password));
        $db->save();
    }

    public function adminLogin() {

        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        
        $login = Bootstrap::getModel('admin/admin')->load('email', $email);
        if(($login->_data['password']) == $password) {
            Core_Session::setSessionVariable('admin', 'logged-in');
            Core_Session::setSessionVariable('email', $login->_data['email']);
            Core_Session::setCookie('email', $login->_data['email']);
        } else {
            echo "Incorrect email and/or password.";
            Bootstrap::getRequest()->redirect('/');
        }

    }

    public function userRegister() {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $db = Bootstrap::getModel('users/users');
        $db->set('firstname', $firstname);
        $db->set('lastname', $lastname);
        $db->set('email', $email);
        $db->set('password', sha1($password));
        $db->save();
    }

    public function userLogin() {

        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $login = Bootstrap::getModel('users/users')->load('email', $email);
        if(($login->_data['password']) == $password) {
            Core_Session::setSessionVariable('user', 'logged-in');
            Core_Session::setSessionVariable('email', $login->_data['email']);
            Core_Session::setCookie('email', $login->_data['email']);
        } else {
            echo "Incorrect email and/or password.";
            Bootstrap::getRequest()->redirect('/');
        }
    }

    public function logout() {

        Core_Session::endSession();
        Bootstrap::getRequest()->redirect('/');
    }
}