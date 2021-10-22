<?php

namespace Exdda\Controllers\Meta\Types; 

class Sponsor {

    public function __construct() { 
        add_action('acf/init', [$this, 'create_post_meta'], 1); 
    }  

    public static function create_post_meta() {  
         
        if ( function_exists('acf_add_local_field_group') ):  
            acf_add_local_field_group(array(
                'key' => 'group_5642f9c7b0a4f',
                'title' => 'Sponsors',
                'fields' => array(
                    array(
                        'key' => 'field_56431c00dc577',
                        'label' => 'Sponsor url',
                        'name' => 'sponsor_url',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => 50,
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'field_56431392931ed',
                        'label' => 'Sponsor logo',
                        'name' => 'sponsor_logo',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => 50,
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array(
                        'key' => 'field_568bcd5792b60',
                        'label' => 'Sponsor indhold',
                        'name' => 'sponsor_content',
                        'type' => 'flexible_content',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'button_label' => 'Add Row',
                        'min' => '',
                        'max' => '',
                        'layouts' => array(
                            array(
                                'key' => '568bcd7e35cfc',
                                'name' => 'sponsor_content_text',
                                'label' => 'Sponsor Tekst',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_568bcd9092b61',
                                        'label' => 'Sponsor Tekst',
                                        'name' => 'sponsor_text',
                                        'type' => 'wysiwyg',
                                        'instructions' => '',
                                        'required' => 0,
                                        'conditional_logic' => 0,
                                        'wrapper' => array(
                                            'width' => '',
                                            'class' => '',
                                            'id' => '',
                                        ),
                                        'default_value' => '',
                                        'tabs' => 'all',
                                        'toolbar' => 'full',
                                        'media_upload' => 1,
                                        'delay' => 0,
                                    ),
                                ),
                                'min' => '',
                                'max' => '',
                            ),
                        ),
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'sponsor',
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
                'modified' => 1452002763,
            ));
        endif;		
    }
}
