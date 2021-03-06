<?php

// Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define shorthand for separators
define('DS', DIRECTORY_SEPARATOR);
define('PS', PATH_SEPARATOR);

// Define file paths
define('BASE_PATH', dirname(realpath(__FILE__)));
define('BASE_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME']);
define('APP_PATH', BASE_PATH . '/app');
define('LIB_PATH', BASE_PATH . '/lib');
define('TMP_PATH', BASE_PATH . '/template');
define('ASS_PATH', BASE_URL . '/asset');

// Set defined paths to be included
set_include_path(get_include_path() . PS . BASE_PATH . PS . APP_PATH . PS . LIB_PATH . PS . TMP_PATH . PS . ASS_PATH);

// Include file path to bootstrap
include LIB_PATH . DS . 'bootstrap.php';

// Call run function from bootstrap
Bootstrap::run();



