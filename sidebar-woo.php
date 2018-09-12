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

// Sidebar
if( is_active_sidebar( 'fashe-woo-sidebar' ) ){
	
	echo '<div class="col-sm-6 col-md-4 col-lg-3 p-b-50"><div class="leftbar p-r-20 p-r-0-sm">';
		dynamic_sidebar( 'fashe-woo-sidebar' );
	echo '</div></div>';
}
 

?>