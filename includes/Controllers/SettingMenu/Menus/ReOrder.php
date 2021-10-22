<?php

namespace Exdda\Controllers\SettingMenu\Menus; 

class ReOrder {

    public function __construct() {   
        add_action('admin_menu', [$this, 'create_admin_menu'], 5 ); 
    }   

    public function create_admin_menu() {
        add_submenu_page(
            'edit.php?post_type=jurygroup', 
            esc_html__( 'Re-Order', 'dda' ),
            esc_html__( 'Re-Order', 'dda' ), 
            'manage_options', 
            'reorder-jurygroup', 
            [$this, 'jury_page_content']
        );

        add_submenu_page(
            'edit.php?post_type=project', 
            esc_html__( 'Re-Order', 'dda' ),
            esc_html__( 'Re-Order', 'dda' ), 
            'manage_options', 
            'reorder-project', 
            [$this, 'project_page_content']
        );

        add_submenu_page(
            'edit.php?post_type=sponsor', 
            esc_html__( 'Re-Order', 'dda' ),
            esc_html__( 'Re-Order', 'dda' ), 
            'manage_options', 
            'reorder-sponsor', 
            [$this, 'sponsor_page_content']
        );
        add_submenu_page(
            'edit.php?post_type=advisorymember', 
            esc_html__( 'Re-Order', 'dda' ),
            esc_html__( 'Re-Order', 'dda' ), 
            'manage_options', 
            'reorder-advisorymember', 
            [$this, 'advisorymember_page_content']
        );
    }

    public function jury_page_content() { 
        printf(
            '<h1>%s</h1>', 
            esc_html__( 'Jury group - Re-Order', 'dda' ) 
        );
        printf(
            '<p>%s</p>', 
            esc_html__( 'By drag and drop you can re-order jury groups from here.', 'dda' ) 
        ); 
        ?>
        <div id="order-post-type">
            <ul id="sortable" class="ui-sortable">
                <li id="item_16355" class="ui-sortable-handle"><span>Gruppe 6</span></li>
                <li id="item_16353" class="ui-sortable-handle"><span>Gruppe 12</span></li>
                <li id="item_16341" class="ui-sortable-handle"><span>Gruppe 14</span></li>
                <li id="item_16280" class="ui-sortable-handle"><span>Gruppe 9</span></li> 
            </ul> 
        </div>
        <?php 
    }

    public function project_page_content() { 
        printf(
            '<h1>%s</h1>', 
            esc_html__( 'Project - Re-Order', 'dda' ) 
        );
        printf(
            '<p>%s</p>', 
            esc_html__( 'By drag and drop you can re-order projects from here.', 'dda' ) 
        ); 
        ?>
        <div id="order-post-type">
            <ul id="sortable" class="ui-sortable">
                <li id="item_16355" class="ui-sortable-handle"><span>Gruppe 6</span></li>
                <li id="item_16353" class="ui-sortable-handle"><span>Gruppe 12</span></li>
                <li id="item_16341" class="ui-sortable-handle"><span>Gruppe 14</span></li>
                <li id="item_16280" class="ui-sortable-handle"><span>Gruppe 9</span></li> 
            </ul> 
        </div>
        <?php 
    }

    public function sponsor_page_content() { 
        printf(
            '<h1>%s</h1>', 
            esc_html__( 'Sponsor - Re-Order', 'dda' ) 
        );
        printf(
            '<p>%s</p>', 
            esc_html__( 'By drag and drop you can re-order sponsors from here.', 'dda' ) 
        ); 
        ?>
        <div id="order-post-type">
            <ul id="sortable" class="ui-sortable">
                <li id="item_16355" class="ui-sortable-handle"><span>Gruppe 6</span></li>
                <li id="item_16353" class="ui-sortable-handle"><span>Gruppe 12</span></li>
                <li id="item_16341" class="ui-sortable-handle"><span>Gruppe 14</span></li>
                <li id="item_16280" class="ui-sortable-handle"><span>Gruppe 9</span></li> 
            </ul> 
        </div>
        <?php 
    }

    public function advisorymember_page_content() { 
        printf(
            '<h1>%s</h1>', 
            esc_html__( 'Advisory Member - Re-Order', 'dda' ) 
        );
        printf(
            '<p>%s</p>', 
            esc_html__( 'By drag and drop you can re-order advisory members from here.', 'dda' ) 
        ); 
        ?>
        <div id="order-post-type">
            <ul id="sortable" class="ui-sortable">
                <li id="item_16355" class="ui-sortable-handle"><span>Gruppe 6</span></li>
                <li id="item_16353" class="ui-sortable-handle"><span>Gruppe 12</span></li>
                <li id="item_16341" class="ui-sortable-handle"><span>Gruppe 14</span></li>
                <li id="item_16280" class="ui-sortable-handle"><span>Gruppe 9</span></li> 
            </ul> 
        </div>
        <?php 
    }
} 