<?php

$images = fashe_opt( 'fashe-footer-payment-settings' );

?>
<div class="t-center p-l-15 p-r-15 paymentmethod">
	<?php
	if ( is_array( $images ) && count( $images ) > 0 ) {

		foreach ( $images as $img ) {

			$url = '#';
			if ( ! empty( $img['paymenturl'] ) ) {
				$url = $img['paymenturl'];
			}

			if ( ! empty( $img['paymentimg'] ) ) {

				$img_url = $img['paymentimg'];

				echo '<a href="' . esc_url( $url ) . '"><img class="h-size2" src="' . esc_url( $img_url ) . '" alt="' . esc_attr( fashe_image_alt( $img_url ) ) . '"></a>';
			}
		}
	}

	// Copy right text
	$copy_text = sprintf( __( 'Copyright &copy; %s All rights reserved.', 'fashe' ), date( 'Y' ) );

	?>
	<div class="t-center footer-copy-right-text s-text8 p-t-20">
		<?php echo wp_kses_post( fashe_opt( 'fashe-copyright-text-settings', $copy_text ) ); ?>
	</div>
</div>
