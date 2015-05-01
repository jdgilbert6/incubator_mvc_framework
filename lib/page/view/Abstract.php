<?php

abstract class Page_View_Abstract {

    protected $_data = array();

    public function __call($methodName, $params = null) {

        $methodNameArray = preg_split('/(?<=[a-z])(?=[A-Z])/x', $methodName);
        $method = array_shift($methodNameArray);

        // Build the key

        // Build the the template path

        // Resolve template path

        switch ($method) {
            case 'set':
                // Fancy shit goes here
                // Assign path name for $_data at $key
                if(file_exists(strtolower($methodNameArray[1]))) {
                    return $methodNameArray[1];
                }

                break;

            case 'get':

                // More fancy shit goes here
                if(file_exists(strtolower($methodNameArray[1]))) {
                    return $methodNameArray[1];
                }
                break;
        }
        return $this;
    }

    abstract public function renderTemplate($template);

}