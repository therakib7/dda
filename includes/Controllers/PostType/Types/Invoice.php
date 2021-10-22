<?php

namespace Exdda\Controllers\PostType\Types; 

class Invoice { 

    public function __construct() {  
        add_action('init', [$this, 'create_post_type'], 5 ); 
    }  

    public static function create_post_type() {
        
        if ( !is_blog_installed() || post_type_exists( 'invoice' ) ) {
            return;
        }
         
        do_action('exdda_invoice_post_type');

        $labels = array(
            'name'                  => esc_html_x( 'Invoices', 'Post type general name', 'dda' ),
            'singular_name'         => esc_html_x( 'Invoice', 'Post type singular name', 'dda' ),
            'menu_name'             => esc_html_x( 'Invoices', 'Admin Menu text', 'dda' ),
            'name_admin_bar'        => esc_html_x( 'Invoice', 'Add New on Toolbar', 'dda' ),
            'add_new'               => esc_html__( 'Add New', 'dda' ),
            'add_new_item'          => esc_html__( 'Add New Invoice', 'dda' ),
            'new_item'              => esc_html__( 'New Invoice', 'dda' ),
            'edit_item'             => esc_html__( 'Edit Invoice', 'dda' ),
            'view_item'             => esc_html__( 'View Invoice', 'dda' ),
            'all_items'             => esc_html__( 'All Invoices', 'dda' ),
            'search_items'          => esc_html__( 'Search Invoices', 'dda' ),
            'parent_item_colon'     => esc_html__( 'Parent Invoices:', 'dda' ),
            'not_found'             => esc_html__( 'No invoices found.', 'dda' ),
            'not_found_in_trash'    => esc_html__( 'No invoices found in Trash.', 'dda' ), 
        );
     
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true, 
            'menu_icon'          => 'dashicons-cart',
            'rewrite'            => array( 'slug' => 'invoice' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'supports'           => array( 'title' ),
        );
     
        register_post_type( 'invoice', apply_filters('exdda_invoice_post_type_args', $args) );
        
        do_action('exdda_after_invoice_post_type'); 
    }
}
