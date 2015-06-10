<?php

class Base_Model_Pagination extends Core_Model_Model {

    protected $_parent;
    protected $_items;
    protected $_pageSize;

    public function setParent(Core_Model_Model $parent) {

        $this->_parent = $parent;
    }

    public function setItemsPerPage($pageSize) {

        $this->_pageSize = $pageSize;
    }

    public function select($limit, $offset) {

        $options = 'LIMIT ' . $limit . ' OFFSET ' . $offset;
        $table = $this->_parent->getTableName();

        return parent::select($table, null, null, $options);
    }

    public function getTotal() {

        $table = $this->_parent->getTableName();

        return parent::select($table, array('COUNT(*)'), null, null, null);
    }

    public function getPage($pageNum) {

        $table = $this->_parent->getTableName();
        $sql = parent::select($table, null, null, null, null);
        
    }


}