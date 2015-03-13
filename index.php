<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define 'DS' as DIRECTORY_SEPARATOR

define('DS', DIRECTORY_SEPARATOR);

// define paths here
define('BASE_PATH', dirname(realpath(__FILE__)));
define('APP_PATH', BASE_PATH . '/app');
define('LIB_PATH', BASE_PATH . '/lib');

include LIB_PATH . DS . 'bootstrap.php';

Bootstrap::run();




