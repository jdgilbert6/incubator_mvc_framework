<?php

// Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define shorthand for separators
define('DS', DIRECTORY_SEPARATOR);
define('PS', PATH_SEPARATOR);

// Define file paths
define('BASE_PATH', dirname(realpath(__FILE__)));
define('APP_PATH', BASE_PATH . '/app');
define('LIB_PATH', BASE_PATH . '/lib');
define('TMP_PATH', BASE_PATH . '/templates');

set_include_path(get_include_path() . PS . BASE_PATH . PS . APP_PATH . PS . LIB_PATH . PS . TMP_PATH);

include LIB_PATH . DS . 'bootstrap.php';

Bootstrap::run();



