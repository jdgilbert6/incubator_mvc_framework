<?php

class Db_Model_Wrapper {

    public $db;

    public function connect() {
        if(!$this->db instanceof PDO) {
            $this->db = Db_Model_Connection::getInstance();
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
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
//        $sql = "SELECT * FROM " . $table;
//        if(!empty($where)) {
//            $sql .= " WHERE " . $where . ";";
//        }
//        $this->prepare($sql, $bind);
//        return $this->fetchAll($this->_fetchMode);
    }

    public function insert($table, $values) {
        $this->getPrimaryKeyName($table);
        $this->connect();
        $fieldnames = array_keys($values);
        $size = sizeof($fieldnames);
        $i = 1;
        $sql = "INSERT INTO $table";
        $fields = '( ' . implode(' ,', $fieldnames) . ' )';
        $bound = '(:' . implode(', :', $fieldnames) . ' )';
        $sql .= $fields.' VALUES '.$bound;

        $stmt = $this->db->prepare($sql);

        foreach($values as $key => &$value) {
            $stmt->bindParam($key,$value);
        }
        $stmt->execute();
//        $fields = array_keys($data);
//        $sql = "INSERT INTO " . $table . "(" . implode(", ", $fields) . ") VALUES (:" . implode(", :", $fields) . ");";
//        $bind = array();
//        foreach($fields as $field) {
//            $bind[":$field"] = $data[$field];
//        }
//        return $this->run($sql, $bind);
    }

    public function update($table, $fieldname, $id) {
        $this->connect();
        $pk = $this->getPrimaryKeyName($table);
        $sql = "UPDATE . $table . SET . $fieldname . WHERE . $pk . = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function delete($table, $id) {
        $this->connect();
        $pk = $this->getPrimaryKeyName($table);
        $sql = "DELETE FROM $table WHERE $pk = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
//        $sql = "DELETE FROM " . $table;
//        if(!empty($where)) {
//            $sql .= " WHERE " . $where;
//        }
//        return $this->run($sql, $bind);
    }

    public function getPrimaryKeyName($table) {
        $this->connect();
        $sql = "SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $primaryKeyName = $result[0]['Column_name'];
        return $primaryKeyName;
    }
}