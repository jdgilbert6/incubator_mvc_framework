<?php

class Db_Model_Connection extends Core_Singleton {

    protected $dbHandle;

    protected function __construct() {

        $db_info = Bootstrap::getConfig()->getDatabase();
        $db_host = $db_info['host'];
        $db_name = $db_info['dbname'];
        $db_user = $db_info['user'];
        $db_pass = $db_info['password'];

        try {
            $this->dbHandle = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
            $this->dbHandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    }

    public function getDbHandle() {
        return $this->dbHandle;
    }

}
