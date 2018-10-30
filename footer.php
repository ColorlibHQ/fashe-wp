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

		/**
		 * Footer Area
		 *
		 * @Footer
		 * @Back To Top Button
		 *
		 * @Hook fashe_footer
		 *
		 * @Hooked  fashe_footer_area 10
		 * @Hooked  fashe_back_to_top 20
		 *
		 */

		do_action( 'fashe_footer' );

	wp_footer();
?>
</body>
</html>
