<?php 
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * @package   DDA Project - Digital Award
 * @author    ExpressoSoft <info@expressosoft.com>
 * @link      https://expressosoft.com
 * @copyright 2021 ExpressoSoft 
 *
 *
 * Plugin Name: DDA Project
 * Plugin URI: https://expressosoft.com
 * Author: ExpressoSoft
 * Author URI: https://expressosoft.com
 * Version: 1.0.0
 * Description: DDA Project desc
 * Text Domain: dda
 * Domain Path: /languages
 *
 */ 

if ( !class_exists('Exdda') ) { 
    
    if ( !defined('EXDDA_FILE') ) {
        define('EXDDA_FILE', __FILE__);
    } 

    require_once plugin_dir_path( __FILE__ ) .'includes/Exdda.php';
}    