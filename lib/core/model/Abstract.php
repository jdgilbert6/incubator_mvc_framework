<?php

class Core_Model_Abstract extends Core_Singleton{

    protected $_table = '';
    protected $_data = array();
    protected $_origData = array();
    protected $_db = null;

    public function __construct() {

        $this->_db = Bootstrap::getModel('db/crud', false);

        $instanceName = get_class($this);
        $classNameArray = explode('_', $instanceName);
        $lastWord = end($classNameArray);
        $this->_table = strtolower($lastWord) . 's';
    }

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

    public function load($param = null) {

        $result = $this->_db->dbSelect($this->_table, $param);
        foreach ($result[0] as $key => $value) {
            $this->_data[$key] = $value;
            $this->_origData[$key] = $value;
        }

        return $this;

    }

    public function save() {

        if(empty($this->_origData)) {
            $this->_db->dbInsert($this->_table,$this->_data);
        } else {
            $pk = $this->_db->getPrimaryKeyName($this->_table);
            $id = $this->_origData[$pk];
            foreach($this->_data as $fieldname => $value) {
                if($pk !== $fieldname) {
                    $this->_db->dbUpdate($this->_table, $fieldname, $value, $id);
                }
            }
        }

        return $this;
    }

    public function delete($param = null) {  #TODO test for table dependencies

        if($param !== null) {
            $this->_db->dbDelete($this->_table, $param);
        } elseif(!empty($_origData)) {
            $pk = $this->_db->getPrimaryKeyName($this->_table);
            $id = $this->_origData[$pk];
            $this->_db->dbDelete($this->_table, $id);
        } elseif($param == null && empty($_origData)) {
            echo "No data has been deleted.";
        }
    }
}