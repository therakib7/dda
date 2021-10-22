<?php

namespace Exdda\Controllers\Meta\Taxonomy; 

class ProjectCategory {

    public function __construct() { 
        add_action('acf/init', [$this, 'create_taxonomy_meta'], 1); 
    }  

    public static function create_taxonomy_meta() {  
         
        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_5a5c6fa08af96',
                'title' => 'Afstemnings kriterier',
                'fields' => array(
                    array(
                        'key' => 'field_5a5c6fa09e88d',
                        'label' => 'Kategorier for år',
                        'name' => 'year_criteria',
                        'type' => 'repeater',
                        'instructions' => 'Opsæt de kriterier som er gældende for det respektive år.',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'table',
                        'button_label' => 'Tilføj år',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_5a5c6fa0b340b',
                                'label' => 'År',
                                'name' => 'year',
                                'type' => 'taxonomy',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'taxonomy' => 'years',
                                'field_type' => 'select',
                                'allow_null' => 0,
                                'add_term' => 0,
                                'save_terms' => 0,
                                'load_terms' => 0,
                                'return_format' => 'id',
                                'multiple' => 0,
                            ),
                            array(
                                'key' => 'field_5a5c6fdf544ef',
                                'label' => 'Kriterier',
                                'name' => 'criteria',
                                'type' => 'repeater',
                                'instructions' => 'Afstemnings kriterier for år.',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'collapsed' => '',
                                'min' => 0,
                                'max' => 0,
                                'layout' => 'table',
                                'button_label' => 'Add Row',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_5a5c7000544f0',
                                        'label' => 'titel',
                                        'name' => 'title',
                                        'type' => 'text',
                                        'instructions' => '',
                                        'required' => 1,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'maxlength' => '',
                                        'readonly' => 0,
                                        'disabled' => 0,
                                    ),
                                    array(
                                        'key' => 'field_5a6080d6d8432',
                                        'label' => 'Vægtning',
                                        'name' => 'weight',
                                        'type' => 'number',
                                        'instructions' => '',
                                        'required' => 1,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'default_value' => 100,
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '%',
                                        'min' => 1,
                                        'max' => 100,
                                        'step' => 1,
                                        'readonly' => 0,
                                        'disabled' => 0,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'taxonomy',
                            'operator' => '==',
                            'value' => 'project categories',
                        ),
                    ),
                    array(
                        array(
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'acf-options-options',
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
                'modified' => 1516700041,
            ));
            
        endif;		
    }
}
