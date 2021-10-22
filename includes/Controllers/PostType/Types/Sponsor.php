<?php

namespace Exdda\Controllers\PostType\Types; 

class Sponsor { 

    public function __construct() {  
        add_action('init', [$this, 'create_post_type'], 5 ); 
    }  

    public static function create_post_type() {
        
        if ( !is_blog_installed() || post_type_exists( 'sponsor' ) ) {
            return;
        }
         
        do_action('exdda_sponsor_post_type');

        $labels = array(
            'name'                  => esc_html_x( 'Sponsors', 'Post type general name', 'dda' ),
            'singular_name'         => esc_html_x( 'Sponsor', 'Post type singular name', 'dda' ),
            'menu_name'             => esc_html_x( 'Sponsors', 'Admin Menu text', 'dda' ),
            'name_admin_bar'        => esc_html_x( 'Sponsor', 'Add New on Toolbar', 'dda' ),
            'add_new'               => esc_html__( 'Add New', 'dda' ),
            'add_new_item'          => esc_html__( 'Add New Sponsor', 'dda' ),
            'new_item'              => esc_html__( 'New Sponsor', 'dda' ),
            'edit_item'             => esc_html__( 'Edit Sponsor', 'dda' ),
            'view_item'             => esc_html__( 'View Sponsor', 'dda' ),
            'all_items'             => esc_html__( 'All Sponsors', 'dda' ),
            'search_items'          => esc_html__( 'Search Sponsors', 'dda' ),
            'parent_item_colon'     => esc_html__( 'Parent Sponsors:', 'dda' ),
            'not_found'             => esc_html__( 'No sponsors found.', 'dda' ),
            'not_found_in_trash'    => esc_html__( 'No sponsors found in Trash.', 'dda' ), 
        );
     
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true, 
            'menu_icon'          => 'dashicons-star-filled',
            'rewrite'            => array( 'slug' => 'sponsor' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'supports'           => array( 'title' ),
        );
     
        register_post_type( 'sponsor', apply_filters('exdda_sponsor_post_type_args', $args) );
        
        do_action('exdda_after_sponsor_post_type'); 
    }
}
