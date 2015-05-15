<?php

class Sql_Tables extends Db_Model_Wrapper {

    protected function createUsersTable() {
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

    protected function createAdminTable() {
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

    protected function createBlogTable() {
        $this->connect();
        $sql = "CREATE TABLE 'blog' (
          'id' int(10) NOT NULL AUTO_INCREMENT,
          'author' VARCHAR(30) NOT NULL,
          'date' VARCHAR(30) NOT NULL,
          'title' VARCHAR(100) NOT NULL,
          'content' VARCHAR(255) NOT NULL,
          'image' VARCHAR(100) NOT NULL,
          'url' VARCHAR(100) NOT NULL,
          PRIMARY KEY(id))";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    protected function createCommentsTable() {
        $this->connect();
        $sql = "CREATE TABLE 'comments' (
          'id' int(10) NOT NULL AUTO_INCREMENT,
          'comment' VARCHAR(255) NOT NULL,
          'date' VARCHAR(30) NOT NULL,
          'blogid' VARCHAR(255) NOT NULL,
          PRIMARY KEY(id))";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }
}