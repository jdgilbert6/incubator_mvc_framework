<?php

class Core_Config extends Core_Singleton {

    static $xml = null;
    static $frontNames = null;

    protected function __construct() {
    }

    public function getXml() {
        return $this->_getXml();
    }

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

    protected function _queryXml($xpath = false) {

        if($xpath){
            return $this->getXml()->xpath($xpath);
        }
    }

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

    public function getFrontNamesArray() {

        if(self::$frontNames){
            return self::$frontNames;
        } else {
            $uriArray = array();
            $uriNodes = $this->_queryXml('//config/controller/*');
            foreach($uriNodes as $uriNode){
//                foreach($uriNode->children() as $childUriNode){
//                    array_push($uriArray, (string) $uriNode->uri);
//                    $uriArray[$uriNode->getName()] = (string) $uriNode->uri;
                    $key = (string) $uriNode->uri;
                    $uriArray[$key] = $uriNode->getName();
//                }
            }
            return $uriArray;
        }
    }

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
}


