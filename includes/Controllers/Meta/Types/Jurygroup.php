<?php

namespace Exdda\Controllers\Meta\Types; 

class Jurygroup {

    public function __construct() { 
        add_action('acf/init', [$this, 'create_post_meta'], 1); 
    }  

    public static function create_post_meta() {  
         
        if ( function_exists('acf_add_local_field_group') ):  
            acf_add_local_field_group(array(
                'key' => 'group_5641aa7c07411',
                'title' => 'Jury Groups',
                'fields' => array(
                    array(
                        'key' => 'field_5641aa81018a2',
                        'label' => 'Jury Formænd',
                        'name' => 'jury_presidents',
                        'type' => 'user',
                        'instructions' => 'Vælg den/de brugere som er formænd for denne Jury Gruppe.',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'role' => array(
                            0 => 'jury',
                        ),
                        'allow_null' => 0,
                        'multiple' => 1,
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_5641ab957ba0a',
                        'label' => 'Jury Medlemmer',
                        'name' => 'jury_members',
                        'type' => 'user',
                        'instructions' => 'Vælg de brugere som er tilknyttet denne Jury Gruppe.',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'role' => array(
                            0 => 'jury',
                            1 => 'administrator',
                        ),
                        'allow_null' => 0,
                        'multiple' => 1,
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_5641ac43c54e7',
                        'label' => 'Tilknyttet kategorier',
                        'name' => 'jury_categories',
                        'type' => 'taxonomy',
                        'instructions' => 'Vælg de kategorier som denne Jury Gruppe har ansvar for.',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'taxonomy' => 'project categories',
                        'field_type' => 'checkbox',
                        'allow_null' => 0,
                        'add_term' => 1,
                        'save_terms' => 1,
                        'load_terms' => 1,
                        'return_format' => 'object',
                        'multiple' => 0,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'jurygroup',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'modified' => 1515845384,
            ));
            
        endif;		
    }
}
