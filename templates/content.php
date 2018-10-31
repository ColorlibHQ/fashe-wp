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

// Post Item Start

?>

<div id="<?php the_ID(); ?>" <?php post_class( esc_attr( 'item-blog p-b-80' ) ); ?>>
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

	echo '<div class="item-blog-txt p-t-33">';
	/**
	 * Blog Post title
	 * @Hook  fashe_blog_posts_title
	 *
	 * @Hooked fashe_blog_posts_title_cb
	 *
	 *
	 */
	do_action( 'fashe_blog_posts_title' );

	/**
	 * Blog Post Meta
	 * @Hook  fashe_blog_posts_meta
	 *
	 * @Hooked fashe_blog_posts_meta_cb
	 *
	 *
	 */
	do_action( 'fashe_blog_posts_meta' );


	/**
	 * Blog Excerpt With read more button
	 * @Hook  fashe_blog_posts_excerpt
	 *
	 * @Hooked fashe_blog_posts_excerpt_cb
	 *
	 *
	 */
	do_action( 'fashe_blog_posts_excerpt' );

	echo '</div>';
	?>
</div>
