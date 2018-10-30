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


	// Base URI
if ( ! defined( 'FASHE_DIR_URI' ) ) {
	define( 'FASHE_DIR_URI', get_template_directory_uri() . '/' );
}

	// assets URI
if ( ! defined( 'FASHE_DIR_ASSETS_URI' ) ) {
	define( 'FASHE_DIR_ASSETS_URI', FASHE_DIR_URI . 'assets/' );
}

	// Css File URI
if ( ! defined( 'FASHE_DIR_CSS_URI' ) ) {
	define( 'FASHE_DIR_CSS_URI', FASHE_DIR_ASSETS_URI . 'css/' );
}

	// Js File URI
if ( ! defined( 'FASHE_DIR_JS_URI' ) ) {
	define( 'FASHE_DIR_JS_URI', FASHE_DIR_ASSETS_URI . 'js/' );
}

	// Icon Images
if ( ! defined( 'FASHE_DIR_ICON_IMG_URI' ) ) {
	define( 'FASHE_DIR_ICON_IMG_URI', FASHE_DIR_ASSETS_URI . 'img/icons/' );
}

	// Base Directory
if ( ! defined( 'FASHE_DIR_PATH' ) ) {
	define( 'FASHE_DIR_PATH', get_parent_theme_file_path() . '/' );
}

	//Inc Folder Directory
if ( ! defined( 'FASHE_DIR_PATH_INC' ) ) {
	define( 'FASHE_DIR_PATH_INC', FASHE_DIR_PATH . 'inc/' );
}

	//Fashe Libraries Folder Directory
if ( ! defined( 'FASHE_DIR_PATH_LIBS' ) ) {
	define( 'FASHE_DIR_PATH_LIBS', FASHE_DIR_PATH_INC . 'libraries/' );
}

	//Classes Folder Directory
if ( ! defined( 'FASHE_DIR_PATH_CLASSES' ) ) {
	define( 'FASHE_DIR_PATH_CLASSES', FASHE_DIR_PATH_INC . 'classes/' );
}

	//Hooks Folder Directory
if ( ! defined( 'FASHE_DIR_PATH_HOOKS' ) ) {
	define( 'FASHE_DIR_PATH_HOOKS', FASHE_DIR_PATH_INC . 'hooks/' );
}

	//Widgets Folder Directory
if ( ! defined( 'FASHE_DIR_PATH_WIDGET' ) ) {
	define( 'FASHE_DIR_PATH_WIDGET', FASHE_DIR_PATH_INC . 'widgets/' );
}


/**
 * Include File
 *
 */

require_once FASHE_DIR_PATH_INC . 'fashe-breadcrumbs.php';
require_once FASHE_DIR_PATH_INC . 'fashe-widgets-reg.php';
require_once FASHE_DIR_PATH_INC . 'wp_bootstrap_navwalker.php';
require_once FASHE_DIR_PATH_INC . 'fashe-functions.php';
require_once FASHE_DIR_PATH_INC . 'fashe-commoncss.php';
require_once FASHE_DIR_PATH_INC . 'support-functions.php';
require_once FASHE_DIR_PATH_INC . 'fashe-woo-functions.php';
require_once FASHE_DIR_PATH_INC . 'wp-html-helper.php';
require_once FASHE_DIR_PATH_INC . 'wp_bootstrap_pagination.php';
require_once FASHE_DIR_PATH_CLASSES . 'Class-Enqueue.php';
require_once FASHE_DIR_PATH_CLASSES . 'Class-Config.php';
require_once FASHE_DIR_PATH_HOOKS . 'hooks.php';
require_once FASHE_DIR_PATH_HOOKS . 'hooks-functions.php';
require_once FASHE_DIR_PATH_INC . 'customizer/customizer.php';
require_once FASHE_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php';
require_once FASHE_DIR_PATH_INC . 'class-epsilon-init-dashboard.php';


/**
 *
 * Initialize fashe object
 *
 * Inside this object:
 *
 * Enqueue scripts, Google font, theme support features, Epsilon Dashboard .
 *
 */

$fashe = new Fashe();



