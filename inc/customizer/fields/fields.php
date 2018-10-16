<?php 
/**
 * @Packge     : Fashe
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/


// Go to top Button option field
Epsilon_Customizer::add_field(
    'fashe-gototop-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Go To Top Button', 'fashe' ),
        'description' => esc_html__( 'Toggle the display of the go to top button.', 'fashe' ),
        'section'     => 'fashe_general_options_section',
        'default'     => true,
    )
);
// Cart button option field
Epsilon_Customizer::add_field(
    'fashe-cart-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Header Cart Button', 'fashe' ),
        'description' => esc_html__( 'Toggle the display of the header cart button.', 'fashe' ),
        'section'     => 'fashe_general_options_section',
        'default'     => true,
    )
);
// Global header layout field
Epsilon_Customizer::add_field(
    'fashe-header-layout',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Global Header Layout', 'fashe' ),
        'section'  => 'fashe_general_options_section',
        'description' => esc_html__( 'Select global header layout.', 'fashe' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/assets/img/thumb1.png',
            '2' => get_template_directory_uri() . '/assets/img/thumb2.png',
            '3' => get_template_directory_uri() . '/assets/img/thumb3.png',
        ),
        'default'  => array(
            'columnsCount' => 1,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);
// Header login url field
Epsilon_Customizer::add_field(
    'fashe_login_url',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Login Url', 'fashe' ),
        'description'       => esc_html__( 'Set login url.', 'fashe' ),
        'section'           => 'fashe_general_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
        
    )
);

// Instagram Access Token field
Epsilon_Customizer::add_field(
    'fashe_igaccess_token',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Instagram Access Token', 'fashe' ),
        'description'       => esc_html__( 'Set instagram access token.', 'fashe' ),
        'section'           => 'fashe_general_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
        
    )
);

// Google map api key field
$url = 'https://developers.google.com/maps/documentation/geocoding/get-api-key';

Epsilon_Customizer::add_field(
    'fashe_map_apikey',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Google map api key', 'fashe' ),
        'description'       => sprintf( __( 'Set google map api key. To get api key %s click here %s.', 'fashe' ), '<a target="_blank" href="'.esc_url( $url  ).'">', '</a>' ),
        'section'           => 'fashe_general_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
        
    )
);
// Theme Main Color Picker
Epsilon_Customizer::add_field(
    'fashe_themecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Main Color.', 'fashe' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fashe_general_options_section',
        'default'     => '#e65540',
    )
);
/***********************************
 * Header Top Section
 ***********************************/

// Social Media option field
Epsilon_Customizer::add_field(
    'fashe-headersocial-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Header Social Show/Hide', 'fashe' ),
        'description' => esc_html__( 'Toggle the header top social active.', 'fashe' ),
        'section'     => 'fashe_headertop_options_section',
        'default'     => true,
    )
);

// Header Top Text
Epsilon_Customizer::add_field(
    'fashe_header_top_text',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Header Top Text', 'fashe' ),
        'description' => esc_html__( 'Set header top text ( For header style 1 )', 'fashe' ),
        'section'     => 'fashe_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => 'Free shipping for standard order over $100'
    )
);
// Header Promo text
Epsilon_Customizer::add_field(
    'fashe_header_promo_text',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Header Promo Text', 'fashe' ),
        'description' => esc_html__( 'Set header promo text ( For header style 2 and 3 )', 'fashe' ),
        'section'     => 'fashe_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '20% off everything!'
    )
);
// Header Promo link text
Epsilon_Customizer::add_field(
    'fashe_header_promoanchor_text',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Header Promo Link Text', 'fashe' ),
        'description' => esc_html__( 'Set header promo link text ( For header style 2 and 3 )', 'fashe' ),
        'section'     => 'fashe_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => 'Shop Now'
    )
);
// Header Promo link url
Epsilon_Customizer::add_field(
    'fashe_header_promoanchor_url',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Header Promo Link Url', 'fashe' ),
        'description' => esc_html__( 'Set header promo link url ( For header style 2 and 3 )', 'fashe' ),
        'section'     => 'fashe_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '#'
    )
);

// Header Top Email
Epsilon_Customizer::add_field(
    'fashe_header_top_email',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Header Top Email', 'fashe' ),
        'section'     => 'fashe_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => 'fashe@example.com'
    )
);

// Language Translate
Epsilon_Customizer::add_field(
    'fashe-headerTranslate-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Language Translate Option Show/Hide', 'fashe' ),
        'description' => esc_html__( 'Toggle the header language translate show.', 'fashe' ),
        'section'     => 'fashe_headertop_options_section',
        'default'     => true,
    )
);

// Header Top Background Color Picker
Epsilon_Customizer::add_field(
    'fashe_header_top_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Top Background Color', 'fashe' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fashe_headertop_options_section',
        'default'     => '#f5f5f5',
    )
);
// Header Top Text Color Picker
Epsilon_Customizer::add_field(
    'fashe_header_top_textColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Top Text Color', 'fashe' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fashe_headertop_options_section',
        'default'     => '#888888',
    )
);
// Page Header Background Color Picker
Epsilon_Customizer::add_field(
    'fashe_headerbgcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'fashe' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#999',
    )
);


