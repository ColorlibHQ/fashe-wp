<?php 
/**
 * @Packge     : Fashe
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit( 'Direct script access denied.' );
    }

	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

    //Shop page product title
    remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);

    //Remove before after link
    remove_action ('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
    remove_action ('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

	// Woocommerce Check
	if ( ! function_exists( 'fashe_is_wc_activated' ) ) {
		function fashe_is_wc_activated() {
			if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
		}
	}
	// Woocommerce Check
	if ( ! function_exists( 'fashe_is_cca_page' ) ) {
		function fashe_is_cca_page() {
			if(  fashe_is_wc_activated() && ( is_cart() || is_checkout() || is_account_page() ) ){
				return true;
			}else{
				return false;
			}
		}
	}
	// related products number
	add_filter( 'woocommerce_output_related_products_args', 'fashe_change_number_related_products', 9999 );
 
	function fashe_change_number_related_products( $args ) {

        $number = 4;

        if( fashe_opt( 'fashe_related_product_number' ) ){

            $number = fashe_opt( 'fashe_related_product_number' );

        }

		$args['posts_per_page'] = absint( $number ); // # of related products

		return $args;
	}
	// product page before add to cart form
	add_action( 'woocommerce_before_add_to_cart_form', 'fashe_before_add_to_cart_form' );
	function fashe_before_add_to_cart_form(){
		echo '<div class="p-t-33 p-b-60">';
	}
	// product page after add to cart form
	add_action( 'woocommerce_after_add_to_cart_form', 'fashe_after_add_to_cart_form' );
	function fashe_after_add_to_cart_form(){
		echo '</div>';
	}

    /**
     *
     * Shop loop item title
     */

    add_action('woocommerce_shop_loop_item_title','fashe_woocommerce_item_title',10);

    function fashe_woocommerce_item_title() {
    ?>
       <a href="<?php the_permalink(); ?>" class="block2-name dis-block s-text3 p-b-5"><?php the_title(); ?></a>
    <?php
    }
	
    /**
     *
     * header cart count 
     */

    function fashe_woocommerce_header_add_to_cart_fragment($fragments) {

        ob_start();

        ?>
        <span class="header-icons-noti"><?php echo sprintf('%d', WC()->cart->cart_contents_count); ?></span>

        <?php

        $fragments['.header-wrapicon2 .header-icons-noti'] = ob_get_clean();

        return $fragments;
    }

    add_filter('woocommerce_add_to_cart_fragments', 'fashe_woocommerce_header_add_to_cart_fragment');


    /**
     * fashe_hide_page_title
     *
     * Removes the "shop" title on the main shop page
     */
    
    add_filter( 'woocommerce_show_page_title' , 'fashe_hide_page_title' );

    function fashe_hide_page_title() {

        if( !fashe_opt('fashe-woo-shoppage-title-settings') ){
            $title = false;
        }else{
            $title = true;
        }

    	return $title;
    	
    }
    /**
     *
     * Removes the product page tab description heading
     */
    add_filter( 'woocommerce_product_description_heading', 'fashe_product_description_heading' );

    function fashe_product_description_heading(){
    	return false;
    }

    /**
     *
     * Removes the product page tab additional information heading
     */
    add_filter( 'woocommerce_product_additional_information_heading', 'fashe_product_additional_information_heading' );

    function fashe_product_additional_information_heading(){
    	return false;
    }

    /**
     *
     * Shop Page Product per page
     *
     */
    add_filter( 'loop_shop_per_page', 'fashe_loop_shop_per_page', 20 );
    function fashe_loop_shop_per_page( $cols ) {

      // Return the number of products you wanna show per page.
      
        if( fashe_opt( 'fashe_woo_product_perpage' ) ){

            $num = fashe_opt( 'fashe_woo_product_perpage' );
            
        }else{

            $num = 10;
        }
      
      $cols = absint( $num );

      return $cols;
    }

?>