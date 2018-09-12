<?php 
/**
 * @Packge 	   : Fashe
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	// Final Class
	final class Fashe{

		// Theme Version
		private $fashe_version = '1.0';

		// Minimum WordPress Version required
		private $min_wp = '4.0';

		// Minimum PHP version required 
		private $min_php = '5.6.25';

		// Theme init
		public function init(){
			
			$this->setup();
		}

		// Theme setup
		private function setup(){
			

			// Create enqueue class instance
			$enqueu = new fashe_Enqueue();
			$enqueu->scripts = $this->enqueue() ;
			$enqueu->fashe_scripts_enqueue_init() ;


		}
		// Theme Support
		public function support(){
			// content width
	        $GLOBALS['content_width'] = apply_filters( 'fashe_content_width', 751 );

	        
	        // text domain for translation.
	        load_theme_textdomain( 'fashe', FASHE_DIR_PATH . '/languages' );
	        
	        // support title tage
	        add_theme_support( 'title-tag' );
	        
	        // support logo
	        add_theme_support( 'custom-logo' );
	        
	        //  support post format
	        add_theme_support( 'post-formats', array( 'video','audio' ) );
	        
	        // support post-thumbnails
	        add_theme_support( 'post-thumbnails');
			
			// Custom data center thumbnails size
			add_image_size( 'fashe_widget_post_thumb', 370, 277, true );

	        // support custom background 
	        add_theme_support( 'custom-background', array(
			'default-color' => '#fff',
			) );
	        
	        // support custom header
	        add_theme_support( 'custom-header' );
	        
	        // support automatic feed links
	        add_theme_support( 'automatic-feed-links' );
	        
	        // support html5
	        add_theme_support( 'html5' );
			
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
			
			// woocommerce support
			add_theme_support('woocommerce');
			
			// woo product gallery zoom, lightbox, slider support
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
			    
	        // register nav menu
	        register_nav_menus( array(
	            'primary-menu'   => esc_html__( 'Primary Menu', 'fashe' ),
	            'social-menu'    => esc_html__( 'Social Menu', 'fashe' ),
	        ) );

	        // editor style
	        add_editor_style('assets/css/editor-style.css');

		} // end support method

		// enqueue theme style and script
		private function enqueue(){

			$cssPath = FASHE_DIR_CSS_URI;
			$jsPath  = FASHE_DIR_JS_URI;
			
			$scripts = array(
				'style' => array(
					array(
						'handler'		=> 'google-font',
						'file' 			=> $this->google_font(),
					),
					array(
						'handler'		=> 'bootstrap',
						'file' 			=> $cssPath.'bootstrap.min.css',
						'dependency' 	=> array(),
						'version' 		=> '4.0.0',
					),
					array(
						'handler'		=> 'font-awesome',
						'file' 			=> $cssPath.'font-awesome.min.css',
						'dependency' 	=> array(),
						'version' 		=> '4.7.0',
					),
					array(
						'handler'		=> 'themify-icons',
						'file' 			=> $cssPath.'themify-icons.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'ionicons',
						'file' 			=> $cssPath.'ionicons.min.css',
						'dependency' 	=> array(),
						'version' 		=> '2.0.0',
					),
					array(
						'handler'		=> 'elegant',
						'file' 			=> $cssPath.'elegant.css',
						'dependency' 	=> array(),
						'version' 		=> '2.0.0',
					),
					array(
						'handler'		=> 'hamburgers',
						'file' 			=> $cssPath.'hamburgers.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0.0',
					),
					array(
						'handler'		=> 'animate',
						'file' 			=> $cssPath.'animate.css',
						'dependency' 	=> array(),
						'version' 		=> '3.5.2',
					),
					array(
						'handler'		=> 'animsition',
						'file' 			=> $cssPath.'animsition.min.css',
						'dependency' 	=> array(),
						'version' 		=> '4.0.2',
					),
					array(
						'handler'		=> 'select2',
						'file' 			=> $cssPath.'select2.min.css',
						'dependency' 	=> array(),
						'version' 		=> '4.0.3',
					),
					array(
						'handler'		=> 'daterangepicker',
						'file' 			=> $cssPath.'daterangepicker.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'util',
						'file' 			=> $cssPath.'util.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'fashe',
						'file' 			=> $cssPath.'main.css',
						'dependency' 	=> array(),
						'version' 		=> $this->fashe_version,
					),
					array(
						'handler'		=> 'fashe-style',
						'file' 			=> get_stylesheet_uri(),
					),
				),
				'scripts' => array(

					array(
						'handler'		=> 'animsition',
						'file' 			=> $jsPath.'animsition.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '1.0',
						'in_footer' 	=> true
					),

					array(
						'handler'		=> 'popper',
						'file' 			=> $jsPath.'popper.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '4.0.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'bootstrap',
						'file' 			=> $jsPath.'bootstrap.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '4.0.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'select2',
						'file' 			=> $jsPath.'select2.min.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> '4.0.3',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'fashe-main',
						'file' 			=> $jsPath.'main.js',
						'dependency' 	=> array( 'jquery' ),
						'version' 		=> $this->fashe_version,
						'in_footer' 	=> true
					),
				)
			);

			return $scripts;

		} // end enqueu method 

		// Google Font  
		private function google_font(){

			$fontUrl = '';
			
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'fashe' ) ) {
				
				$font_families = array(
					'Montserrat:300,400,500,600,700',
					'Poppins:400,500,700'
				);

				$familyArgs = array(
					'family' => htmlentities( implode( '|', $font_families ) ),
					'subset' => urlencode( 'latin, latin-text' ),
				);

				$fontUrl = add_query_arg( $familyArgs, '//fonts.googleapis.com/css' );
			}
			
			return esc_url_raw( $fontUrl );

		} //End google_font method


	} // End Class

	
?>