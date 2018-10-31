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


function fashe_widgets_init() {
	// sidebar widgets register
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'fashe' ),
			'id'            => 'fashe-post-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="m-text23 p-b-34">',
			'after_title'   => '</h4>',
		)
	);

	// Woo page sidebar widgets register
	register_sidebar(
		array(
			'name'          => esc_html__( 'Woo Page Sidebar', 'fashe' ),
			'id'            => 'fashe-woo-sidebar',
			'before_widget' => '<div id="%1$s" class="widget p-b-54 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="m-text14 p-b-7">',
			'after_title'   => '</h4>',
		)
	);

	// footer widgets register
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer One', 'fashe' ),
			'id'            => 'footer-1',
			'before_widget' => '<div id="%1$s" class="footer--widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="s-text12 p-b-30">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Two', 'fashe' ),
			'id'            => 'footer-2',
			'before_widget' => '<div id="%1$s" class="footer--widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="s-text12 p-b-30">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Three', 'fashe' ),
			'id'            => 'footer-3',
			'before_widget' => '<div id="%1$s" class="footer--widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="s-text12 p-b-30">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Four', 'fashe' ),
			'id'            => 'footer-4',
			'before_widget' => '<div id="%1$s" class="footer--widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="s-text12 p-b-30">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Five', 'fashe' ),
			'id'            => 'footer-5',
			'before_widget' => '<div id="%1$s" class="footer--widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="s-text12 p-b-30">',
			'after_title'   => '</h4>',
		)
	);

}
add_action( 'widgets_init', 'fashe_widgets_init' );
