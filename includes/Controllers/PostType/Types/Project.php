<?php

namespace Exdda\Controllers\PostType\Types; 

class Project { 

    public function __construct() {  
        add_action('init', [$this, 'create_post_type'], 5 ); 
    }  

    public static function create_post_type() {
        
        if ( !is_blog_installed() || post_type_exists( 'project' ) ) {
            return;
        }
         
        do_action('exdda_project_post_type');

        $labels = array(
            'name'                  => esc_html_x( 'Projects', 'Post type general name', 'dda' ),
            'singular_name'         => esc_html_x( 'Project', 'Post type singular name', 'dda' ),
            'menu_name'             => esc_html_x( 'Projects', 'Admin Menu text', 'dda' ),
            'name_admin_bar'        => esc_html_x( 'Project', 'Add New on Toolbar', 'dda' ),
            'add_new'               => esc_html__( 'Add New', 'dda' ),
            'add_new_item'          => esc_html__( 'Add New Project', 'dda' ),
            'new_item'              => esc_html__( 'New Project', 'dda' ),
            'edit_item'             => esc_html__( 'Edit Project', 'dda' ),
            'view_item'             => esc_html__( 'View Project', 'dda' ),
            'all_items'             => esc_html__( 'All Projects', 'dda' ),
            'search_items'          => esc_html__( 'Search Projects', 'dda' ),
            'parent_item_colon'     => esc_html__( 'Parent Projects:', 'dda' ),
            'not_found'             => esc_html__( 'No projects found.', 'dda' ),
            'not_found_in_trash'    => esc_html__( 'No projects found in Trash.', 'dda' ), 
        );
     
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true, 
            'menu_icon'          => 'dashicons-portfolio',
            'rewrite'            => array( 'slug' => 'project' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'supports'           => array( 'title' ),
        );
     
        register_post_type( 'project', apply_filters('exdda_project_post_type_args', $args) );
        
        do_action('exdda_after_project_post_type'); 
    }
}
