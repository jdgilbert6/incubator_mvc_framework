<?php

class Core_Config {

    static $xml = null;
    static $frontNames = null;

    /**
     * Singleton instance
     */
    static $instance = null;

    private function __construct() {}

    public static function getInstance() {

        if (null === self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    /**
     * Provide public access to protected function _getXml
     */
    public function getXml() {
        return $this->_getXml();
    }

    /**
     * Search all included files paths for config.xml files.
     * Store config.xml files in $xmlFiles array.
     * File is added using MergeXML.php file.
     * All config.xml files are held in static variable $xml and returned.
     */
    protected function _getXml() {

        if(!self::$xml){
            $xmlFiles = glob('**/*/config.xml');

            $mergedXml = new MergeXML();

            foreach($xmlFiles as $xmlFile) {
                if(file_exists($xmlFile)) {
                    $mergedXml->addFile($xmlFile);
                }
            }

            self::$xml = new SimpleXMLElement($mergedXml->dom->saveXml());
        }
        return self::$xml;
    }

    /**
     * Query xml using XPath.
     * Return an array of SimpleXMLElement objects.
     */
    protected function _queryXml($xpath = false) {

        if($xpath){
            return $this->getXml()->xpath($xpath);
        }
    }

    /**
     * XPath search through xml nodes in config.xml files.
     * Return array of routers inside <routes> nodes.
     */
    public function getRouters() {

        $routersArray = array();
        $xpath = '//config/routes';

        foreach($this->_queryXml($xpath) as $routers) {
            foreach($routers->children() as $childRoute) {
                array_push($routersArray, (string) $childRoute->module);
            }
        }
        return $routersArray;
    }

    /**
     * If $frontNames has a value, return the value.
     * If $frontNames has no value, XPath through config.xml files.
     * Return array child nodes of <controller> nodes.
     * This is used for url rewriting.
     */
    public function getFrontNamesArray() {

        if(self::$frontNames){
            return self::$frontNames;
        } else {
            $uriArray = array();
            $uriNodes = $this->_queryXml('//config/controller/*');
            foreach($uriNodes as $uriNode){
                    $key = (string) $uriNode->uri;
                    $uriArray[$key] = $uriNode->getName();
            }
            return $uriArray;
        }
    }

    /**
     * XPath search through xml nodes in config.xml files.
     * Return array of child nodes of <database> nodes.
     */
    public function getDatabase() {

        $dbArray = array();
        $dbXml = $this->_queryXml('//config/database');

        foreach($dbXml as $dbNodes) {
            foreach((array) $dbNodes as $key => $value) {
                $dbArray[$key] = $value;
            }
        }

        return $dbArray;
    }

    public function tableSetup() {

        $tableXml = $this->_queryXml('//config/table');

        foreach($tableXml as $tableArray) {
            $tableArray = (array) json_decode(json_encode($tableArray));
            foreach($tableArray as $key => $value) {
                $tableArray[$key] = $value;
            }
        }
        return $value;
    }

    public function changeSetupValue() {

        $doc = new DOMDocument();
        $doc->load('**/core/config.xml');
        $setup = $doc->getElementsByTagName('setup');
        $value = $setup->item(0)->nodeValue = 1;
        $doc->saveXML();
    }
}


