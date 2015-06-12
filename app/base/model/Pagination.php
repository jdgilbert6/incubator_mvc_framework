<?php

class Base_Model_Pagination extends Core_Model_Model {

    protected $_parent;
    protected $_items;
    protected $_pageSize;
    protected $_totalPages;

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

        return parent::select($table, null, null, null, $options);
    }

    public function getTotal() {

        $table = $this->_parent->getTableName();

        $total = parent::select($table, array('COUNT(*)'), null, null, null);
        $count = $total[0];
        $total = $count['COUNT(*)'];
        return $total;
    }

    public function getPage($pageNum) {

        $totalPages = $this->getTotalPages();

        if(isset($pageNum) && is_numeric($pageNum)) {
            $currentPage = (int) $pageNum;
        } else {
            $currentPage = 1;
        }

        if($currentPage > $totalPages) {
            $currentPage = $totalPages;
        }

        if($currentPage < 1) {
            $currentPage = 1;
        }

        $offset = ($currentPage - 1) * $this->_pageSize;

        $this->_items = $this->select($this->_pageSize, $offset);

        return $this->_items;
    }

    public function getTotalPages() {

        $itemsPerPage = $this->_pageSize;
        $numRows = (int) $this->getTotal();
        $this->_totalPages = ceil($numRows/$itemsPerPage);
        return $this->_totalPages;
    }
}