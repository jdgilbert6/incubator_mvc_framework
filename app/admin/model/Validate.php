<?php

class Admin_Model_Validate extends Base_Model_Validate {

    public function validateAdminCrudForm() {

        if(!$this->validateNotEmpty('title')) {
            $this->_errors['title'] = 'Please add a title.';
        }

        if(!$this->validateNotEmpty('content')) {
            $this->_errors['content'] = 'Please add content.';
        }

        if(!array_key_exists('title', $this->_errors) && !$this->validateMaxLength('title', 100)) {
            $this->_errors['title'] = 'Title is too long.';
        }

        if(!array_key_exists('content', $this->_errors) && !$this->validateMaxLength('content', 16777215)) {
            $this->_errors['content'] = 'Content is too long.';
        }

        return empty($this->_errors);

    }
}