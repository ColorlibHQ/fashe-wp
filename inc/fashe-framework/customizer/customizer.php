<?php 
// Block direct access
if( !defined( 'ABSPATH' ) ){
	exit( 'Direct script access denied.' );
}
/**
 * @Packge 	   : Fashe
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
	
	function themeslug_customize_register( $wp_customize ) {
	
		// Add Theme option panel
		$wp_customize->add_panel( 'fashe_options_panel',
		  array(
			  'priority'       => 24,
			  'capability'     => 'edit_theme_options',
			  'theme_supports' => '',
			  'title'          => esc_html__( 'Theme options', 'fashe' )
		  )
		);
	   
	   
		/**************************
			General Section
		***************************/
		
		$wp_customize->add_section( 'fashe_general_options_section', 
			array(
				'title'       => esc_html__( 'General', 'fashe' ), 
				'priority'    => 35,
				'capability'  => 'edit_theme_options', 
				'panel'    	  => 'fashe_options_panel',
				'description' => esc_html__('Allows you to customize settings for Fashe theme.', 'fashe'), 
			) 
		);
         		
		// Preloader option add settings
		$wp_customize->add_setting( 'fashe-preloader-toggle-settings',
			array(
				'default'    => '', 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback'	=> 'fashe_sanitize_checkbox' 
			) 
		); 
		// Preloader option add control
		$wp_customize->add_control(
			new Epsilon_Control_Toggle(
				$wp_customize,
				'fashe_enable_preloader',
				array(
					'type'        => 'epsilon-toggle',
					'label'       => esc_html__( 'Preloader On/Off', 'fashe' ),
					'settings'   => 'fashe-preloader-toggle-settings',
					'description' => esc_html__( 'Toggle the preloader active.', 'fashe' ),
					'section'     => 'fashe_general_options_section',
				)
			)
		);
         		
		// Go to top Button option add settings
		$wp_customize->add_setting( 'fashe-gototop-toggle-settings',
			array(
				'default'    => '', 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh', 
				'sanitize_callback'	=> 'fashe_sanitize_checkbox'
			) 
		); 
		// Go to top Button option add control
		$wp_customize->add_control(
			new Epsilon_Control_Toggle(
				$wp_customize,
				'fashe_enable_gototop',
				array(
					'type'        => 'epsilon-toggle',
					'label'       => esc_html__( 'Go To Top Button', 'fashe' ),
					'settings'   => 'fashe-gototop-toggle-settings',
					'description' => esc_html__( 'Toggle the display of the go to top button.', 'fashe' ),
					'section'     => 'fashe_general_options_section',
				)
			)
		);
         		
		// Cat button option add settings
		$wp_customize->add_setting( 'fashe-cart-toggle-settings',
			array(
				'default'    => '', 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback'	=> 'fashe_sanitize_checkbox' 
			) 
		); 
		// Cat button Button option add control
		$wp_customize->add_control(
			new Epsilon_Control_Toggle(
				$wp_customize,
				'fashe_enable_cart',
				array(
					'type'        => 'epsilon-toggle',
					'label'       => esc_html__( 'Header Cart Button', 'fashe' ),
					'settings'   => 'fashe-cart-toggle-settings',
					'description' => esc_html__( 'Toggle the display of the header cart button.', 'fashe' ),
					'section'     => 'fashe_general_options_section',
				)
			)
		);
         		
		// Header login url settings
		$wp_customize->add_setting('fashe_login_url', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback'	=> 'fashe_sanitize_url'
	 
		));
		// Header login url control
		$wp_customize->add_control('fashe_loginurl', array(
			'label'      => __('Login Url', 'fashe'),
			'section'    => 'fashe_general_options_section',
			'settings'   => 'fashe_login_url',
			'description' => esc_html__( 'Toggle the display of the go to top button.', 'fashe' ),
		));	

		
		//  = Header Top Background Color Picker
		
		$wp_customize->add_setting('fashe_themecolor', array(
			'default'           => '#e65540',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'fashe_sanitize_hex_color'
	 
		));
	 
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'fashe_themecolor_ctrl', 
			array(
			'label'    => __('Theme Color', 'fashe'),
			'section'  => 'fashe_general_options_section',
			'settings' => 'fashe_themecolor',
		)));		   
	   	// Instagram Access Token settings
		$wp_customize->add_setting('fashe_igaccess_token', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'fashe_sanitize_nohtml'
	 
		));
		// Instagram Access Token control
		$wp_customize->add_control('fashe_igaccess_token', array(
			'label'      => __('Instagram Access Token', 'fashe'),
			'section'    => 'fashe_general_options_section',
			'settings'   => 'fashe_igaccess_token',
			'description' => esc_html__( 'Set instagram access token.', 'fashe' ),
		));	
		// Map Api option add settings
		$wp_customize->add_setting('fashe_map_apikey', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'transport'  	 => 'refresh',
			'sanitize_callback' => 'fashe_sanitize_nohtml'
	 
		));
		
		// Map Api control
		$wp_customize->add_control('fashe_map_apikey_ctrl', array(
			'label'      => esc_html__( 'Google Api Key', 'fashe' ),
			'section'    => 'fashe_general_options_section',
			'settings'   => 'fashe_map_apikey',
		));	
		/**************************
			Header Top Section
		***************************/
		
		$wp_customize->add_section( 'fashe_headertop_options_section', 
			array(
				'title'       => esc_html__( 'Header Top', 'fashe' ), 
				'priority'    => 35,
				'capability'  => 'edit_theme_options', 
				'panel'    	  => 'fashe_options_panel',
				'description' => esc_html__('Allows you to customize settings for Fashe theme.', 'fashe'), 
			) 
		);
        
		//  =======================================
		//  = Social Media Show/Hide Toggle =
		//  =======================================
		
		// Social Media option add settings
		$wp_customize->add_setting( 'fashe-headersocial-toggle-settings',
			array(
				'default'    => '', 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback' => 'fashe_sanitize_checkbox'
			) 
		); 
		// Social option add control
		$wp_customize->add_control(
			new Epsilon_Control_Toggle(
				$wp_customize,
				'fashe_enable_headersocial',
				array(
					'type'        => 'epsilon-toggle',
					'label'       => esc_html__( 'Header Social Show/Hide', 'fashe' ),
					'settings'   => 'fashe-headersocial-toggle-settings',
					'description' => esc_html__( 'Toggle the header top social active.', 'fashe' ),
					'section'     => 'fashe_headertop_options_section',
				)
			)
		);
        
				
		//  =============================
		//  = Header Top Text =
		//  =============================
		$wp_customize->add_setting('fashe_header_top_text', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'fashe_sanitize_html'
	 
		));
	 
		$wp_customize->add_control('fashe_headertoptext', array(
			'label'      => __('Header Top Text ( For header style 1 )', 'fashe'),
			'section'    => 'fashe_headertop_options_section',
			'settings'   => 'fashe_header_top_text',
		));	
				
		//  =============================
		//  = Header Promo text =
		//  =============================
		$wp_customize->add_setting('fashe_header_promo_text', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'fashe_sanitize_html'
	 
		));
	 
		$wp_customize->add_control('fashe_headerpromotext', array(
			'label'      => __('Header Promo Text ( For header style 2 and 3 )', 'fashe'),
			'section'    => 'fashe_headertop_options_section',
			'settings'   => 'fashe_header_promo_text',
		));	
				
		//  =============================
		//  = Header Promo link text =
		//  =============================
		$wp_customize->add_setting('fashe_header_promoanchor_text', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'fashe_sanitize_nohtml'
	 
		));
	 
		$wp_customize->add_control('fashe_headerpromoanchortext', array(
			'label'      => __('Header Promo Link Text ( For header style 2 and 3 )', 'fashe'),
			'section'    => 'fashe_headertop_options_section',
			'settings'   => 'fashe_header_promoanchor_text',
		));	
				
		//  =============================
		//  = Header Promo link url =
		//  =============================
		$wp_customize->add_setting('fashe_header_promoanchor_url', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'fashe_sanitize_url'
	 
		));
	 
		$wp_customize->add_control('fashe_headerpromoanchorurl', array(
			'label'      => __('Header Promo Link Url ( For header style 2 and 3 )', 'fashe'),
			'section'    => 'fashe_headertop_options_section',
			'settings'   => 'fashe_header_promoanchor_url',
		));	

		//  =============================
		//  = Header Top Email =
		//  =============================
		$wp_customize->add_setting('fashe_header_top_email', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'fashe_sanitize_email'
	 
		));
	 
		$wp_customize->add_control('fashe_headertopemail', array(
			'label'      => __('Header Top Email', 'fashe'),
			'section'    => 'fashe_headertop_options_section',
			'settings'   => 'fashe_header_top_email',
		));		
		
		
		//  =======================================
		//  = Language Translate =
		//  =======================================
		
		$wp_customize->add_setting( 'fashe-headerTranslate-toggle-settings',
			array(
				'default'    => false, 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback' => 'fashe_sanitize_checkbox'
			) 
		); 
		
		$wp_customize->add_control(
			new Epsilon_Control_Toggle(
				$wp_customize,
				'fashe_enable_headerTranslate',
				array(
					'type'        => 'epsilon-toggle',
					'label'       => esc_html__( 'Language Translate Option Show/Hide', 'fashe' ),
					'settings'   => 'fashe-headerTranslate-toggle-settings',
					'description' => esc_html__( 'Toggle the header language translate show.', 'fashe' ),
					'section'     => 'fashe_headertop_options_section',
				)
			)
		);
		
		//  =====================================================
		//  = Header Top Background Color Picker              =
		//  =====================================================
		$wp_customize->add_setting('fashe_header_top_bgColor', array(
			'default'           => '#f5f5f5',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'fashe_sanitize_hex_color'
	 
		));
	 
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_top_bgColor', 
			array(
			'label'    => __('Header To Background Color', 'fashe'),
			'section'  => 'fashe_headertop_options_section',
			'settings' => 'fashe_header_top_bgColor',
		)));
		
		//  =======================================
		//  = Header Top Text Color Picker   =
		//  =======================================
		$wp_customize->add_setting('fashe_header_top_textColor', array(
			'default'           => '#888888',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'fashe_sanitize_hex_color'
	 
		));
	 
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_top_textColor', 
			array(
			'label'    => __('Header To Text Color', 'fashe'),
			'section'  => 'fashe_headertop_options_section',
			'settings' => 'fashe_header_top_textColor',
		)));
		//  =============================================
		//  = Page Header Background Color Picker   =
		//  =============================================
		
		$wp_customize->add_setting('fashe_headerbgcolor', array(
			'default'           => '#999',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'fashe_sanitize_hex_color'
	 
		));
	 
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize, 
			'fashe_headerbgcolor_ctrl', 
			array(
			'label'    => __('Header Background Color', 'fashe'),
			'section'  => 'colors',
			'settings' => 'fashe_headerbgcolor',
		)));
		/**************************
			Blog Section
		***************************/

		$wp_customize->add_section( 'fashe_blog_options_section', 
			array(
				'title'       => esc_html__( 'Blog', 'fashe' ), 
				'priority'    => 36,
				'capability'  => 'edit_theme_options', 
				'panel'    	  => 'fashe_options_panel',
				'description' => esc_html__('Allows you to settings for blog post excerpt and sidebar position.', 'fashe'), 
			) 
		);
        // Post excerpt	settings
		$wp_customize->add_setting('fashe_post_excerpt', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'fashe_sanitize_number_absint'
	 
		));
		// Post excerpt	control
		$wp_customize->add_control('fashe_post_excerpt_ctrl', array(
			'label'      => __('Set Post Excerpt', 'fashe'),
			'section'    => 'fashe_blog_options_section',
			'settings'   => 'fashe_post_excerpt',
		));	
			
		// Sidebar Layouts option add settings
		$wp_customize->add_setting( 'fashe-sidebarlayouts-settings',
			array(
				'default'    => '', 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback' => 'fashe_sanitize_nohtml'
			) 
		); 
		// Sidebar Layouts option add control
		$wp_customize->add_control(
			new Epsilon_Control_Layouts(
				$wp_customize,
				'fashe_sidebarlayouts_enable_shoptitle',
				array(
					'type'        => 'epsilon-layouts',
					'label'       => esc_html__( 'Sidebar Layouts', 'fashe' ),
					'settings'   => 'fashe-sidebarlayouts-settings',
					'description' => esc_html__( 'Select the blog sidebar layout.', 'fashe' ),
					'section'     => 'fashe_blog_options_section',
					'fixed' => true,
					'layouts' => array( 
						'1' 	=> FASHE_DIR_ICON_IMG_URI.'1col.png',
						'2' 	=> FASHE_DIR_ICON_IMG_URI.'2cr.png', 
						'3' 	=> FASHE_DIR_ICON_IMG_URI.'2cl.png' )
				)
			)
		);
		
		/**************************
			WooCommerce Section
		***************************/

		$wp_customize->add_section( 'fashe_woocommerce_options_section', 
			array(
				'title'       => esc_html__( 'WooCommerce', 'fashe' ), 
				'priority'    => 36,
				'capability'  => 'edit_theme_options', 
				'panel'    	  => 'fashe_options_panel',
				'description' => esc_html__('Allows you to customize settings for Fashe theme.', 'fashe'), 
			) 
		);
         		
		// WooCommerce shop title show/hide option add settings
		$wp_customize->add_setting( 'fashe-woo-shoppage-title-settings',
			array(
				'default'    => '', 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback' => 'fashe_sanitize_checkbox'
			) 
		); 
		// WooCommerce shop title option add control
		$wp_customize->add_control(
			new Epsilon_Control_Toggle(
				$wp_customize,
				'fashe_woo_enable_shoptitle',
				array(
					'type'        => 'epsilon-toggle',
					'label'       => esc_html__( 'Shop Title Show/Hide', 'fashe' ),
					'settings'   => 'fashe-woo-shoppage-title-settings',
					'description' => esc_html__( 'Toggle the shop page title show or hide.', 'fashe' ),
					'section'     => 'fashe_woocommerce_options_section',
				)
			)
		);
		// Product per page number
		$wp_customize->add_setting('fashe_woo_product_perpage', array(
			'default'        => '10',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'fashe_sanitize_number_absint'
	 
		));
		// Product per page number control
		$wp_customize->add_control('fashe_product_number_ctrl', array(
			'label'      => __('Related product per section ( Default 10 )', 'fashe'),
			'section'    => 'fashe_woocommerce_options_section',
			'settings'   => 'fashe_woo_product_perpage',
		));	
		//Related Product number
		$wp_customize->add_setting('fashe_related_product_number', array(
			'default'        => '4',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'sanitize_callback' => 'fashe_sanitize_number_absint'
	 
		));
		// Related Product number control
		$wp_customize->add_control('fashe_related_product_number_ctrl', array(
			'label'      => __('Related product per section ( Default 4 )', 'fashe'),
			'section'    => 'fashe_woocommerce_options_section',
			'settings'   => 'fashe_related_product_number',
		));	
						
		/**************************
			404 Page
		***************************/

		$wp_customize->add_section( 'fashe_fof_options_section', 
			array(
				'title'       => esc_html__( '404 Page Settings', 'fashe' ), 
				'priority'    => 36,
				'capability'  => 'edit_theme_options', 
				'panel'    	  => 'fashe_options_panel',
				'description' => esc_html__('Allows you to customize settings for Fashe theme.', 'fashe'), 
			) 
		);
         		
		// 404 text one option add settings
		$wp_customize->add_setting('fashe_fof_text_one', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'transport'  	 => 'refresh',
			'sanitize_callback' => 'fashe_sanitize_nohtml'
	 
		));
		
		// 404 text one control
		$wp_customize->add_control('fashe_fof_text_one_ctrl', array(
			'label'      => esc_html__( '404 Text #1', 'fashe' ),
			'section'    => 'fashe_fof_options_section',
			'settings'   => 'fashe_fof_text_one',
		));	
         		
		// 404 text one option add settings
		$wp_customize->add_setting('fashe_fof_text_two', array(
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'type'           => 'theme_mod',
			'transport'  	 => 'refresh',
			'sanitize_callback' => 'fashe_sanitize_nohtml'
	 
		));
		
		// 404 text one control
		$wp_customize->add_control('fashe_fof_text_two_ctrl', array(
			'label'      => esc_html__( '404 Text #2', 'fashe' ),
			'section'    => 'fashe_fof_options_section',
			'settings'   => 'fashe_fof_text_two',
		));	
		// 404 page text 1 color setting
		$wp_customize->add_setting('fashe_fof_textonecolor_settings', array(
			'default'           => '#fff',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'fashe_sanitize_hex_color'
	 
		));
		// 404 page text 1 color control
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'fashe_fof_textonecolor_ctrl', 
			array(
			'label'    => __('404 Page Text #1 Color', 'fashe'),
			'section'  => 'fashe_fof_options_section',
			'settings' => 'fashe_fof_textonecolor_settings',
		)));
		// 404 page text 2 color setting
		$wp_customize->add_setting('fashe_fof_texttwocolor_settings', array(
			'default'           => '#fff',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'fashe_sanitize_hex_color'
	 
		));
		// 404 page text 2 color control
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'fashe_fof_texttwocolor_ctrl', 
			array(
			'label'    => __('404 Page Text #2 Color', 'fashe'),
			'section'  => 'fashe_fof_options_section',
			'settings' => 'fashe_fof_texttwocolor_settings',
		)));
		// 404 page background color setting
		$wp_customize->add_setting('fashe_fof_bgcolor_settings', array(
			'default'           => '#fff',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'fashe_sanitize_hex_color'
	 
		));
		// 404 page background color control
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
			$wp_customize, 
			'fashe_fof_bgcolor_ctrl', 
			array(
			'label'    => __('404 Page Background Color', 'fashe'),
			'section'  => 'fashe_fof_options_section',
			'settings' => 'fashe_fof_bgcolor_settings',
		)));
		/**************************
			Footer Section
		***************************/


		$wp_customize->add_section( 'fashe_footer_options_section', 
			array(
				'title'       => esc_html__( 'Footer', 'fashe' ), 
				'priority'    => 36,
				'capability'  => 'edit_theme_options', 
				'panel'    	  => 'fashe_options_panel',
				'description' => esc_html__('Allows you to customize settings for Fashe theme.', 'fashe'), 
			) 
		);
         		
		// Footer Widget Show/Hide option add settings
		$wp_customize->add_setting( 'fashe-widget-toggle-settings',
			array(
				'default'    => '', 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback' => 'fashe_sanitize_checkbox'
			) 
		); 
		// Preloader option add control
		$wp_customize->add_control(
			new Epsilon_Control_Toggle(
				$wp_customize,
				'fashe_widget_enable_preloader',
				array(
					'type'        => 'epsilon-toggle',
					'label'       => esc_html__( 'Footer Widget On/Off', 'fashe' ),
					'settings'   => 'fashe-widget-toggle-settings',
					'description' => esc_html__( 'Toggle the Footer Widget Show or Hide.', 'fashe' ),
					'section'     => 'fashe_footer_options_section',
				)
			)
		);
		// Footer payment method option add settings
		$wp_customize->add_setting( 'fashe-footer-payment-settings',
			array(
				 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback' => 'fashe_sanitize_repeater'
			) 
		); 
		// Footer payment method option add control
		$wp_customize->add_control(
			new Epsilon_Control_Repeater(
				$wp_customize,
				'fashe_footer_payment_repeater',
				array(
					'default' => array(),
					'type'        => 'epsilon-repeater',
					'label'       => esc_html__( 'Footer Payment Method', 'fashe' ),
					'settings'   => 'fashe-footer-payment-settings',
					'section'     => 'fashe_footer_options_section',
					'choices' => array( 'paymenturl' ),
					'filtered_value' => array('paymenturl'),
					'save_as_meta' => 'fashe-footer-payment-settings',
					'row_label' => array(
							'type'  => 'text',
							'value' => esc_html__( 'Row', 'fashe' ),
							'field' => true,
						),
					'fields' 	  => array(
						'paymenturl' => array(
							'type' => 'text',
							'label' => 'Url',
							'default' => '#',
						),
						'paymentimg' => array(
							'type' => 'epsilon-image',
							'label' => 'Payment Method Image',
							'default' => '',
						),

					)
				)
			)
		);		
		
		// Footer copy right text add settings
		$wp_customize->add_setting( 'fashe-copyright-text-settings',
			array(
				'default'    => '', 
				'type'       => 'theme_mod',
				'capability' => 'edit_theme_options',
				'transport'  => 'refresh',
				'sanitize_callback' => 'fashe_sanitize_html' 
			) 
		); 
		// Footer copy right text add control
		$wp_customize->add_control(
			new Epsilon_Control_Text_Editor(
				$wp_customize,
				'fashe_copyright_text',
				array(
					'type'        => 'epsilon-text-editor',
					'label'       => esc_html__( 'Footer Copy Right Text', 'fashe' ),
					'settings'   => 'fashe-copyright-text-settings',
					'section'     => 'fashe_footer_options_section',
				)
			)
		);
		
		$wp_customize->selective_refresh->add_partial( 'fashe-copyright-text-settings', 
		array( 'selector' => '.footer-copy-right-text' ) );
		
		// Footer Background Color 
		$wp_customize->add_setting('fashe_footer_bgColor_settings', array(
			'default'           => '#f0f0f0',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'fashe_sanitize_hex_color'
	 
		));
		// Footer Background Color
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_footer_bgColor', 
			array(
			'label'    => __('Footer Background Color', 'fashe'),
			'section'  => 'fashe_footer_options_section',
			'settings' => 'fashe_footer_bgColor_settings',
		)));
		
		// Footer text Color 
		$wp_customize->add_setting('fashe_footer_color_settings', array(
			'default'           => '#888888',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'fashe_sanitize_hex_color'
	 
		));
		// Footer text Color
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_footer_textColor', 
			array(
			'label'    => __('Footer Text Color', 'fashe'),
			'section'  => 'fashe_footer_options_section',
			'settings' => 'fashe_footer_color_settings',
		)));
		
		// Footer widget title color setting
		$wp_customize->add_setting('fashe_footer_widgettitlecolor_settings', array(
			'default'           => '#222',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'fashe_sanitize_hex_color'
	 
		));
		// Footer widget title color control
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_footer_widgettitlecolor', 
			array(
			'label'    => __('Footer Widget Title Color', 'fashe'),
			'section'  => 'fashe_footer_options_section',
			'settings' => 'fashe_footer_widgettitlecolor_settings',
		)));
		
		// Footer anchor Color 
		$wp_customize->add_setting('fashe_footer_anchorcolor_settings', array(
			'default'           => '#888888',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'fashe_sanitize_hex_color'
	 
		));
		// Footer anchor Color
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_footer_anchorcolor', 
			array(
			'label'    => __('Footer Anchor Color', 'fashe'),
			'section'  => 'fashe_footer_options_section',
			'settings' => 'fashe_footer_anchorcolor_settings',
		)));
		
		// Footer anchor hover Color 
		$wp_customize->add_setting('fashe_footer_anchorhovcolor_settings', array(
			'default'           => '#888888',
			'capability'        => 'edit_theme_options',
			'type'           	=> 'theme_mod',
			'transport'  		=> 'refresh',
			'sanitize_callback' => 'fashe_sanitize_hex_color'
	 
		));
		// Footer anchor hover Color
		$wp_customize->add_control( 
			new WP_Customize_Color_Control(
			$wp_customize, 
			'header_footer_anchorhovcolor', 
			array(
			'label'    => __('Footer Anchor Hover Color', 'fashe'),
			'section'  => 'fashe_footer_options_section',
			'settings' => 'fashe_footer_anchorhovcolor_settings',
		)));
		
		
		
	}
	add_action( 'customize_register', 'themeslug_customize_register' );
	
	
?>