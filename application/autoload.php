<?php
/**Author: Kanchan Khatri
 * system bootstrap file.
*/
// Open error reporting.
error_reporting(E_ALL);
// Include global config.
require_once 'config.php';
/**
 * Autoloader for application. 
 * namespaces / classes loaded.
 * @param $class class names with or without namespace
 */
function __autoload($class) {
    $file = '';
    $class = ltrim($class, '\\');
    $ns = strrpos($class, '\\');    
    if ($ns) {              
        $ns_str = substr($class, 0, $ns);
        $class = substr($class, $ns + 1);
        $file  = str_replace('\\', DIRECTORY_SEPARATOR, $ns_str) . DIRECTORY_SEPARATOR;
        $file  = APP_DIR.str_replace('App/', '', $file);        
    } else {
        $file = APP_DIR.'classes'.DIRECTORY_SEPARATOR;
    } 
    if(!file_exists($file.$class.EXT)) {
        $file = APP_DIR.'classes'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR;
    }
    $file .= $class . EXT;
    if(!file_exists($file))
        return false;
    require $file;    
}
