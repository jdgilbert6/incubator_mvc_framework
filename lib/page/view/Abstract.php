<?php

abstract class Page_View_Abstract {

//    protected $_data = array();
//
//    public function __call($methodName, $params = null)
//    {
//
//        $methodNameArray = preg_split('/(?<=[a-z])(?=[A-Z])/x', $methodName);
//        $method = array_shift($methodNameArray);
//        $key = strtolower($methodNameArray[0]);
//
//        //Test the parameter
//        //2 Values -> view/block
//        //1 Value  -> .phtml
//        if(!empty($params[0]) && count($params) == 1) {
//            $file = $params[0] . '.phtml';
//        } elseif (!empty($params[0]) && !empty($params[1])) {
//
//        }
//
//        // Build the the template path
//
//        // Resolve template path
//        $tp = stream_resolve_include_path($file);
//
//        // Build the key
//        if($tp) {
//            $this->_data[$key] = $tp;
//        }
//
//
//        switch ($method) {
//            case 'set':
//                // Fancy shit goes here
//                // Assign path name for $_data at $key
////                if(file_exists(strtolower($methodNameArray[0]))) {
////                    return $methodNameArray[0];
////                }
//
//                break;
//
//            case 'get':
//
//                $path = '';
//
//                if(isset($params[1])){
//
//                    if(isset($params[0]) && $params[0] === 'template'){
//                        if(!empty($params[1])) {
//                            $path = TMP_PATH . DS . $params[1] . '.phtml';
//                        }
//                    } else if(isset($params[0]) && $params[0] === 'block') {
//                        if(!empty($params[1])) {
//                            $path = APP_PATH . DS . 'cms' . DS . 'view' . DS . $params[0] . DS . $params[1] . '.phtml';
//                        }
//                    }
//                    include_once $path;
//
//
//                } else {
//                    //LATER
//                }
//
//
//
//                return;
//
//                break;
//        }
//        return $this;
//    }

    abstract public function renderTemplate();

}