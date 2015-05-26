<?php

class Cms_Model_Tables {

    static $instance = null;
    protected $_db = null;

//    public static function getInstance()
//    {
//        static $instance = null;
//        if (null === $instance) {
//            $instance = new static();
//        }
//
//        return $instance;
//    }

    private function __construct() {

        $setup = Bootstrap::getConfig()->tableSetup();

        if ($setup == 0) {
            $this->init();
            Bootstrap::getConfig()->changeSetupValue();
        }
    }

    public static function getInstance() {

        if (null === self::$instance) {
                self::$instance = new static();
        }

        return self::$instance;

    }

    public function init() {

//        Bootstrap::getConnection();
        $this->createUsersTable();
        $this->createAdminTable();
        $this->createBlogTable();
        $this->createCommentsTable();
        $this->loadSampleAdmin();
        $this->loadSampleBlog();
        $this->loadSampleComments();
    }

    public function createUsersTable() {
        $this->_db = Bootstrap::getConnection();
        $sql = "CREATE TABLE IF NOT EXISTS users (
          id INT NOT NULL AUTO_INCREMENT,
          firstname VARCHAR(30) NOT NULL,
          lastname VARCHAR(30) NOT NULL,
          email VARCHAR(255) NOT NULL,
          password VARCHAR(40) NOT NULL,
          PRIMARY KEY(id),
          UNIQUE (firstname, lastname, email, password))
          ENGINE=INNODB";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();

    }

    public function createAdminTable() {
        Bootstrap::getConnection();
        $sql = "CREATE TABLE IF NOT EXISTS admin (
          id INT(10) NOT NULL AUTO_INCREMENT,
          name VARCHAR(30) NOT NULL,
          email VARCHAR(255) NOT NULL,
          password VARCHAR(40) NOT NULL,
          PRIMARY KEY(id),
          UNIQUE (name, email, password))
          ENGINE=INNODB";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function createBlogTable() {
        Bootstrap::getConnection();
        $sql = "CREATE TABLE IF NOT EXISTS blog (
          id INT(10) NOT NULL AUTO_INCREMENT,
          author VARCHAR(30) NOT NULL,
          date VARCHAR(30) NOT NULL,
          title VARCHAR(100) NOT NULL,
          content MEDIUMTEXT NOT NULL,
          image VARCHAR(100) NOT NULL,
          url VARCHAR(100) NOT NULL,
          PRIMARY KEY(id),
          UNIQUE (title, url))
          ENGINE=INNODB";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function createCommentsTable() {
        Bootstrap::getConnection();
        $sql = "CREATE TABLE IF NOT EXISTS comments (
          id INT(10) NOT NULL AUTO_INCREMENT,
          comment VARCHAR(255) NOT NULL,
          date VARCHAR(30) NOT NULL,
          blogid INT(10) NOT NULL,
          PRIMARY KEY(id),
          UNIQUE (comment))
          ENGINE=INNODB";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function addBlogForeignKey() {
        Bootstrap::getConnection();
        $sql = "ALTER TABLE blog
          ADD CONSTRAINT FK_blog
          FOREIGN KEY (author) REFERENCES admin(name)
          ON DELETE CASCADE";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function addCommentsForeignKey() {
        Bootstrap::getConnection();
        $sql = "ALTER TABLE comments
          ADD CONSTRAINT FK_comments
          FOREIGN KEY (blogid) REFERENCES blog(id)
          ON DELETE CASCADE";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function loadSampleAdmin() {
        Bootstrap::getConnection();
        $sql = "INSERT IGNORE INTO admin (name, email, password)
          VALUES ('Rocky Squirrel', 'rocky@blueacorn.com', sha1('acorn'))";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function loadSampleBlog() {
        Bootstrap::getConnection();
        $sql = "INSERT IGNORE INTO blog (author, content, date, image, title, url)
          VALUES ('Rocky Squirrel', 'sample.phtml', '05/20/15', 'blueacorn.jpg', 'Sample Blog Entry',
          'template/page/sample.phtml')";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }

    public function loadSampleComments() {
        Bootstrap::getConnection();
        $sql = "INSERT IGNORE INTO comments (comment, date, blogid)
          VALUES ('comments.phtml', '05/20/15', '1')";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
    }
}