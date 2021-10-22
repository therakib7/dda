<?php

namespace Exdda\Controllers\PostType\Types; 

class Jurygroup { 

    public function __construct() {  
        add_action('init', [$this, 'create_post_type'], 5 ); 
    }  

    public static function create_post_type() {
        
        if ( !is_blog_installed() || post_type_exists( 'jurygroup' ) ) {
            return;
        }
         
        do_action('exdda_jurygroup_post_type');

        $labels = array(
            'name'                  => esc_html_x( 'Jury Groups', 'Post type general name', 'dda' ),
            'singular_name'         => esc_html_x( 'Jury Group', 'Post type singular name', 'dda' ),
            'menu_name'             => esc_html_x( 'Jury Groups', 'Admin Menu text', 'dda' ),
            'name_admin_bar'        => esc_html_x( 'Jury Group', 'Add New on Toolbar', 'dda' ),
            'add_new'               => esc_html__( 'Add New', 'dda' ),
            'add_new_item'          => esc_html__( 'Add New Jury Group', 'dda' ),
            'new_item'              => esc_html__( 'New Jury Group', 'dda' ),
            'edit_item'             => esc_html__( 'Edit Jury Group', 'dda' ),
            'view_item'             => esc_html__( 'View Jury Group', 'dda' ),
            'all_items'             => esc_html__( 'All Jury Groups', 'dda' ),
            'search_items'          => esc_html__( 'Search Jury Groups', 'dda' ),
            'parent_item_colon'     => esc_html__( 'Parent Jury Groups:', 'dda' ),
            'not_found'             => esc_html__( 'No jury groups found.', 'dda' ),
            'not_found_in_trash'    => esc_html__( 'No jury groups found in Trash.', 'dda' ), 
        );
     
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true, 
            'menu_icon'          => 'dashicons-groups',
            'rewrite'            => array( 'slug' => 'jurygroup' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'supports'           => array( 'title' ),
        );
     
        register_post_type( 'jurygroup', apply_filters('exdda_jurygroup_post_type_args', $args) );
        
        do_action('exdda_after_jurygroup_post_type'); 
    }
}
