<?php

class Db_Model_Wrapper {

    protected $_db;

    protected function connect() {
        if(!$this->_db instanceof PDO) {
            $this->_db = Db_Model_Connection::getInstance();
        }
    }

    public function select($table, $id=null, $fieldname=null) {
        $this->connect();
        if($fieldname == null) {
            $pk = $this->getPrimaryKeyName($table);
            $sql = "SELECT * FROM $table WHERE $pk =:id";
        } else {
            $sql = "SELECT * FROM $table WHERE $fieldname =:id";
        }
        $stmt = $this->_db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $values) {
        $this->getPrimaryKeyName($table);
        $this->connect();
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
        $this->connect();
        $pk = $this->getPrimaryKeyName($table);
        $sql = "UPDATE $table SET $fieldname = '$value' WHERE $pk = :id";
        $stmt = $this->_db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function delete($table, $id) {
        $this->connect();
        $pk = $this->getPrimaryKeyName($table);
        $sql = "DELETE FROM $table WHERE $pk = :id";
        $stmt = $this->_db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getPrimaryKeyName($table) {
        $this->connect();
        $sql = "SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'";
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $primaryKeyName = $result[0]['Column_name'];
        return $primaryKeyName;
    }
}