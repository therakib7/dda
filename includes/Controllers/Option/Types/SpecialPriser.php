<?php

namespace Exdda\Controllers\Option\Types; 

class SpecialPriser {

    public function __construct() { 
        add_action('acf/init', [$this, 'create_option_field'], 1); 
    }  

    public static function create_option_field() {  
         
        if( function_exists('acf_add_local_field_group') ): 
            acf_add_local_field_group(array(
                'key' => 'group_58fc839d201dd',
                'title' => 'Special priser',
                'fields' => array(
                    array(
                        'key' => 'field_58fc83b17d78a',
                        'label' => 'Special priser for år',
                        'name' => 'special_awards',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'collapsed' => 'field_58fc83f37d78b',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'row',
                        'button_label' => 'Tilføj år',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_58fc83f37d78b',
                                'label' => 'År',
                                'name' => 'year',
                                'type' => 'taxonomy',
                                'instructions' => '',
                                'required' => 1,
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
                                'return_format' => 'object',
                                'multiple' => 0,
                            ),
                            array(
                                'key' => 'field_58fc84227d78c',
                                'label' => 'Priser',
                                'name' => 'priser',
                                'type' => 'repeater',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'collapsed' => 'field_58fc84467d78d',
                                'min' => 0,
                                'max' => 0,
                                'layout' => 'table',
                                'button_label' => 'Tilføj pris',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_58fc84467d78d',
                                        'label' => 'Titel på pris',
                                        'name' => 'award_title',
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
                                        'key' => 'field_58fc845b7d78e',
                                        'label' => 'Side med info om vinder',
                                        'name' => 'award_page',
                                        'type' => 'post_object',
                                        'instructions' => '',
                                        'required' => 1,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'post_type' => array(
                                            0 => 'page',
                                        ),
                                        'taxonomy' => array(
                                        ),
                                        'allow_null' => 0,
                                        'multiple' => 0,
                                        'return_format' => 'object',
                                        'ui' => 1,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'acf-options-special-priser',
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
                'modified' => 1497962861,
            ));
        endif;		
    }
}
