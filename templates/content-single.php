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

?>
<!-- Post Item Start -->
<div id="<?php the_ID(); ?>" <?php post_class('content--area p-b-40'); ?>>

	<?php 
		/**
	 * Blog Post thumbnail
	 * @Hook  fashe_blog_posts_thumb
	 *
	 * @Hooked fashe_blog_posts_thumb_cb
	 * 
	 *
	 */
	do_action( 'fashe_blog_posts_thumb' );
	echo '<div class="blog-detail-txt p-t-33">';
	/**
	 * Blog Post Title and Meta
	 * @Hook  fashe_blog_posts_meta
	 *
	 * @Hooked fashe_blog_posts_meta_cb
	 * 
	 *
	 */
	do_action( 'fashe_blog_posts_meta' );


	/**
	 * Blog single page content 
	 * Post social share
	 * @Hook  fashe_blog_posts_content
	 *
	 * @Hooked fashe_blog_posts_content_cb
	 * 
	 *
	 */
	do_action( 'fashe_blog_posts_content' );

	echo '</div>';
	/**
	 * Blog single post meta category, tag, next - previous link, comments form
	 * and biography
	 * @Hook  fashe_blog_single_meta
	 * 
	 * @Hooked fashe_blog_single_meta_cb
	 * 
	 *
	 */
	do_action( 'fashe_blog_single_meta' );

?>   
</div>   
<?php 
	
	// comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
	
?>              