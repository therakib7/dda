<?php

namespace Exdda\Controllers\PostType\Types; 

class Ticket { 

    public function __construct() {  
        add_action('init', [$this, 'create_post_type'], 5 ); 
    }  

    public static function create_post_type() {
        
        if ( !is_blog_installed() || post_type_exists( 'ticket' ) ) {
            return;
        }
         
        do_action('exdda_ticket_post_type');

        $labels = array(
            'name'                  => esc_html_x( 'Tickets', 'Post type general name', 'dda' ),
            'singular_name'         => esc_html_x( 'Ticket', 'Post type singular name', 'dda' ),
            'menu_name'             => esc_html_x( 'Tickets', 'Admin Menu text', 'dda' ),
            'name_admin_bar'        => esc_html_x( 'Ticket', 'Add New on Toolbar', 'dda' ),
            'add_new'               => esc_html__( 'Add New', 'dda' ),
            'add_new_item'          => esc_html__( 'Add New Ticket', 'dda' ),
            'new_item'              => esc_html__( 'New Ticket', 'dda' ),
            'edit_item'             => esc_html__( 'Edit Ticket', 'dda' ),
            'view_item'             => esc_html__( 'View Ticket', 'dda' ),
            'all_items'             => esc_html__( 'All Tickets', 'dda' ),
            'search_items'          => esc_html__( 'Search Tickets', 'dda' ),
            'parent_item_colon'     => esc_html__( 'Parent Tickets:', 'dda' ),
            'not_found'             => esc_html__( 'No tickets found.', 'dda' ),
            'not_found_in_trash'    => esc_html__( 'No tickets found in Trash.', 'dda' ), 
        );
     
        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true, 
            'menu_icon'          => 'dashicons-tickets-alt',
            'rewrite'            => array( 'slug' => 'ticket' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 20,
            'supports'           => array( 'title' ),
        );
     
        register_post_type( 'ticket', apply_filters('exdda_ticket_post_type_args', $args) );
        
        do_action('exdda_after_ticket_post_type'); 
    }
}
