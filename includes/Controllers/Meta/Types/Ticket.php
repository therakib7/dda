<?php

namespace Exdda\Controllers\Meta\Types; 

class Ticket {

    public function __construct() { 
        add_action('acf/init', [$this, 'create_post_meta'], 1); 
    }  

    public static function create_post_meta() {  
         
        if ( function_exists('acf_add_local_field_group') ):  
            acf_add_local_field_group(array(
                'key' => 'group_5672903ab0e83',
                'title' => 'Ticket',
                'fields' => array(
                    array(
                        'key' => 'field_5672903dc6d9f',
                        'label' => 'Tickets',
                        'name' => 'ticket.types',
                        'type' => 'repeater',
                        'instructions' => 'Opret billet typer',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'collapsed' => 'field_56729071c6da0',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'row',
                        'button_label' => 'Add ticket',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_56729071c6da0',
                                'label' => 'Navn',
                                'name' => 'name',
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
                                'key' => 'field_5672907dc6da1',
                                'label' => 'Pris',
                                'name' => 'price',
                                'type' => 'number',
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
                                'append' => 'DKK',
                                'min' => 1,
                                'max' => '',
                                'step' => '',
                                'readonly' => 0,
                                'disabled' => 0,
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_5672a10912dcd',
                        'label' => 'E-mail',
                        'name' => 'ticket.email',
                        'type' => 'textarea',
                        'instructions' => 'Denne email bliver sendt til faktura emailen til den som har købe billetter.
            
            <h3>Template Tags:</h3>
            
            <strong>Faktura link:</strong> {{invoice_link}} <small><i>Indsætter et "gå til faktura" link (Skal IKKE indsættes som href på et anchor-tag)</i></small>',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => 'br',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array(
                        'key' => 'field_58fde6aa37580',
                        'label' => 'Deaktiver billet emails',
                        'name' => 'deactivate_ticket_emails',
                        'type' => 'checkbox',
                        'instructions' => 'Hvis dette felt er markeret, vil der ikke blive sendt en email til deltagere.',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'deactivated' => 'Deaktiver',
                        ),
                        'default_value' => array(
                            'activated' => 'activated',
                        ),
                        'layout' => 'horizontal',
                        'toggle' => 0,
                        'allow_custom' => 0,
                        'save_custom' => 0,
                        'return_format' => 'value',
                    ),
                    array(
                        'key' => 'field_58c5c6f9b59bb',
                        'label' => 'E-mail til deltager',
                        'name' => 'ticket_attende_email',
                        'type' => 'textarea',
                        'instructions' => 'Denne email bliver sendt til faktura emailen til den som har købe billetter.
            
            <h3>Template Tags:</h3>
            
            <strong>Billet link:</strong> {{ticket_link}} <small><i>Indsætter et "download din billet" link (Skal IKKE indsættes som href på et anchor-tag)</i></small>',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => 'br',
                        'readonly' => 0,
                        'disabled' => 0,
                    ),
                    array(
                        'key' => 'field_56c17a210ec16',
                        'label' => 'Overskrift',
                        'name' => 'ticktes.thankyou.header',
                        'type' => 'text',
                        'instructions' => '"Tak for din bestilling" overskrift.',
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
                        'key' => 'field_56c17a510ec17',
                        'label' => 'Tekst',
                        'name' => 'ticktes.thankyou.content',
                        'type' => 'wysiwyg',
                        'instructions' => '"Tak for din bestilling" tekst.',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 0,
                        'delay' => 0,
                    ),
                    array(
                        'key' => 'field_58c5bce01f847',
                        'label' => 'Baggrunds billede',
                        'name' => 'ticket_bg_image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                        'preview_size' => 'medium_large',
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
        endif;		
    }
}
