<?php

namespace Exdda\Controllers\PostType\Types; 

class AdvisoryMember { 

    public function __construct() {  
        add_action('init', [$this, 'create_post_type'], 5 ); 
    }  

    public static function create_post_type() {
        
        if ( !is_blog_installed() || post_type_exists( 'advisorymember' ) ) {
            return;
        }
         
        do_action('exdda_advisorymember_post_type');

        $labels = array(
            'name'                  => esc_html_x( 'Advisory Members', 'Post type general name', 'dda' ),
            'singular_name'         => esc_html_x( 'Advisory Member', 'Post type singular name', 'dda' ),
            'menu_name'             => esc_html_x( 'Advisory Members', 'Admin Menu text', 'dda' ),
            'name_admin_bar'        => esc_html_x( 'Advisory Member', 'Add New on Toolbar', 'dda' ),
            'add_new'               => esc_html__( 'Add New', 'dda' ),
            'add_new_item'          => esc_html__( 'Add New Advisory Member', 'dda' ),
            'new_item'              => esc_html__( 'New Advisory Member', 'dda' ),
            'edit_item'             => esc_html__( 'Edit Advisory Member', 'dda' ),
            'view_item'             => esc_html__( 'View Advisory Member', 'dda' ),
            'all_items'             => esc_html__( 'All Advisory Members', 'dda' ),
            'search_items'          => esc_html__( 'Search Advisory Members', 'dda' ),
            'parent_item_colon'     => esc_html__( 'Parent Advisory Members:', 'dda' ),
            'not_found'             => esc_html__( 'No advisory members found.', 'dda' ),
            'not_found_in_trash'    => esc_html__( 'No advisory members found in Trash.', 'dda' ), 
        );
     
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true, 
            'menu_icon'          => 'dashicons-groups',
            'rewrite'            => array( 'slug' => 'advisorymember' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'supports'           => array( 'title' ),
        );
     
        register_post_type( 'advisorymember', apply_filters('exdda_advisorymember_post_type_args', $args) );
        
        do_action('exdda_after_advisorymember_post_type'); 
    }
}
