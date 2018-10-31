<?php
// Title Page
if ( ! is_single() ) :

	if ( fashe_is_wc_activated() && is_shop() ) {
		$id = get_option( 'woocommerce_shop_page_id' );
	} else {
		$id = get_the_ID();
	}

	$bgopt = get_post_meta( $id, '_fashe_header_bg', true );

	$glob_class = 'global-page-header';
	$setbgurl  = '';

	if ( $bgopt == 'featured' ) {
		$setbgurl  = get_the_post_thumbnail_url( $id );
		$glob_class = '';
	}

	?>
<section class="bg-title-page <?php echo esc_attr( $glob_class ); ?> p-t-40 p-b-50 flex-col-c-m" <?php echo fashe_inline_bg_img( $setbgurl ); ?>>
	<?php
	if ( fashe_is_wc_activated() && is_shop() ) {
		echo '<h2 class="l-text2 t-center">';
				woocommerce_page_title();
		echo '</h2>';
	} else {
		if ( is_archive() ) {
			the_archive_title( '<h2 class="l-text2 t-center">', '</h2>' );
		} elseif ( is_home() ) {
			echo '<h2 class="l-text2 t-center">' . esc_html__( 'Blog', 'fashe' ) . '</h2>';
		} elseif ( is_search() ) {
			echo '<h2 class="l-text2 t-center">' . esc_html__( 'Search Result', 'fashe' ) . '</h2>';
		} else {
			the_title( '<h2 class="l-text2 t-center">', '</h2>' );
		}
	}

	?>
</section>
	<?php
else :
	?>
	<?php
	fashe_breadcrumbs();

endif;
?>
