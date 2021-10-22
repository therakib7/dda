<?php

namespace Exdda\Controllers\SettingMenu\Menus; 

class Exporter {

    public function __construct() {   
        add_action('admin_menu', [$this, 'create_admin_menu'], 5 ); 
    }   

    public function create_admin_menu() {
        add_submenu_page(
            'edit.php?post_type=jurygroup', 
            esc_html__( 'Export Votes', 'dda' ),
            esc_html__( 'Export Votes', 'dda' ), 
            'manage_options', 
            'dda-export-votes', 
            [$this, 'export_votes']
        );

        add_submenu_page(
            'edit.php?post_type=project', 
            esc_html__( 'Export Projects', 'dda' ),
            esc_html__( 'Export Projects', 'dda' ), 
            'manage_options', 
            'dda-export-projects', 
            [$this, 'export_projects']
        );

        add_submenu_page(
            'edit.php?post_type=ticket', 
            esc_html__( 'Export Tickets', 'dda' ),
            esc_html__( 'Export Tickets', 'dda' ), 
            'manage_options', 
            'dda-export-tickets', 
            [$this, 'export_tickets']
        );
    }

    public function export_votes() {
        printf(
            '<h1>%s</h1>', 
            esc_html__( 'Export Votes', 'dda' ) 
        );
        printf(
            '<p>%s</p>', 
            esc_html__( 'Download Excel (xlsx) fil med opgørelse over stemmer for hver projekt opdelt efter kategori.', 'dda' ) 
        ); 
        printf(
            '<p><a class="button btn primary btn-primary button-primary" href="#">%s</a></p>', 
            esc_html__( 'Download', 'dda' ) 
        );  
    }

    public function export_projects() {
        printf(
            '<h1>%s</h1>', 
            esc_html__( 'Export Projects', 'dda' ) 
        );
        printf(
            '<p>%s</p>', 
            esc_html__( 'Download Excel (xlsx) fil med opgørelse over stemmer for hver projekt opdelt efter kategori.', 'dda' ) 
        ); 
        printf(
            '<p><a class="button btn primary btn-primary button-primary" href="#">%s</a></p>', 
            esc_html__( 'Download', 'dda' ) 
        );  
    }

    public function export_tickets() {
        printf(
            '<h1>%s</h1>', 
            esc_html__( 'Export Tickets', 'dda' ) 
        );
        printf(
            '<p>%s</p>', 
            esc_html__( 'Download Excel (xlsx) fil med opgørelse over stemmer for hver projekt opdelt efter kategori.', 'dda' ) 
        ); 
        printf(
            '<p><a class="button btn primary btn-primary button-primary" href="#">%s</a></p>', 
            esc_html__( 'Download', 'dda' ) 
        );  
    }
} 