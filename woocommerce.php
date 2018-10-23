<?php 
/**
 * @Packge 	   : Fashe
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 get_header();
 
 ?>
 
	<!-- Content page -->
	<section class="fashe-woo bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<?php 
				// sidebar
				$col = '12';
				if( !is_product() ){
					get_sidebar( 'woo' );
					$col = '9';
				}
				
				?>
				<div class="col-sm-6 col-md-8 col-lg-<?php echo esc_attr( $col ); ?> p-b-50">
				<?php 
				if( have_posts() ){
					
					// Woocommerce Content
					woocommerce_content();
				
				}else{
					get_template_part( 'templates/content', 'none' );
				}
				
				?>
				</div>
				
			</div>
		</div>
	</section>
	<?php 
	//Relate Product
	if( is_product() && fashe_opt( 'fashe-woo-related-product-settings' ) ):
	?>
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
		<?php 
		woocommerce_output_related_products();
		?>
		</div>
	</section>
	<?php 
	endif;
	?>

<?php
 get_footer();
?>