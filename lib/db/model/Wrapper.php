<?php

class Db_Model_PDOWrapper extends Db_Model_Connection {

    private $_fetchMode = PDO::FETCH_ASSOC;
    public $db;

    public function __construct() {
        parent::getDbHandle();
    }

    public function select($table, $where="", $bind="") {
        $sql = "SELECT * FROM " . $table;
        if(!empty($where)) {
            $sql .= " WHERE " . $where . ";";
        }
        $this->prepare($sql, $bind);
        return $this->fetchAll($this->_fetchMode);
    }

    public function insert($table, $data) {
        $fields = array_keys($data);
        $sql = "INSERT INTO " . $table . "(" . implode(", ", $fields) . ") VALUES (:" . implode(", :", $fields) . ");";
        $bind = array();
        foreach($fields as $field) {
            $bind[":$field"] = $data[$field];
        }
        return $this->run($sql, $bind);
    }

    public function update($table, $fieldname, $id) {
        $pk = $this->getPrimaryKeyName($table);
        $sql = "UPDATE " . $table . " SET " . $fieldname . " WHERE " . $pk . " = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function delete($table, $where, $bind="") {
        $sql = "DELETE FROM " . $table;
        if(!empty($where)) {
            $sql .= " WHERE " . $where;
        }
        return $this->run($sql, $bind);
    }

    public function getPrimaryKeyName($table) {
        $sql = "SHOW KEYS FROM `$table` WHERE `Key_name` = 'PRIMARY'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $primaryKeyName = $result[0]['Column_name'];
        return $primaryKeyName;
    }
}