<?php
/**
 * Author: Kanchan Khatri
 * This is the core file of the application which does following things
 1. Includes common files to be used in the app defined by $auto_load 
 2. Provides Loader methods which are to be used to include common modules and modules when required.
 3. provides the instance that can be used irrespective of having child class
 4. Autoloads
 */

 namespace App\Classes\Core;

 require_once APP_DIR.'autoload.php';

 class Base {
    /*Instance of this class will be stored in $instance
    */
    private static $instance;    
    /*
    $helper_objects - stores classes of helper module to be used by static methods in the app.    
    */
    protected static $helper_objects = array();
    /*
    $module_to_load - stores module to be loaded like helper / view etc. 
    */
    private static $module_to_load;

    public function __construct() {
        self::$instance = & $this;
    }
    /*
    get_instance - return the instance of the current class.
    */
    public static function &get_instance() {

        if (!isset(self::$instance)) {

            $c = __CLASS__;
            self::$instance = new $c;
        }
        return self::$instance;
    }
    /*
    fn: auto_load - Loads the common modules to be used in the app.
    $auto_load is loaded from autoload_common file.
    common helpers or libraries etc can be included in $auto_load in associative array where key is module and values array of classes. 
    */
    public function auto_load() {        
        include APP_DIR.'autoload_common'.EXT;        
        if(!empty($auto_load)){
            foreach ($auto_load as $module => $module_names) {
                if (is_array($module_names)) {
                    foreach ($module_names as $module_name) {
                        $module_to_load = "load_$module";
                        $this->$module_to_load($module_name);
                    }
                }
            }
        }
    }
    /*fn: load_helper - helps load helper modules in class. 
    This will also load the module class instances in static $helper_objects which would be used in static methods in the app extending Base class.
    */
    public function load_helper($helper_name) {        
        if (isset(self::$helper_objects[$helper_name])) {
            $helper = basename($helper_name);
            $this->$helper = self::$helper_objects[$helper_name];
        } else {

            if (strpos($helper_name, "/")) {
                $helper = basename($helper_name);
                $helper_path = str_replace($helper, "", $helper_name);
            } else {
                $helper = $helper_name;
            }                        
            $helper_path =  APP_DIR."helpers" . DIRECTORY_SEPARATOR . $helper_name . EXT;           
            if (file_exists($helper_path)) {                
                // load application helper
                require_once $helper_path;
                $this->$helper = new $helper();
                self::$helper_objects[$helper_name] = $this->$helper;                
            }            
        }                   
    }
    /*fn: load_view - helps load views in class. 
    *Views are the files in views/ dir.
    *Views are loaded to display to deliver the results in specified format.
    *@param string view_name to be loaded, array data - associative array of data to be passed, bool return - to print or return data
    *Data in the Views are provided by passing the data array in 2nd param
    *Keys in Data array will be the Variables to be used in view files.
    */
    function load_view($view_name, $data = null, $return = false) {
        ob_start();
        if (!is_null($data)) {
            foreach ($data as $var => $val) {
                $$var = $val;
            }
        }
        require VIEW_DIR . $view_name . EXT;
        if ($return) {
            $buffer = ob_get_contents();
            @ob_end_clean();
            return $buffer;
        }
    }
}

function &get_instance() {

    return Base::get_instance();
}
