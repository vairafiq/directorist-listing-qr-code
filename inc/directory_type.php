<?php
/*
 * Class: Business Directory Multiple Image = ATPP
 * */
if (!class_exists('Directorist_QR_Code_Post_Type_Manager')) :
    class Directorist_QR_Code_Post_Type_Manager
    {
        public function __construct()
        {

            add_filter( 'atbdp_form_preset_widgets', array($this, 'atbdp_form_builder_widgets'));
            add_filter( 'atbdp_single_listing_content_widgets', array($this, 'atbdp_single_listing_content_widgets'));

            add_filter( 'directorist_field_template', array( $this, 'directorist_field_template' ), 10, 2 );
            add_filter( 'directorist_single_item_template', array( $this, 'directorist_single_item_template' ), 10, 2 );

        }

        public function directorist_single_item_template( $template, $field_data ) {

            $listing_author_id = get_post_field('post_author', get_the_ID());
            $author_only = ! empty( $field_data['author_only'] ) ? $field_data['author_only'] : false;
            
            if( 'directorist_qr' === $field_data['widget_name'] ) {
                if( ! $author_only ) {
                    $template .= Directorist_QR_Code()->load_template('view-qr', [ 'field_data' => $field_data ]);
                }elseif( get_current_user_id() == $listing_author_id ){
                    $template .= Directorist_QR_Code()->load_template('view-qr', [ 'field_data' => $field_data ]);
                }
            }

            return $template;
        }

        public function directorist_field_template( $template, $field_data ) {

            // e_var_dump($field_data);
            if( 'directorist_qr' === $field_data['widget_name'] ) {
                $template .= Directorist_QR_Code()->load_template('directorist_qr', [ 'data' => $field_data, 'listing_form' => $field_data['form'] ]);
            }

            return $template;
        }

        public function atbdp_single_listing_content_widgets($widgets)
        {
            $widgets['directorist_qr'] = [
                'options' => [
                    'icon' => [
                        'type'  => 'icon',
                        'label' => 'Icon',
                        'value' => 'la la-qrcode',
                    ],
                    'qr_width' => [
                        'type'  => 'text',
                        'label' => 'QR Width',
                        'value' => '300',
                    ],
                    'qr_height' => [
                        'type'  => 'text',
                        'label' => 'QR Height',
                        'value' => '300',
                    ],
                    'author_only' => [
                        'type'  => 'toggle',
                        'label' => 'Show Only for Listing Owner',
                        'value' => false,
                    ],
                ]
            ];
            return $widgets;
        }
        public function atbdp_form_builder_widgets($widgets)
        {
            $widgets['directorist_qr'] = [
                'label' => 'QR Code',
                'icon' => 'la la-qrcode',
                'show' => true,
                'options' => [
                    'type' => [
                        'type'  => 'hidden',
                        'value' => 'text',
                    ],
                    'field_key' => [
                        'type'   => 'meta-key',
                        'hidden' => true,
                        'value'  => 'directorist_qr',
                    ],
                    'label' => [
                        'type'  => 'text',
                        'label' => 'Label',
                        'value' => 'QR Code',
                    ],
                    'required' => [
                        'type'  => 'toggle',
                        'label'  => 'Required',
                        'value' => false,
                    ],
                    'only_for_admin' => [
                        'type'  => 'toggle',
                        'label'  => 'Only For Admin Use',
                        'value' => false,
                    ],
                ],
            ];
            return $widgets;
        }
      

    }
endif;