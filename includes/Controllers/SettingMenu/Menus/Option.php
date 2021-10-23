<?php

namespace Exdda\Controllers\SettingMenu\Menus; 

class Option {

    public function __construct() {   
        add_action('admin_menu', [$this, 'create_admin_menu'], 5 ); 
    }   

    public function create_admin_menu() {
        if( function_exists('acf_add_options_page') ) {
            $parent = acf_add_options_page(
                array(
                 'page_title'  => 'Options',
                 'menu_title'  => 'Options',
                 'redirect'    => false,
                 'icon_url'    => 'dashicons-menu'
                )
            );
        
            acf_add_options_sub_page(
                array(
                    'page_title'    => 'Special priser',
                    'menu_title'    => 'Special priser',
                    'parent_slug'   => $parent['menu_slug'],
                )
            );
        };
    } 
} 