<?php 

$images = fashe_opt( 'fashe-footer-payment-settings' );


?>
<div class="t-center p-l-15 p-r-15 paymentmethod">
	<?php 
	if( is_array( $images ) && count( $images ) > 0 ){
		
		foreach( $images as $img ){
			
			$url = '#';
			if( !empty( $img['paymenturl'] ) ){
				$url = $img['paymenturl'];
			}
			
			if( !empty( $img['paymentimg'] ) ){
				
				$imgUrl = $img['paymentimg'];
				
				echo '<a href="'.esc_url( $url ).'"><img class="h-size2" src="'.esc_url( $imgUrl ).'" alt="'.esc_attr( fashe_image_alt( $imgUrl ) ).'"></a>';
			}
			
		}
		
	}

	// Copy right text
	$copyText = sprintf( __( 'Copyright &copy; %s All rights reserved. | This template is made with', 'fashe' ), date('Y') );
	
	$by = esc_html__( 'by', 'fashe' );
	
	$setCopyright = fashe_opt('fashe-copyright-text-settings');
	
	if( $setCopyright ){
		$copyText = $setCopyright;
	}
		
	$copyRightText = sprintf( ' %s <i class="fa fa-heart-o" aria-hidden="true"></i> %s <a href="%s" target="_blank">Colorlib</a>', $copyText, $by, 'https://colorlib.com' );
	
	?>
	<div class="t-center footer-copy-right-text s-text8 p-t-20">
		<?php 
		echo wp_kses_post( $copyRightText );
		?>
	</div>
</div>