/***********************************
 * Blog Section Fields
 ***********************************/


// Post excerpt length field
Epsilon_Customizer::add_field(
    'fashe_post_excerpt',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Post Excerpt', 'fashe' ),
        'description' => esc_html__( 'Set post excerpt length.', 'fashe' ),
        'section'     => 'fashe_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);
// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'fashe-sidebarlayouts-settings',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'fashe' ),
        'section'  => 'fashe_blog_options_section',
        'description' => esc_html__( 'Select the option to set blog page layout.', 'fashe' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 1,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);

/**************************
    WooCommerce Section
***************************/

// WooCommerce shop title show/hide option field
Epsilon_Customizer::add_field(
    'fashe-woo-shoppage-title-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Shop Title Show/Hide', 'fashe' ),
        'description' => esc_html__( 'Toggle the shop page title show or hide.', 'fashe' ),
        'section'     => 'fashe_woocommerce_options_section',
        'default'     => true,
    )
);

// Product per page number field
Epsilon_Customizer::add_field(
    'fashe_woo_product_perpage',
    array(
        'type'        => 'epsilon-slider',
        'label'       => esc_html__( 'Shop product per page', 'fashe' ),
        'description' => esc_html__( 'Set shop product per page ( Default 10 ).', 'fashe' ),
        'section'     => 'fashe_woocommerce_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'choices'     => array(
            'min'  => 1,
            'max'  => 30,
            'step' => 1,
        ),
        'default'     => '10'
    )
);

// Related Product number field
Epsilon_Customizer::add_field(
    'fashe_related_product_number',
    array(
        'type'        => 'epsilon-slider',
        'label'       => esc_html__( 'Related product per section', 'fashe' ),
        'description' => esc_html__( 'Set single page related product per section ( Default 4 ).', 'fashe' ),
        'section'     => 'fashe_woocommerce_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'choices'     => array(
            'min'  => 1,
            'max'  => 10,
            'step' => 1,
        ),
        'default'     => '4'
    )
);

/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'fashe_fof_text_one',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'fashe' ),
        'section'           => 'fashe_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Ooops 404 Error !'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'fashe_fof_text_two',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'fashe' ),
        'section'           => 'fashe_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Either something went wrong or the page dosen\'t exist anymore.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'fashe_fof_textonecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'fashe' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fashe_fof_options_section',
        'default'     => '#333333', 
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'fashe_fof_texttwocolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'fashe' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fashe_fof_options_section',
        'default'     => '#e65540',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'fashe_fof_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'fashe' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fashe_fof_options_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'fashe-widget-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer Widget On/Off', 'fashe' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'fashe' ),
        'section'     => 'fashe_footer_options_section',
        'default'     => true,
    )
);
//Footer payment method option add settings
Epsilon_Customizer::add_field(
    'fashe-footer-payment-settings',
    array(
        'type'         => 'epsilon-repeater',
        'section'      => 'fashe_footer_options_section',
        'label'        => esc_html__( 'Footer Payment Method', 'fashe' ),
        'button_label' => esc_html__( 'Add new method', 'fashe' ),
        'row_label'    => array(
            'type'  => 'field',
            'field' => 'info_title',
            ),
        'fields'       => array(
            'paymenturl'       => array(
                'label'             => esc_html__( 'Url', 'fashe' ),
                'type'              => 'text',
                'default'           => esc_html__( '#', 'fashe' ),
            ),
            'paymentimg'        => array(
                'label'             => esc_html__( 'Payment Method Image', 'fashe' ),
                'type'              => 'epsilon-image',
                'default'           => '',
            ),
        ),
    )
);


// Footer copy right text add settings
Epsilon_Customizer::add_field(
    'fashe-copyright-text-settings',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'fashe' ),
        'section'     => 'fashe_footer_options_section',
        'default'     => '',
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'fashe_footer_bgColor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'fashe' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fashe_footer_options_section',
        'default'     => '#f0f0f0',
    )
);
// Footer widget text color field
Epsilon_Customizer::add_field(
    'fashe_footer_color_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'fashe' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fashe_footer_options_section',
        'default'     => '#888888',
    )
);
// Footer widget title color field
Epsilon_Customizer::add_field(
    'fashe_footer_widgettitlecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Title Color', 'fashe' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fashe_footer_options_section',
        'default'     => '#222',
    )
);
// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'fashe_footer_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'fashe' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fashe_footer_options_section',
        'default'     => '#888888',
    )
);
// Footer widget anchor hover Color 
Epsilon_Customizer::add_field(
    'fashe_footer_anchorhovcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'fashe' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'fashe_footer_options_section',
        'default'     => '#888888',
    )
);


?>