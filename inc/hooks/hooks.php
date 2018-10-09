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


	/**
	 * Header
	 *
	 * @Header Menu
	 * @Header Bottom
	 * 
	 */

	add_action( 'fashe_header', 'fashe_header_cb', 10 );

	/**
	 * Hook for footer
	 *
	 */
	add_action( 'fashe_footer', 'fashe_footer_area', 10 );
	add_action( 'fashe_footer', 'fashe_back_to_top', 20 );

	/**
	 * Hook for Blog, single, page, search, archive pages wrapper.
	 */
	add_action( 'fashe_wrp_start', 'fashe_wrp_start_cb', 10 );
	add_action( 'fashe_wrp_end', 'fashe_wrp_end_cb', 10 );
	
	/**
	 * Hook for Blog, single, search, archive pages column.
	 */
	add_action( 'fashe_blog_col_start', 'fashe_blog_col_start_cb', 10 );
	add_action( 'fashe_blog_col_end', 'fashe_blog_col_end_cb', 10 );
	
	/**
	 * Hook for blog posts thumbnail.
	 */
	add_action( 'fashe_blog_posts_thumb', 'fashe_blog_posts_thumb_cb', 10 );

	/**
	 * Hook for blog posts title.
	 */
	add_action( 'fashe_blog_posts_title', 'fashe_blog_posts_title_cb', 10 );

	/**
	 * Hook for blog posts meta.
	 */
	add_action( 'fashe_blog_posts_meta', 'fashe_blog_posts_meta_cb', 10 );

	/**
	 * Hook for blog posts excerpt.
	 */
	add_action( 'fashe_blog_posts_excerpt', 'fashe_blog_posts_excerpt_cb', 10 );

	/**
	 * Hook for blog posts content.
	 */
	add_action( 'fashe_blog_posts_content', 'fashe_blog_posts_content_cb', 10 );

	/**
	 * Hook for blog sidebar.
	 */
	add_action( 'fashe_blog_sidebar', 'fashe_blog_sidebar_cb', 10 );
	
	/**
	 * Hook for blog single post social share option.
	 */
	add_action( 'fashe_blog_posts_share', 'fashe_blog_posts_share_cb', 10 );
	
	/**
	 * Hook for blog single post meta category, tag, next - previous link and comments form.
	 */
	add_action( 'fashe_blog_single_meta', 'fashe_blog_single_meta_cb', 10 );
	
	/**
	 * Hook for page content.
	 */
	add_action( 'fashe_page_content', 'fashe_page_content_cb', 10 );
	
	
	/**
	 * Hook for 404 page.
	 */
	add_action( 'fashe_fof', 'fashe_fof_cb', 10 );

	

?>