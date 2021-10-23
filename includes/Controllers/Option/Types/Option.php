<?php

namespace Exdda\Controllers\Option\Types; 

class Option {

    public function __construct() { 
        add_action('acf/init', [$this, 'create_option_field'], 1); 
    }  

    public static function create_option_field() {  
         
        if( function_exists('acf_add_local_field_group') ): 
            acf_add_local_field_group(array(
                'key' => 'group_5694dbb53cf21',
                'title' => 'Dates',
                'fields' => array(
                    array(
                        'key' => 'field_5694dbc7a8a6d',
                        'label' => 'Åben for indsendelser',
                        'name' => 'submissions.open',
                        'type' => 'date_picker',
                        'instructions' => 'Angiv dato for hvornår mulighed indsendelser åbner.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'display_format' => 'm/d/Y',
                        'return_format' => 'm/d/Y',
                        'first_day' => 1,
                    ),
                    array(
                        'key' => 'field_5694e350fca7c',
                        'label' => 'Luk for indsendelser',
                        'name' => 'submissions.close',
                        'type' => 'date_picker',
                        'instructions' => 'Hvornår skal muligheden for indsendelse lukke?
            Indsendelser bliver lukket på datoen kl. 00:00 (alså det er ikke til om med denne dato).',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'display_format' => 'm/d/Y',
                        'return_format' => 'm/d/Y',
                        'first_day' => 1,
                    ),
                    array(
                        'key' => 'field_5694e3a9fca7d',
                        'label' => 'Åben for Jury aftemninger',
                        'name' => 'jury.open',
                        'type' => 'date_picker',
                        'instructions' => 'Fra hvornår skal Jurymedlemmer have mulighed for at stemme på projekter?',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'display_format' => 'm/d/Y',
                        'return_format' => 'm/d/Y',
                        'first_day' => 1,
                    ),
                    array(
                        'key' => 'field_5694e3d7fca7e',
                        'label' => 'Luk for Jury aftemninger',
                        'name' => 'jury.close',
                        'type' => 'date_picker',
                        'instructions' => 'Hvornår skal Jurymedlemmer ikke længere have mulighed for at kunne stemme på projekter.
            Afstemningen bliver lukket på datoen kl. 00:00 (alså det er ikke til om med denne dato).',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'display_format' => 'm/d/Y',
                        'return_format' => 'm/d/Y',
                        'first_day' => 1,
                    ),
                    array(
                        'key' => 'field_5694e42ffca80',
                        'label' => 'Luk for adgang til Juryformandens liste over stemmer i han gruppe',
                        'name' => 'jurylist.close',
                        'type' => 'date_picker',
                        'instructions' => 'Hvornår skal Juryformanden ikke længere have mulighed for at kunne se hvilke af hans jury medlemmer der har stemt på de enkelte projekter.
            Denne liste bliver tilgængelig for Juryformanden på den samme dato som Jury afstemningen åbner.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'display_format' => 'm/d/Y',
                        'return_format' => 'm/d/Y',
                        'first_day' => 1,
                    ),
                ),
                'location' => array(
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
                'modified' => 1452600082,
            ));
            
            acf_add_local_field_group(array(
                'key' => 'group_56600cfad34ef',
                'title' => 'Header tekst',
                'fields' => array(
                    array(
                        'key' => 'field_56600cff5ef8d',
                        'label' => 'Header tekst',
                        'name' => 'option-header-text',
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
                ),
                'location' => array(
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
                'modified' => 1449135432,
            ));
            
            acf_add_local_field_group(array(
                'key' => 'group_5a68614f6e778',
                'title' => 'Indsendelser',
                'fields' => array(
                    array(
                        'key' => 'field_5a68617cbde14',
                        'label' => 'Pris for indsendelse',
                        'name' => 'submission_price',
                        'type' => 'number',
                        'instructions' => 'Indtast den pris som det koster at indsende et projekt pr. kategori.',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => 1650,
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => 'DKK',
                        'min' => 1,
                        'max' => '',
                        'step' => '',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                ),
                'location' => array(
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
                'modified' => 1493034754,
            ));
            
            acf_add_local_field_group(array(
                'key' => 'group_568bad2d050f3',
                'title' => 'Kategorier',
                'fields' => array(
                    array(
                        'key' => 'field_568bad3fdc011',
                        'label' => 'Nuværende år',
                        'name' => 'current_year',
                        'type' => 'taxonomy',
                        'instructions' => 'Vælg det nuværende år for app\'en.',
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
                        'add_term' => 1,
                        'save_terms' => 0,
                        'load_terms' => 0,
                        'return_format' => 'object',
                        'multiple' => 0,
                    ),
                    array(
                        'key' => 'field_568bad81dc012',
                        'label' => 'Kategorier for år',
                        'name' => 'year_categories',
                        'type' => 'repeater',
                        'instructions' => 'Opsæt det kategorier som er gældende for det respektive år.',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'collapsed' => 'field_568badb3dc013',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'table',
                        'button_label' => 'Tilføj år',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_568badb3dc013',
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
                                'key' => 'field_568badcadc014',
                                'label' => 'Kategorier',
                                'name' => 'categories',
                                'type' => 'taxonomy',
                                'instructions' => '',
                                'required' => 0,
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
                                'save_terms' => 0,
                                'load_terms' => 0,
                                'return_format' => 'object',
                                'multiple' => 0,
                            ),
                        ),
                    ),
                ),
                'location' => array(
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
                'modified' => 1451994930,
            ));
        endif;		
    }
}
