<?php

class Db_Model_Tables extends Db_Model_Wrapper {

    public function __construct() {

        $setup = Bootstrap::getConfig()->tableSetup();

        if($setup == 0) {
            $this->init();
            Bootstrap::getConfig()->changeSetupValue();
        }
    }

    public function init() {

        $this->createUsersTable();
        $this->createAdminTable();
        $this->loadSampleAdmin();
        $this->createBlogTable();
        $this->loadSampleBlog();
        $this->createCommentsTable();
        $this->loadSampleComments();
    }

    public function createUsersTable() {
        $this->connect();
        $sql = "CREATE TABLE IF NOT EXISTS users (
          id INT NOT NULL AUTO_INCREMENT,
          firstname VARCHAR(30) NOT NULL,
          lastname VARCHAR(30) NOT NULL,
          email VARCHAR(255) NOT NULL,
          username VARCHAR(30) NOT NULL,
          password VARCHAR(40) NOT NULL,
          PRIMARY KEY(id))
          ENGINE=INNODB";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();

    }

    public function createAdminTable() {
        $this->connect();
        $sql = "CREATE TABLE IF NOT EXISTS admin (
          id INT(10) NOT NULL AUTO_INCREMENT,
          name VARCHAR(30) NOT NULL,
          email VARCHAR(255) NOT NULL,
          password VARCHAR(40) NOT NULL,
          PRIMARY KEY(id))
          ENGINE=INNODB";
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
          PRIMARY KEY(id),
          FOREIGN KEY (author) REFERENCES admin(name) ON DELETE CASCADE)
          ENGINE=INNODB";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function createCommentsTable() {
        $this->connect();
        $sql = "
          CREATE TABLE IF NOT EXISTS comments (
          id INT(10) NOT NULL AUTO_INCREMENT,
          comment VARCHAR(255) NOT NULL,
          date VARCHAR(30) NOT NULL,
          blogid INT(10) NOT NULL,
          PRIMARY KEY(id),
          FOREIGN KEY (blogid) REFERENCES blog(id) ON DELETE CASCADE)
          ENGINE=INNODB";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function loadSampleAdmin() {
        $this->connect();
        $sql = "INSERT INTO admin (name, email, password)
          VALUES ('Rocky Squirrel', 'rocky@blueacorn.com', sha1('acorn'))";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function loadSampleBlog() {
        $this->connect();
        $sql = "INSERT INTO blog (author, content, date, image, title, url)
          VALUES ('Rocky Squirrel', 'sample.phtml', '05/20/15', 'blueacorn.jpg', 'Sample Blog Entry',
          'application.dev/blog')";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function loadSampleComments() {
        $this->connect();
        $sql = "INSERT INTO comments (comment, date, blogid)
          VALUES ('comments.phtml', '05/20/15', '33')";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }
}