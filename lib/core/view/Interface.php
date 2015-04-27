<?php

interface Core_View_Interface {

    public function getHeader($param);

    public function getBody($param);

    public function insertCSS();

    public function insertJS();

    public function insertImage();

    public function renderView($path);
}


