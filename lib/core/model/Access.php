<?php

class Core_Access extends Core_Model_Model{

    public function register() {

        $firstname  = $_POST['firstname'];
        $lastname   = $_POST['lastname'];
        $email      = $_POST['email'];
        $username   = $_POST['username'];
        $password   = sha1($_POST['password']);

        $sql = new Db_Model_Wrapper();
        $sql->insert('users', 'firstname', 'lastname', 'email', 'username', 'password');

    }

    public function login() {

        $username   = $_POST['username'];
        $password   = $_POST['password'];

        $login = new Core_Session();
        $login->setSessionVariable('user', 'logged-in', true);
        $login->getCookie();
    }

    public function logout() {

        $logout = new Core_Session();
        $logout->endSession();
    }
}