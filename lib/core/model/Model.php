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

//        $this->_db = Bootstrap::getConnection();
    }

    /**
     * Select an entry in a row in the table.
     */
    public function load($param = null) {

        $result = $this->select($this->_table, $param);
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
            $this->insert($this->_table,$this->_data);
        } else {
            $pk = $this->getPrimaryKeyName($this->_table);
            $id = $this->_origData[$pk];
            foreach($this->_data as $fieldname => $value) {
                if($pk !== $fieldname) {
                    $this->update($this->_table, $fieldname, $value, $id);
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
            $this->deleteEntry($this->_table, $param);
        } elseif(!empty($_origData)) {
            $pk = $this->getPrimaryKeyName($this->_table);
            $id = $this->_origData[$pk];
            $this->deleteEntry($this->_table, $id);
        } elseif($param == null && empty($_origData)) {
            echo "No data has been deleted.";
        }
    }

    public function getTableName() {

        $instanceName = get_class($this);
        $classNameArray = explode('_', $instanceName);
        $lastWord = end($classNameArray);
        $this->_table = strtolower($lastWord);
    }

    public function select($table, $id=null, $fieldname=null) {
        $this->_db = Bootstrap::getConnection();
        if($fieldname == null) {
            $pk = $this->getPrimaryKeyName($table);
            $sql = "SELECT * FROM $table WHERE $pk = '$id'";
        } else {
            $sql = "SELECT * FROM $table WHERE $fieldname = '$id'";
        }
        $stmt = $this->_db->prepare($sql);
        //$stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $values) {
        $this->getPrimaryKeyName($table);
        $this->_db = Bootstrap::getConnection();
        $fieldnames = array_keys($values);
        $sql = "INSERT INTO $table";
        $fields = '( ' . implode(' ,', $fieldnames) . ' )';
        $bound = '(:' . implode(', :', $fieldnames) . ' )';
        $sql .= $fields . ' VALUES ' . $bound;

        $stmt = $this->_db->prepare($sql);

        foreach($values as $key => &$value) {
            $stmt->bindParam($key,$value);
        }
        $stmt->execute();
    }

    public function update($table, $fieldname, $value, $id) {
        $this->_db = Bootstrap::getConnection();
        $pk = $this->getPrimaryKeyName($table);
        $sql = "UPDATE $table SET $fieldname = '$value' WHERE $pk = :id";
        $stmt = $this->_db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deleteEntry($table, $id) {
        $this->_db = Bootstrap::getConnection();
        $pk = $this->getPrimaryKeyName($table);
        $sql = "DELETE FROM $table WHERE $pk = :id";
        $stmt = $this->_db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getPrimaryKeyName($table) {
        $this->_db = Bootstrap::getConnection();
        $sql = "SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $primaryKeyName = $result[0]['Column_name'];
        return $primaryKeyName;
    }
}