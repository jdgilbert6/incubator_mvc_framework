<?php

class Core_Model_Abstract extends Core_Singleton{

    protected $_data = array();

    public function __construct() {}

    public function __call($methodName, $params = null) {

        $methodName = strtolower(preg_replace('/([a-zA-Z])(?=[A-Z])/', '$1 ', $methodName));
        $methodArray = explode(" ", $methodName);
        $methodName = array_shift($methodArray);
        $key = implode("_", $methodArray);


        if($methodName == 'set' && isset($params) ){
            $value = $params[0];
            $this->_data[$key] = $value;
            return true;
        }
        elseif($methodName == 'get') {

            if(array_key_exists($key, $this->_data)) {
                return $this->_data[$key];
            } else {
                return false;
            }
        }
        return false;
    }

    public function getData() {
        return $this->_data;
    }
}