<?php

class Db_Model_Connection extends Core_Singleton {

    public static function getInstance() {

        if (null === self::$instance) {
            self::$instance = self::_dbConnect();
        }

        return self::$instance;
    }

    protected function _dbConnect() {

        $dbHandle = null;

        $db_info = Bootstrap::getConfig()->getDatabase();
        $db_host = $db_info['host'];
        $db_name = $db_info['dbname'];
        $db_user = $db_info['user'];
        $db_pass = $db_info['password'];

        try {
            $dbHandle = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
            $dbHandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
        }

        return $dbHandle;
    }

}
