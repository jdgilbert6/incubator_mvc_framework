<?php

class Core_Config {

    static $instance = null;
    static $xml = null;

    private function __construct() {
        self::$xml = self::_getXml();
    }

    public static function getInstance() {

        if (null === self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    protected static function _getXml(){
        $xmlFiles = glob('**/*/config.xml');
        $xmlArray = array();
        foreach($xmlFiles as $xmlFile) {
            if(file_exists($xmlFile)) {
                $xmlArray[] = simplexml_load_file($xmlFile);
            }
        }

        return $xmlArray;
    }

    public static function getXmlFiles() {

    }

    public static function getPath() {

    }
}