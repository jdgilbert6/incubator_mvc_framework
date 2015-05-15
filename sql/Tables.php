<?php

class Sql_Users extends Db_Model_Wrapper {

    public function createUsersTable() {
        $this->connect();
        $sql = "CREATE TABLE 'users' (
          'id' int(10) NOT NULL AUTO_INCREMENT,
          'firstname' VARCHAR(30) NOT NULL,
          'lastname' VARCHAR(30) NOT NULL,
          'email' VARCHAR(255) NOT NULL,
          'username' VARCHAR(30) NOT NULL,
          'password' VARCHAR(30) NOT NULL,
          PRIMARY KEY(id))";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function createAdminTable() {
        $this->connect();
        $sql = "CREATE TABLE 'admin' (
          'id' int(10) NOT NULL AUTO_INCREMENT,
          'firstname' VARCHAR(30) NOT NULL,
          'lastname' VARCHAR(30) NOT NULL,
          'email' VARCHAR(255) NOT NULL,
          'password' VARCHAR(30) NOT NULL,
          PRIMARY KEY(id))";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function createBlogTable() {
        $this->connect();
        $sql = "CREATE TABLE 'users' (
          'id' int(10) NOT NULL AUTO_INCREMENT,
          'author' VARCHAR(30) NOT NULL,
          'date' VARCHAR(30) NOT NULL,
          'title' VARCHAR(255) NOT NULL,
          'content' VARCHAR(30) NOT NULL,
          'image'
          'url'  VARCHAR(30) NOT NULL,
          PRIMARY KEY(id))";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function createCommentsTable() {

    }
}