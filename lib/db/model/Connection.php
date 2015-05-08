<?php

class Db_Model_Connection {

    /**
     * Singleton instance
     */
    static $instance = null;

    private function __construct() {}

    public static function getInstance() {

        if (null === self::$instance) {
            self::$instance = self::_dbConnect();
        }

        return self::$instance;
    }

    /**
     * Establish connection to MySQL database
     */
    protected function _dbConnect() {

        $dbHandle = null;

        /*
         * Call getDatabase method in Config.php via bootstrap.
         * Each string in variables is a xml node.
         * Return xml node values that correlate to strings in $db_info.
         */
        $db_info = Bootstrap::getConfig()->getDatabase();
        $db_host = $db_info['host'];
        $db_name = $db_info['dbname'];
        $db_user = $db_info['user'];
        $db_pass = $db_info['password'];

        /*
         * Establish connection to database using PDO.
         * PDO is a php API for connecting to databases.
         * If no connection is established, a PDO exception is displayed.
         */
        try {
            $dbHandle = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
            $dbHandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
        }

        /*
         * Return the connection.
         */
        return $dbHandle;
    }

}
