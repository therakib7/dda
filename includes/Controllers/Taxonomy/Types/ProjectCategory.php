<?php

namespace Exdda\Controllers\Taxonomy\Types; 

class ProjectCategory { 

    public function __construct() {  
        add_action('init', [$this, 'create_taxonomy'], 5 ); 
    }  

    public static function create_taxonomy() {
        
        if ( !is_blog_installed() || taxonomy_exists( 'project_category' ) ) {
            return;
        }
         
        do_action('exdda_project_category_taxonomy');  

        $labels = array(
            'name'              => esc_html_x( 'Project Categories', 'project_category general name', 'dda' ),
            'singular_name'     => esc_html_x( 'Project Category', 'project_category singular name', 'dda' ),
            'search_items'      => esc_html__( 'Search Project Categories', 'dda' ),
            'all_items'         => esc_html__( 'All Project Categories', 'dda' ),
            'parent_item'       => esc_html__( 'Parent Project Category', 'dda' ),
            'parent_item_colon' => esc_html__( 'Parent Project Category:', 'dda' ),
            'edit_item'         => esc_html__( 'Edit Project Category', 'dda' ),
            'update_item'       => esc_html__( 'Update Project Category', 'dda' ),
            'add_new_item'      => esc_html__( 'Add New Project Category', 'dda' ),
            'new_item_name'     => esc_html__( 'New Project Category', 'dda' ),
            'menu_name'         => esc_html__( 'Project Categories', 'dda' ),   
            'not_found'         => esc_html__( 'No project categories found.', 'dda' ), 
        );
     
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'project_category' ),
        );
     
        register_taxonomy( 'project categories', array( 'jurygroup', 'project' ), apply_filters('exdda_project_category_taxonomy_args', $args) );
        
        do_action('exdda_after_project_category_taxonomy');  
        
    }
}
