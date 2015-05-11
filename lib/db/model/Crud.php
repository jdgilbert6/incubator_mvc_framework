<?php

class Db_Model_Crud {

    private $db;

    /**
     *
     * @Connect to the database and set the error mode to Exception
     *
     * @Throws PDOException on failure
     *
     */
    public function conn()
    {
        if (!$this->db instanceof PDO)
        {
           $this->db = Bootstrap::getModel('db/connection')->getDbHandle();
        }
    }


    /***
     *
     * @select values from table
     *
     * @access public
     *
     * @param string $table The name of the table
     *
     * @param string $fieldname
     *
     * @param string $id
     *
     * @return array on success or throw PDOException on failure
     *
     */
    public function dbSelect($table, $id=null, $fieldname=null)
    {
//        $this->conn();
        if($fieldname == null) {
            $pk = $this->getPrimaryKeyName($table);
            $sql = "SELECT * FROM `$table` WHERE `$pk`=:id";
        } else {
            $sql = "SELECT * FROM `$table` WHERE `$fieldname`=:id";
        }

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     *
     * @execute a raw query
     *
     * @access public
     *
     * @param string $sql
     *
     * @return array
     *
     */
    public function rawSelect($sql)
    {
        $this->conn();
        return $this->db->query($sql);
    }

    /**
     *
     * @run a raw query
     *
     * @param string The query to run
     *
     */
    public function rawQuery($sql)
    {
        $this->conn();
        $this->db->query($sql);
    }


    /**
     *
     * @Insert a value into a table
     *
     * @acces public
     *
     * @param string $table
     *
     * @param array $values
     *
     * @return int The last Insert Id on success or throw PDOexeption on failure
     *
     */
    public function dbInsert($table, $values)
    {
        $this->getPrimaryKeyName($table);

//        $this->conn();
        /*** snarg the field names from the first array member ***/
        $fieldnames = array_keys($values);
        /*** now build the query ***/
        $size = sizeof($fieldnames);
        $i = 1;
        $sql = "INSERT INTO $table";
        /*** set the field names ***/
        $fields = '( ' . implode(' ,', $fieldnames) . ' )';
        /*** set the placeholders ***/
        $bound = '(:' . implode(', :', $fieldnames) . ' )';
        /*** put the query together ***/
        $sql .= $fields.' VALUES '.$bound;

        /*** prepare and execute ***/
        $stmt = $this->db->prepare($sql);

        foreach($values as $key => &$value) {
            $stmt->bindParam($key,$value);
        }

        $stmt->execute();
    }

    /**
     *
     * @Update a value in a table
     *
     * @access public
     *
     * @param string $table
     *
     * @param string $fieldname, The field to be updated
     *
     * @param string $value The new value
     *
     * @param string $pk The primary key
     *
     * @param string $id The id
     *
     * @throws PDOException on failure
     *
     */
    public function dbUpdate($table, $fieldname, $value, $id)
    {
//        $this->conn();
        $pk = $this->getPrimaryKeyName($table);
        $sql = "UPDATE `$table` SET `$fieldname`='{$value}' WHERE `$pk` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }


    /**
     *
     * @Delete a record from a table
     *
     * @access public
     *
     * @param string $table
     *
     * @param string $fieldname
     *
     * @param string $id
     *
     * @throws PDOexception on failure
     *
     */
    public function dbDelete($table, $id)
    {
//        $this->conn();
        $pk = $this->getPrimaryKeyName($table);
        $sql = "DELETE FROM `$table` WHERE `$pk` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    }


   public function selectAll($table) {

   }

    public function getPrimaryKeyName($table) {
//        $this->conn();
        $sql = "SHOW KEYS FROM `$table` WHERE `Key_name` = 'PRIMARY'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $primaryKeyName = $result[0]['Column_name'];
        return $primaryKeyName;
    }
}