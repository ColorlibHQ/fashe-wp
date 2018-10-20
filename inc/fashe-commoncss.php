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
 

// enqueue css
function fashe_common_custom_css(){
    
    wp_enqueue_style( 'fashe-common', get_template_directory_uri().'/assets/css/common.css' );
		
		$topbarBg          = esc_attr( fashe_opt( 'fashe_header_top_bgColor' ) );
		$topbarColor       = esc_attr( fashe_opt( 'fashe_header_top_textColor' ) );
		$headerBg          = esc_url( get_header_image() );
		$headerTextColor   = esc_attr( fashe_opt('fashe_headertextcolor') );
		$headerbgcolor     = esc_attr( fashe_opt('fashe_headerbgcolor') );
		$foftext1     	   = esc_attr( fashe_opt('fashe_fof_textonecolor_settings') );
		$foftext2     	   = esc_attr( fashe_opt('fashe_fof_texttwocolor_settings') );
		$fofbgcolor        = esc_attr( fashe_opt('fashe_fof_bgcolor_settings') );
		$footerbgColor     = esc_attr( fashe_opt('fashe_footer_bgColor_settings') );
		$footerTextColor   = esc_attr( fashe_opt('fashe_footer_color_settings') );
		$anchorcolor 	   = esc_attr( fashe_opt('fashe_footer_anchorcolor_settings') );
		$anchorhovcolor    = esc_attr( fashe_opt('fashe_footer_anchorhovcolor_settings') );
		$widgettitlecolor  = esc_attr( fashe_opt('fashe_footer_widgettitlecolor_settings') );
		$themecolor  	   = esc_attr( fashe_opt('fashe_themecolor') );

        $customcss ="
        	[data-loader='ball-scale'],
        	.select2-container .select2-results__option[aria-selected='true'],
        	.select2-container .select2-results__option--highlighted[aria-selected],
        	.item-menu-mobile,
        	.arrow-slick1:hover,
        	.swal-button,
        	.swal-button:active,
        	.block2-img span.onsale,
			.woocommerce span.onsale,
			.woocommerce #respond input#submit.alt:hover, 
			.woocommerce a.button.alt:hover, 
			.woocommerce button.button.alt:hover, 
			.woocommerce input.button.alt:hover,
			[data-loader='ball-scale'],
			.select2-container .select2-results__option[aria-selected='true'],
			.select2-container .select2-results__option--highlighted[aria-selected],
			.item-menu-mobile,
			.arrow-slick1:hover,
			.swal-button,
			.swal-button:active,
			.block2-img span.onsale,
			.woocommerce span.onsale,
			.woocommerce #respond input#submit.alt:hover, 
			.woocommerce a.button.alt:hover, 
			.woocommerce button.button.alt:hover, 
			.woocommerce input.button.alt:hover{
				background-color: {$themecolor};
			}
			.side-menu .sub-menu a:hover,
			.block2-btn-towishlist .icon_heart,
			.side-menu .sub-menu a:hover,
			li.sale-noti > a,
        	.sub_menu > li:hover > a,
        	.inner-child-fof a:hover,
			a:hover{
				color: {$themecolor};
			}
			.tag-item:hover{
				border-color: {$themecolor};
			}
			.topbar{
				background-color: {$topbarBg};
			}
			.topbar-social-item,
			.topbar-email,
			.topbar-child1{
				color: {$topbarColor};
			}
			.bg-title-page.global-page-header {
				background-image: url( {$headerBg} );
			}
			.bg-title-page .l-text2 {
				color: {$headerTextColor};
			}
			.bg-title-page.global-page-header{
				background-color: {$headerbgcolor}
			}
			#f0f{
				background-color: {$fofbgcolor}
			}
			.inner-child-fof .h1 {
				color: {$foftext1}
			}
			.inner-child-fof a,
			.inner-child-fof p {
				color: {$foftext2}
			}
			footer.bg6{
				background-color: {$footerbgColor};
				color: {$footerTextColor};
			}
			caption,
			footer .s-text8 {
				color: {$footerTextColor};
			}
			.footer-copy-right-text a,
			.footer--widget a{
				color: {$anchorcolor};
			}
			.footer-copy-right-text a:hover,
			.footer--widget a:hover{
				color: {$anchorhovcolor};
			}
			.footer--widget h4.s-text12{
				color: {$widgettitlecolor};
			}


        ";
       
    wp_add_inline_style( 'fashe-common', $customcss );
    
}
add_action( 'wp_enqueue_scripts', 'fashe_common_custom_css', 50 );