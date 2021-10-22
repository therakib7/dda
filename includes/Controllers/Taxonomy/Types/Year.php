<?php

namespace Exdda\Controllers\Taxonomy\Types; 

class Year { 

    public function __construct() {  
        add_action('init', [$this, 'create_taxonomy'], 5 ); 
    }  

    public static function create_taxonomy() {
        
        if ( !is_blog_installed() || taxonomy_exists( 'years' ) ) {
            return;
        }
         
        do_action('exdda_years_taxonomy');  

        $labels = array(
            'name'              => esc_html_x( 'Years', 'years general name', 'dda' ),
            'singular_name'     => esc_html_x( 'Year', 'years singular name', 'dda' ),
            'search_items'      => esc_html__( 'Search Years', 'dda' ),
            'all_items'         => esc_html__( 'All Years', 'dda' ),
            'parent_item'       => esc_html__( 'Parent Year', 'dda' ),
            'parent_item_colon' => esc_html__( 'Parent Year:', 'dda' ),
            'edit_item'         => esc_html__( 'Edit Year', 'dda' ),
            'update_item'       => esc_html__( 'Update Year', 'dda' ),
            'add_new_item'      => esc_html__( 'Add New Year', 'dda' ),
            'new_item_name'     => esc_html__( 'New Year', 'dda' ),
            'menu_name'         => esc_html__( 'Years', 'dda' ),   
            'not_found'         => esc_html__( 'No years found.', 'dda' ), 
        );
     
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'years' ),
        );
     
        register_taxonomy( 'years', array( 'jurygroup', 'project' ), apply_filters('exdda_years_taxonomy_args', $args) );
        
        do_action('exdda_after_years_taxonomy'); 
    }
}
