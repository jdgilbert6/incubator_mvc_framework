<?php

class Base_Model_Pagination extends Core_Model_Model {

    protected $_parent;
    protected $_items;
    protected $_pageSize;

    public function setParent(Core_Model_Model $parent) {

        $this->_parent = $parent;
        return $this;
    }

    public function setItemsPerPage($pageSize) {

        $this->_pageSize = $pageSize;
        return $this;
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

        $itemsPerPage = $this->_pageSize;
        $numRows = $this->getTotal();
        $totalPages = ceil($numRows / $itemsPerPage);

        $sql = $this->select();


    }


}