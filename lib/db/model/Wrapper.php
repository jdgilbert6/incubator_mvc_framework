<?php

class Db_Model_Wrapper {

    static $instance = null;

//    public static function getInstance() {
//        static $instance = null;
//        if (null === $instance) {
//            $instance = new static();
//        }
//
//        return $instance;
//    }

    private function __construct() {}

    public static function getInstance() {

        if (null === self::$instance) {
            self::$instance = new static();
        }

        return self::$instance;
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
        return $stmt->fetchAll();
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
        $this->_db = Bootstrap::getConnection();
        $pk = $this->getPrimaryKeyName($table);
        $sql = "UPDATE $table SET $fieldname = '$value' WHERE $pk = :id";
        $stmt = $this->_db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function delete($table, $id) {
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