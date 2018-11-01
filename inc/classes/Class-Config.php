<?php
/**
 * @Packge     : Fashe
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

	// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

	// Final Class
final class Fashe {

	// Theme Version
	private $fashe_version = '1.0';

	// Minimum WordPress Version required
	private $min_wp = '4.0';

	// Minimum PHP version required
	private $min_php = '5.6.25';

	function __construct() {

		// After setup theme
		add_action( 'after_setup_theme', array( $this, 'support' ) );
		// elementor flag
		add_action( 'after_switch_theme', array( $this, 'set_elementor_flag' ) );
		// Enqueue elementor theme default style
		add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'enqueue_elementor_theme_default_style' ) );
		// Enqueue elementor notice script
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_elementor_notice_script' ) );
		// Elementor desiable default style
		add_action( 'wp_ajax_elementor_desiable_default_style', array( $this, 'elementor_desiable_default_style' ) );

		// initialize theme flag
		$this->init();

	}

	// Theme init
	public function init() {

		$this->setup();

		// customizer init Instantiate
		if ( class_exists( 'Epsilon_Framework' ) ) {
			$this->customizer_init();
		}

		// Instantiate  Dashboard
		$epsilon_init_dashboard = Epsilon_init_Dashboard::get_instance();

	}

	// Theme setup
	private function setup() {

		// Create enqueue class instance
		$enqueu          = new fashe_Enqueue();
		$enqueu->scripts = $this->enqueue();
		$enqueu->fashe_scripts_enqueue_init();

	}
	// Theme Support
	public function support() {
		// content width
		$GLOBALS['content_width'] = apply_filters( 'fashe_content_width', 751 );

		// text domain for translation.
		load_theme_textdomain( 'fashe', FASHE_DIR_PATH . '/languages' );

		// support title tage
		add_theme_support( 'title-tag' );

		// support logo
		add_theme_support( 'custom-logo' );

		//  support post format
		add_theme_support( 'post-formats', array( 'video', 'audio' ) );

		// support post-thumbnails
		add_theme_support( 'post-thumbnails' );

		// Custom data center thumbnails size
		add_image_size( 'fashe_widget_post_thumb', 370, 277, true );

		// support custom header

		add_theme_support(
			'custom-header',
			array(
				'header-text' => false,
			)
		);

		// support automatic feed links
		add_theme_support( 'automatic-feed-links' );

		// support html5
		add_theme_support( 'html5' );
		
		// support custom background
		add_theme_support( 'custom-background' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// woocommerce support
		add_theme_support( 'woocommerce' );

		// woo product gallery zoom, lightbox, slider support
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// register nav menu
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary Menu', 'fashe' ),
				'social-menu'  => esc_html__( 'Social Menu', 'fashe' ),
			)
		);

		// editor style
		add_editor_style( 'assets/css/editor-style.css' );

	} // end support method

	// enqueue theme style and script
	private function enqueue() {

		$css_path = FASHE_DIR_CSS_URI;
		$js_path  = FASHE_DIR_JS_URI;

		$scripts = array(
			'style'   => array(
				array(
					'handler' => 'google-font',
					'file'    => $this->google_font(),
				),
				array(
					'handler'    => 'bootstrap',
					'file'       => $css_path . 'bootstrap.min.css',
					'dependency' => array(),
					'version'    => '4.0.0',
				),
				array(
					'handler'    => 'font-awesome',
					'file'       => $css_path . 'font-awesome.min.css',
					'dependency' => array(),
					'version'    => '4.7.0',
				),
				array(
					'handler'    => 'themify-icons',
					'file'       => $css_path . 'themify-icons.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'ionicons',
					'file'       => $css_path . 'ionicons.min.css',
					'dependency' => array(),
					'version'    => '2.0.0',
				),
				array(
					'handler'    => 'elegant',
					'file'       => $css_path . 'elegant.css',
					'dependency' => array(),
					'version'    => '2.0.0',
				),
				array(
					'handler'    => 'hamburgers',
					'file'       => $css_path . 'hamburgers.min.css',
					'dependency' => array(),
					'version'    => '1.0.0',
				),
				array(
					'handler'    => 'animate',
					'file'       => $css_path . 'animate.css',
					'dependency' => array(),
					'version'    => '3.5.2',
				),
				array(
					'handler'    => 'animsition',
					'file'       => $css_path . 'animsition.min.css',
					'dependency' => array(),
					'version'    => '4.0.2',
				),
				array(
					'handler'    => 'select2',
					'file'       => $css_path . 'select2.min.css',
					'dependency' => array(),
					'version'    => '4.0.3',
				),
				array(
					'handler'    => 'daterangepicker',
					'file'       => $css_path . 'daterangepicker.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'util',
					'file'       => $css_path . 'util.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'fashe',
					'file'       => $css_path . 'main.css',
					'dependency' => array(),
					'version'    => $this->fashe_version,
				),
				array(
					'handler' => 'fashe-style',
					'file'    => get_stylesheet_uri(),
				),
			),
			'scripts' => array(

				array(
					'handler'    => 'animsition',
					'file'       => $js_path . 'animsition.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),

				array(
					'handler'    => 'popper',
					'file'       => $js_path . 'popper.js',
					'dependency' => array( 'jquery' ),
					'version'    => '4.0.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'bootstrap',
					'file'       => $js_path . 'bootstrap.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '4.0.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'select2',
					'file'       => $js_path . 'select2.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '4.0.3',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'fashe-woo-custom',
					'file'       => $js_path . 'woo-custom.js',
					'dependency' => array( 'jquery', 'jquery-slick' ),
					'version'    => $this->fashe_version,
					'in_footer'  => true,
				),
				array(
					'handler'    => 'fashe-main',
					'file'       => $js_path . 'main.js',
					'dependency' => array( 'jquery' ),
					'version'    => $this->fashe_version,
					'in_footer'  => true,
				),
			),
		);

		return $scripts;

	} // end enqueu method

	// Google Font
	private function google_font() {

		$font_url = '';

		if ( 'off' !== _x( 'on', 'Google font: on or off', 'fashe' ) ) {

			$font_families = array(
				'Montserrat:300,400,500,600,700',
				'Poppins:400,500,700',
			);

			$family_args = array(
				'family' => htmlentities( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin, latin-text' ),
			);

			$font_url = add_query_arg( $family_args, '//fonts.googleapis.com/css' );
		}

		return esc_url_raw( $font_url );

	} //End google_font method

	/**
	 * Epsilon customizer
	 *
	 */

	// epsilon customizer init
	private function customizer_init() {

		// epsilon customizer quickie settings

		add_filter( 'epsilon_quickie_bar_shortcuts', array( $this, 'epsilon_quickie' ) );

		// Instantiate Epsilon Framework object
		$epsilon_framework = new Epsilon_Framework();

		// Instantiate fashe theme customizer
		$fashe_theme_customizer = new fashe_theme_customizer();
	}

	public function epsilon_quickie() {

			return array(

				'links' => array(
					array(
						'link_to'   => 'fashe_options_panel',
						'icon'      => 'dashicons dashicons-admin-tools',
						'link_type' => 'panel',
					),
					array(
						'link_to'   => 'nav_menus',
						'icon'      => 'dashicons dashicons-menu',
						'link_type' => 'panel',
					),
					array(
						'link_to'   => 'widgets',
						'icon'      => 'dashicons dashicons-archive',
						'link_type' => 'panel',
					),
					array(
						'link_to'   => 'custom_css',
						'icon'      => 'dashicons dashicons-editor-code',
						'link_type' => 'section',
					),

				),
				'logo'  => array(
					'url' => EPSILON_URI . '/assets/img/epsilon-logo.png',
					'alt' => 'Epsilon Builder Logo',
				),
			);

	}

	/**
	 * Notice for Elementor default style
	 *
	 */

	// Check elementor preview page
	public static function check_elementor_preview_page() {

		if ( ( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) || isset( $_REQUEST['elementor-preview'] ) ) {
			return true;
		}

		return false;

	}
	// Set flag for elementor ( hooked in after switch theme )
	public function set_elementor_flag() {
		update_option( 'fashe_had_elementor', 'no' );
	}
	// Elementor dsiable default style
	public function elementor_desiable_default_style() {

		if ( ! wp_verify_nonce( $_POST['nonce'], 'fashe-elementor-notice-nonce' ) ) {
			return;
		}
		$reply = $_POST['reply'];
		if ( ! empty( $reply ) ) {
			if ( $reply == 'yes' ) {
				update_option( 'elementor_disable_color_schemes', 'yes' );
				update_option( 'elementor_disable_typography_schemes', 'yes' );
			}
			update_option( 'fashe_had_elementor', 'yes' );
		}
		die();

	}
	// Enqueue theme default style for elementor
	public function enqueue_elementor_theme_default_style() {

		$disabled_color_schemes      = get_option( 'elementor_disable_color_schemes' );
		$disabled_typography_schemes = get_option( 'elementor_disable_typography_schemes' );

		if ( $disabled_color_schemes === 'yes' && $disabled_typography_schemes === 'yes' ) {
			wp_enqueue_style( 'fashe-elementor-default-style', FASHE_DIR_CSS_URI . 'elementor-default-element-style.css', array(), $this->fashe_version );
		}
	}
	// Enqueue elementor notice scripts
	public function enqueue_elementor_notice_script() {

		$had_elementor = get_option( 'fashe_had_elementor' );

		if ( $had_elementor == 'no' && self::check_elementor_preview_page() ) {
			wp_enqueue_script( 'fashe-elementor-notice', FASHE_DIR_JS_URI . 'fashe-elementor-notice.js', array( 'jquery' ), '1.0', true );
			wp_localize_script(
				'fashe-elementor-notice',
				'fasheElementorNotice',
				array(
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( 'fashe-elementor-notice-nonce' ),
				)
			);
		}

	}

} // End Class



