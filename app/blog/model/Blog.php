<?php

class Blog_Model_Blog extends Core_Model_Model {

    public function __construct() {

        $this->getTableName();
    }

    public function getPostArray() {

        $this->_data = $this->select('blog');
        return $this->_data;
    }
}