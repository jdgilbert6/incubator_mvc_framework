<?php

class Autoload {

    private function __construct() {}

    public function autoloader() {

        spl_autoload_register(function($className) {
            $className = $className . '.php';
            $fileName = stream_resolve_include_path($className);
            if (file_exists($fileName)) {
                include($fileName);
            }
            //
        });
    }
}


//        // Identify file paths
//        $paths = array(
//              BASE_PATH . '/lib',
//              BASE_PATH . '/app',
//              BASE_PATH,
//              get_include_path() );

//        // Set paths
//        set_include_path(implode(PATH_SEPARATOR, $paths));
//
//        // Call spl_autoload passing the class name as the argument
//        public function($classFile) {
//
//            // Convert class name to path name with file
//            $classPath = stream_resolve_include_path(BASE_PATH . $classFile . '.php');
//
//            // Test if the file exists
//            if(file_exists($classPath)) {
//
//                // Yes -> include the file
//                include($classPath);
//
//            } else {
//                // No -> Go back to conversion
//
//            }
//
//        }


