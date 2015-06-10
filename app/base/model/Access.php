<?php

class Base_Model_Access extends Core_Model_Model {

    protected $_firstname;
    protected $_lastname;
    protected $_email;
    protected $_password;

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

        $login = Bootstrap::getModel('admin/admin')->load('email', $this->_email);
        if (($login->_data['password']) == $this->_password) {
            Core_Session::setSessionVariable('admin', 'logged-in');
            Core_Session::setSessionVariable('email', $login->_data['email']);
            Core_Session::setCookie('email', $login->_data['email']);
            return true;
        } else {
            return false;
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

        $login = Bootstrap::getModel('users/users')->load('email', $this->_email);
        if(($login->_data['password']) == $this->_password) {
            Core_Session::setSessionVariable('user', 'logged-in');
            Core_Session::setSessionVariable('email', $login->_data['email']);
            Core_Session::setCookie('email', $login->_data['email']);
            return true;
        } else {
            return false;
        }
    }

    public function login() {

        $this->_email = $_POST['email'];
        $this->_password = sha1($_POST['password']);

        if($this->adminLogin() && !$this->userLogin()) {
            Bootstrap::getResponse()->redirect('/admin/admin/index');
        }

        if(!$this->adminLogin() && $this->userLogin()) {
            Bootstrap::getResponse()->redirect('/blog/page/list');
        }

        if(!$this->adminLogin() && !$this->userLogin()) {
            Bootstrap::getResponse()->redirect('/');
        }
    }

    public function logout() {

        Core_Session::endSession();
        Bootstrap::getResponse()->redirect('/');
    }
}