<?php

namespace Exdda\Controllers\Meta\User; 

class User {

    public function __construct() { 
        add_action('acf/init', [$this, 'create_user_meta'], 1); 
    }  

    public static function create_user_meta() {  
         
        if( function_exists('acf_add_local_field_group') ): 
            acf_add_local_field_group(array(
                'key' => 'group_5645ac6adb15d',
                'title' => 'Bruger Indhold',
                'fields' => array(
                    array(
                        'key' => 'field_565ee132fed88',
                        'label' => 'Titel',
                        'name' => 'user_title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
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
                        'key' => 'field_565ee144fed89',
                        'label' => 'Company',
                        'name' => 'user_company',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
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
                        'key' => 'field_58ac8c3555c36',
                        'label' => 'Giv admin ret i frontenden',
                        'name' => 'has_admin_access',
                        'type' => 'checkbox',
                        'instructions' => 'Dette gør at brugeren via sit login kan se statestikker for alle jury grupper og indsendte projekter. (Det giver ikke adgang til backenden)',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'has_admin_access' => 'Ja',
                        ),
                        'other_choice' => 0,
                        'save_other_choice' => 0,
                        'layout' => 'vertical',
                        'toggle' => 0,
                        'default_value' => array(
                        ),
                        'allow_custom' => 0,
                        'save_custom' => 0,
                        'return_format' => 'value',
                    ),
                    array(
                        'key' => 'field_5645ac6ae2016',
                        'label' => 'Indhold',
                        'name' => 'content-user',
                        'type' => 'flexible_content',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'button_label' => 'Tilføj indhold',
                        'min' => '',
                        'max' => '',
                        'layouts' => array(
                            array(
                                'key' => '564212c6dfc7e',
                                'name' => 'layout-user-text',
                                'label' => 'Tekst',
                                'display' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_5645acecaa365',
                                        'label' => 'Tekst',
                                        'name' => 'content-user-wysiwyg',
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
                            'param' => 'user_role',
                            'operator' => '==',
                            'value' => 'all',
                        ),
                    ),
                ),
                'menu_order' => 1,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => array(
                    0 => 'the_content',
                ),
                'active' => true,
                'description' => '',
                'modified' => 1449058640,
            ));

            //user meta role for jury and subscriber
            acf_add_local_field_group(array(
                'key' => 'group_5645b011018e9',
                'title' => 'Profilbillede',
                'fields' => array(
                    array(
                        'key' => 'field_5645b01a81b0d',
                        'label' => 'Profilbillede',
                        'name' => 'user-image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'user_role',
                            'operator' => '==',
                            'value' => 'jury',
                        ),
                    ),
                    array(
                        array(
                            'param' => 'user_role',
                            'operator' => '==',
                            'value' => 'subscriber',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'acf_after_title',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
                'modified' => 1487700894,
            ));
        endif;		
    }
}
