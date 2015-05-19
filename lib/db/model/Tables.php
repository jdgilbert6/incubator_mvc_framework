<?php

class Db_Model_Tables extends Db_Model_Wrapper {

    public function __construct() {

        $setup = Bootstrap::getConfig()->tableSetup();

        if($setup === 0) {

        }
    }

    public function createUsersTable() {
        $this->connect();
        $sql = "CREATE TABLE IF NOT EXISTS users (
          id INT NOT NULL AUTO_INCREMENT,
          firstname VARCHAR(30) NOT NULL,
          lastname VARCHAR(30) NOT NULL,
          email VARCHAR(255) NOT NULL,
          username VARCHAR(30) NOT NULL,
          password VARCHAR(30) NOT NULL,
          PRIMARY KEY(id))";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();

    }

    public function createAdminTable() {
        $this->connect();
        $sql = "CREATE TABLE IF NOT EXISTS admin (
          id INT(10) NOT NULL AUTO_INCREMENT,
          firstname VARCHAR(30) NOT NULL,
          lastname VARCHAR(30) NOT NULL,
          email VARCHAR(255) NOT NULL,
          password VARCHAR(30) NOT NULL,
          PRIMARY KEY(id))";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function createBlogTable() {
        $this->connect();
        $sql = "CREATE TABLE IF NOT EXISTS blog (
          id INT(10) NOT NULL AUTO_INCREMENT,
          author VARCHAR(30) NOT NULL,
          date VARCHAR(30) NOT NULL,
          title VARCHAR(100) NOT NULL,
          content MEDIUMTEXT NOT NULL,
          image VARCHAR(100) NOT NULL,
          url VARCHAR(100) NOT NULL,
          PRIMARY KEY(id))";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function createCommentsTable() {
        $this->connect();
        $sql = "CREATE TABLE IF NOT EXISTS comments (
          id INT(10) NOT NULL AUTO_INCREMENT,
          comment VARCHAR(255) NOT NULL,
          date VARCHAR(30) NOT NULL,
          blogid VARCHAR(255) NOT NULL,
          PRIMARY KEY(id))";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }
}