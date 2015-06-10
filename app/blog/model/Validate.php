<?php

class Blog_Model_Validate extends Base_Model_Validate {

    public function validateComment() {

        if(!$this->validateNotEmpty('comment')) {
            $this->_errors['comment'] = 'Please include a comment.';
        }

        if(!array_key_exists('comment', $this->_errors) && !$this->validateMaxLength('comment', 255)) {
            $this->_errors['comment'] = 'Comment is too long.';
        }

        return empty($this->_errors);
    }
}