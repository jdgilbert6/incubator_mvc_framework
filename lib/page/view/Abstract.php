<?php

abstract class Page_View_Abstract extends Core_Object{

//    protected $_data = array();

//    public function __call($methodName, $params = null) {
//
//        $methodNameArray = preg_split('/(?<=[a-z])(?=[A-Z])/x', $methodName);
//        $method = array_shift($methodNameArray);
//        $newParam = strtolower($methodNameArray[0]);
//        $paramsArray = array_unshift($params, $newParam);
//        $newParams = implode(',', $params);
//
//
//        switch ($method) {
//
//            case 'set':
//
//                if($method == 'set' && count($params) == 2) {
//
//                    $key = $params[0];
//                    $value = $params[1];
//                    $this->_data[$key] = $value;
//                    return $this;
//                }
//            break;
//
//            case 'get':
//
//                if($method == 'get' && count($params) == 1) {
//
//                    $key = $params[0];
//                    if(array_key_exists($key, $this->_data)) {
//                        return $this->_data[$key];
//                    } else {
//                        return false;
//                    }
//                }
//            break;
//        }
//    }

    abstract public function renderTemplate();

}