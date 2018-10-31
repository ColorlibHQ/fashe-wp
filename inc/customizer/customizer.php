<?php
/**
 * @Packge     : Fashe
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

class fashe_theme_customizer {


	function __construct() {
        add_action( 'customize_register', array( $this, 'fashe_theme_customizer_options' ) );
        add_action( 'customize_preview_init', array( $this, 'fashe_customizer_preview_init_js' ) );
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'fashe_customizer_controls_js' ) );
	}

	// Customize register hook

	public function fashe_theme_customizer_options( $wp_customize ) {

		// Include files
		include FASHE_DIR_PATH_INC . 'customizer/fields/sections.php';
		include FASHE_DIR_PATH_INC . 'customizer/fields/fields.php';

        // Change panel to theme option
        $wp_customize->get_section( 'title_tagline' )->panel = 'fashe_options_panel';

        // Change background control section
        $wp_customize->get_control( 'background_color' )->section = 'background_image';
        
        // change priorities
        $wp_customize->get_section( 'title_tagline' )->priority = 0;


        // Copyright text selective refresh
        $wp_customize->selective_refresh->add_partial( 'fashe-copyright-text-settings', 
        array( 'selector' => '.footer-copy-right-text' ) );

        // Rename customizer color section
        $wp_customize->get_section('colors')->title = esc_html__( 'Header Color', 'fashe' );

        // Rename customizer background image section
        $wp_customize->get_section('background_image')->title = esc_html__( 'Background', 'fashe' );

	}


	// Customizer js enqueue

	public function fashe_customizer_controls_js() {

		wp_enqueue_script( 'fashe-customizer', FASHE_DIR_URI . 'inc/customizer/js/customizer.js', array( 'customize-controls' ), '1.0', true );

		wp_localize_script(
			'fashe-customizer',
			'moahCustomizerdata',
			array(
				'site_url'  => site_url( '/' ),
				'blog_page' => get_post_type_archive_link( 'post' ),

			)
		);

	}

	// Customizer preview init js enqueue

    public function fashe_customizer_preview_init_js() {

        wp_enqueue_script( 'fashe-customizer-preview', FASHE_DIR_URI.'inc/customizer/js/customizer-preview.js', array( 'customize-preview' ), '1.0', true );

    }

	// Image sanitization callback.

	public static function fashe_sanitize_image( $image, $setting ) {

		/*
		 * Array of valid image file types.
		 *
		 * The array includes image mime types that are included in wp_get_mime_types()
		 */
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
			'bmp'          => 'image/bmp',
			'tif|tiff'     => 'image/tiff',
			'ico'          => 'image/x-icon',
		);

		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );

		// If $image has a valid mime_type, return it; otherwise, return the default.
		return ( $file['ext'] ? $image : $setting->default );
	}

}

