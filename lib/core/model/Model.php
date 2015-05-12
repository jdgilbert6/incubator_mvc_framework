<?php

class Core_Model_Model extends Core_Object {

    protected $_table = '';
    protected $_origData = array();
    protected $_db = null;

    /**
     * Database model constructor
     *
     */
    public function __construct() {

        $this->_db = Bootstrap::getModel('db/wrapper');
        /* $instanceName is set to called app model */
        $instanceName = get_class($this);
        /* Set class name to an array. */
        $classNameArray = explode('_', $instanceName);
        /* Identify last word in classNameArray */
        $lastWord = end($classNameArray);
        /* Add 's' to the end of last word and title table as last word. */
        $this->_table = strtolower($lastWord) . 's';
    }

    /**
     * Add an entry to a row in the database
     */
    public function load($param = null) {

        $result = $this->_db->select($this->_table, $param);
        foreach ($result[0] as $key => $value) {
            $this->_data[$key] = $value;
            $this->_origData[$key] = $value;
        }

        return $this;
    }

    /**
     * Insert data into table or update data in table.
     */
    public function save() {

        if(empty($this->_origData)) {
            $this->_db->insert($this->_table,$this->_data);
        } else {
            $pk = $this->_db->getPrimaryKeyName($this->_table);
            $id = $this->_origData[$pk];
            foreach($this->_data as $fieldname => $value) {
                if($pk !== $fieldname) {
                    $this->_db->update($this->_table, $fieldname, $value, $id);
                }
            }
        }

        return $this;
    }

    /**
     * Delete data from table.
     */
    public function delete($param = null) {

        if($param !== null) {
            $this->_db->delete($this->_table, $param);
        } elseif(!empty($_origData)) {
            $pk = $this->_db->getPrimaryKeyName($this->_table);
            $id = $this->_origData[$pk];
            $this->_db->delete($this->_table, $id);
        } elseif($param == null && empty($_origData)) {
            echo "No data has been deleted.";
        }
    }
}