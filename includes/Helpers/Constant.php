<?php

namespace Exdda\Helpers; 

class Constant { 
    public function __construct() {   
        if ( !defined('EXDDA_VERSION') ) { 
            define('EXDDA_VERSION', '1.0.0');
        } 
    
        if ( !defined('EXDDA_PATH') ) { 
            define('EXDDA_PATH', plugin_dir_path(EXDDA_FILE) );
        } 
        
        if ( !defined('EXDDA_URL') ) { 
            define('EXDDA_URL', plugins_url('', EXDDA_FILE));
        } 
    
        if ( !defined('EXDDA_SLUG') ) { 
            define('EXDDA_SLUG', basename( dirname(EXDDA_FILE) ));
        } 
    
        if ( !defined('EXDDA_TEMPLATE_DEBUG_MODE') ) { 
            define('EXDDA_TEMPLATE_DEBUG_MODE', false);
        }   
    } 
}
