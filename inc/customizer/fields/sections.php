<?php
/**
 * @Packge     : Fashe
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer panels and sections
 *
 */

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
	/**
	 * Theme Options Panel
	 */
	array(
		'id'   => 'fashe_options_panel',
		'args' => array(
			'priority'       => 0,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Theme Options', 'fashe' ),
		),
	),
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
	/**
	 * General Section
	 */
	array(
		'id'   => 'fashe_general_options_section',
		'args' => array(
			'title'    => esc_html__( 'General', 'fashe' ),
			'panel'    => 'fashe_options_panel',
			'priority' => 1,
		),
	),
	/**
	 * Header Section
	 */
	array(
		'id'   => 'fashe_headertop_options_section',
		'args' => array(
			'title'    => esc_html__( 'Header Top', 'fashe' ),
			'panel'    => 'fashe_options_panel',
			'priority' => 2,
		),
	),
	/**
	 * Blog Section
	 */
	array(
		'id'   => 'fashe_blog_options_section',
		'args' => array(
			'title'    => esc_html__( 'Blog', 'fashe' ),
			'panel'    => 'fashe_options_panel',
			'priority' => 3,
		),
	),
	/**
	 * WooCommerce Section
	 */
	array(
		'id'   => 'fashe_woocommerce_options_section',
		'args' => array(
			'title'    => esc_html__( 'WooCommerce', 'fashe' ),
			'panel'    => 'fashe_options_panel',
			'priority' => 4,
		),
	),

	/**
	 * 404 Page Section
	 */
	array(
		'id'   => 'fashe_fof_options_section',
		'args' => array(
			'title'    => esc_html__( '404 Page', 'fashe' ),
			'panel'    => 'fashe_options_panel',
			'priority' => 5,
		),
	),
	/**
	 * Footer Section
	 */
	array(
		'id'   => 'fashe_footer_options_section',
		'args' => array(
			'title'    => esc_html__( 'Footer', 'fashe' ),
			'panel'    => 'fashe_options_panel',
			'priority' => 6,
		),
	),

);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
	'panel'   => $panels,
	'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );


