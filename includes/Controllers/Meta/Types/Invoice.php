<?php

namespace Exdda\Controllers\Meta\Types; 

class Invoice {

    public function __construct() { 
        add_action('acf/init', [$this, 'create_post_meta'], 1); 
    }  

    public static function create_post_meta() {  
         
        if ( function_exists('acf_add_local_field_group') ):  
            acf_add_local_field_group(array(
                'key' => 'group_56430c8806789',
                'title' => 'Invoice',
                'fields' => array(
                    array(
                        'key' => 'field_564432dfe1a2b',
                        'label' => 'Fakturerings Adresse',
                        'name' => 'address',
                        'type' => 'textarea',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => 50,
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => 5,
                        'new_lines' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array(
                        'key' => 'field_564433d8e1a2c',
                        'label' => 'Betalings status',
                        'name' => 'is_paid',
                        'type' => 'radio',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => 50,
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'no' => '<span style="font-weight:bold;color:#e74c3c;">Nej</span>',
                            'creditcard' => '<span style="font-weight:bold;color:#40d47e;">Kreditkort</span>',
                            'manual' => '<span style="font-weight:bold;color:#3498db;">Manuelt</span>',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'default_value' => 'no',
                        'layout' => 'vertical',
                        'allow_null' => 0,
                        'return_format' => 'value',
                    ),
                    array(
                        'key' => 'field_56430c916a2d6',
                        'label' => 'Varelinjer',
                        'name' => 'rows',
                        'type' => 'repeater',
                        'instructions' => '',
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
                        'button_label' => 'Tilføj varelinje',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_56430cc06a2d7',
                                'label' => 'Beskrivelse',
                                'name' => 'text',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 1,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => 50,
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
                                'key' => 'field_56430ce36a2d8',
                                'label' => 'Antal',
                                'name' => 'qty',
                                'type' => 'number',
                                'instructions' => '',
                                'required' => 1,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => 25,
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'min' => '',
                                'max' => '',
                                'step' => '',
                                'readonly' => 0,
                                'disabled' => 0,
                            ),
                            array(
                                'key' => 'field_56430cfd6a2d9',
                                'label' => 'Pris',
                                'name' => 'price',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 1,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => 25,
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
                        ),
                    ),
                    array(
                        'key' => 'field_564435f0cfa69',
                        'label' => 'Gateway Log',
                        'name' => 'gateway_log',
                        'type' => 'textarea',
                        'instructions' => 'Denne log er primært til administratoren, den kan fortælle hvis noget er gået galt og oftes hvorfor så man nemmere kan debugge et evt. problem.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => 'monotype',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => 15,
                        'new_lines' => 'wpautop',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'invoice',
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
                'modified' => 1447310909,
            ));
        endif;		
    }
}
