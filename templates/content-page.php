<?php 
// Block direct access
if( !defined( 'ABSPATH' ) ){
	exit( 'Direct script access denied.' );
}
/**
 * @Packge     : Fashe
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

$contentclass = '';
if( !fashe_is_cca_page() ){
	$contentclass = 'content--area';
}

?>
<div id="page_<?php the_ID(); ?>" <?php post_class( $contentclass ); ?>>
	<?php 

	/**
	 * page content 
	 * Comments Template
	 * @Hook  fashe_page_content
	 *
	 * @Hooked fashe_page_content_cb
	 * 
	 *
	 */
	do_action( 'fashe_page_content' );

	?>
</div>