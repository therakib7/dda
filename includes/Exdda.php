<?php

require_once __DIR__ . './../vendor/autoload.php'; 
 
use Exdda\Traits\SingletonTrait;
use Exdda\Helpers\Constant; 
use Exdda\Helpers\Functions; 
use Exdda\Controllers\MainController;   

/**
 * Class Exdda
 */
final class Exdda {

    use SingletonTrait; 
 
    /**
     * DDA Project Constructor.
     */
    public function __construct() {  
        new Constant(); 

        $this->init_hooks(); 
    } 

    private function init_hooks() {
 
        add_action('plugins_loaded', [$this, 'on_plugins_loaded'], -1); 
        add_action('init', [$this, 'init'], 1); 
    }

    public function init() {
        do_action('exdda_before_init');

        $this->load_plugin_textdomain();
        
        new MainController();  

        do_action('exdda_init');
    }

    public function on_plugins_loaded() { 
        do_action('exdda_loaded');        
    }   

    /**
     * Load Localization files. 
     */
    public function load_plugin_textdomain() {
         
        $locale = determine_locale();
        $locale = apply_filters('exdda_plugin_locale', $locale );
        unload_textdomain('dda');
        load_textdomain('dda', WP_LANG_DIR . '/dda/dda-' . $locale . '.mo');
        load_plugin_textdomain('dda', false, plugin_basename(dirname(EXDDA_FILE)) . '/languages');
    }
 
    /**
     * What type of request is this?
     *
     * @param string $type admin, ajax, cron or public.
     *
     * @return bool
     */
    public function is_request( $type ) {
        switch( $type ) {
            case 'admin':
                return is_admin();
            case 'public':
                return ( !is_admin() || defined('DOING_AJAX') ) && !defined('DOING_CRON');
            case 'ajax':
                return defined('DOING_AJAX');
            case 'cron':
                return defined('DOING_CRON');
        }
    }  

    /**
     * Get the plugin path.
     *
     * @return string
     */
    public function plugin_path() {
        return untrailingslashit(plugin_dir_path(EXDDA_FILE));
    } 

    /**
     * @return mixed
     */
    public function version() {
        return EXDDA_VERSION;
    }  

    /**
     * Get the template path.
     *
     * @return string
     */
    public function get_template_path() {
        return apply_filters('exdda_template_path', 'dda/templates/');
    } 

    /**
     * Get the template partial path.
     *
     * @return string
     */
    public function get_partial_path( $path = null, $args = []) {
        Functions::get_template_part( 'partials/' . $path, $args ); 
    } 

    /**
     * @param $file
     *
     * @return string
     */
    public function get_assets_uri($file) {
        $file = ltrim($file, '/');

        return trailingslashit(EXDDA_URL . '/assets') . $file;
    }

    /**
     * @param $file
     *
     * @return string
     */
    public function render($viewName, $args = array(), $return = false) { 
        $path = str_replace(".", "/", $viewName);
        $viewPath = EXDDA_PATH . '/views/' . $path . '.php';
        if ( !file_exists($viewPath) ) { 
            return;
        }

        if ( $args ) {
            extract($args);
        }

        if ( $return ) {
            ob_start();
            include $viewPath;

            return ob_get_clean();
        }
        include $viewPath;
    }

    /**
     * @param $file
     * Get all optoins field value
     * @return mixed
     */
    public function get_options() {

        $option_field = func_get_args()[0];
        $result = get_option( $option_field ); 
        $func_args = func_get_args();
        array_shift( $func_args );

        foreach ( $func_args as $arg ) {
            if ( is_array($arg) ) {
                if ( !empty( $result[$arg[0]] ) ) {
                    $result = $result[$arg[0]];
                } else {  
                  $result = $arg[1];
                }
            } else {
                if ( !empty($result[$arg] ) ) {
                    $result = $result[$arg];
                } else { 
                    $result = null;
                }
            }
        }
        return $result;
    }  
}

/**
 * @return bool|SingletonTrait|Exdda
 */
function exdda() {
    return Exdda::getInstance();
} 
exdda(); // Run Exdda Plugin     