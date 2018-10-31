<?php
// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
/**
 * @Packge     : Fashe
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Sidebar
if ( is_active_sidebar( 'fashe-post-sidebar' ) ) {

	echo '<div class="col-md-4 col-lg-3 p-b-75"><div class="rightbar">';
		dynamic_sidebar( 'fashe-post-sidebar' );
	echo '</div></div>';
}



