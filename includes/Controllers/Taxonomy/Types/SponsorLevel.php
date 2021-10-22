<?php

namespace Exdda\Controllers\Taxonomy\Types; 

class SponsorLevel { 

    public function __construct() {  
        add_action('init', [$this, 'create_taxonomy'], 5 ); 
    }  

    public static function create_taxonomy() {
        
        if ( !is_blog_installed() || taxonomy_exists( 'sponsor_level' ) ) {
            return;
        }
         
        do_action('exdda_sponsor_level_taxonomy');  

        $labels = array(
            'name'              => esc_html_x( 'Sponsor Levels', 'sponsor_level general name', 'dda' ),
            'singular_name'     => esc_html_x( 'Sponsor Level', 'sponsor_level singular name', 'dda' ),
            'search_items'      => esc_html__( 'Search Sponsor Levels', 'dda' ),
            'all_items'         => esc_html__( 'All Sponsor Levels', 'dda' ),
            'parent_item'       => esc_html__( 'Parent Sponsor Level', 'dda' ),
            'parent_item_colon' => esc_html__( 'Parent Sponsor Level:', 'dda' ),
            'edit_item'         => esc_html__( 'Edit Sponsor Level', 'dda' ),
            'update_item'       => esc_html__( 'Update Sponsor Level', 'dda' ),
            'add_new_item'      => esc_html__( 'Add New Sponsor Level', 'dda' ),
            'new_item_name'     => esc_html__( 'New Sponsor Level', 'dda' ),
            'menu_name'         => esc_html__( 'Sponsor Levels', 'dda' ),   
            'not_found'         => esc_html__( 'No sponsor levels found.', 'dda' ), 
        );
     
        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'sponsor_level' ),
        );
     
        register_taxonomy( 'sponsor levels', array( 'sponsor' ), apply_filters('exdda_sponsor_level_taxonomy_args', $args) );
        
        do_action('exdda_after_sponsor_level_taxonomy'); 
    }
}
