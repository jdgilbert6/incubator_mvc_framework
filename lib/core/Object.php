<?php

class Core_Object extends Core_Singleton {

    protected $_data = array();

    public function __call($methodName, $params = null)
    {
        if($methodName == 'set' && count($params) == 2)
        {
            $key = $params[0];
            $value = $params[1];
            $this->_data[$key] = $value;
            return $this;
        }
        elseif($methodName == 'get' && count($params) == 1)
        {
            $key = $params[0];
            if(array_key_exists($key, $this->_data)) {
                return $this->_data[$key];
            } else {
                return false;
            }
        }
        return false;
    }

    public function getData(){
        return $this->_data;
    }
}