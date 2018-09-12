<div class="flex-w p-b-40">
		<?php 
		// Footer Widget Start

		// Footer widget 1
		if( is_active_sidebar( 'footer-1' ) ){
			echo '<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">';
				dynamic_sidebar( 'footer-1' );
			echo '</div>';
		}

		// Footer widget 2
		if( is_active_sidebar( 'footer-2' ) ){
			echo '<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">';
				dynamic_sidebar( 'footer-2' );
			echo '</div>';
		}

		// Footer widget 3
		if( is_active_sidebar( 'footer-3' ) ){
			echo '<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">';
				dynamic_sidebar( 'footer-3' );
			echo '</div>';
		}
		
		// Footer widget 4
		if( is_active_sidebar( 'footer-4' ) ){
			echo '<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">';
				dynamic_sidebar( 'footer-4' );
			echo '</div>';
		}
		
		// Footer widget 5
		if( is_active_sidebar( 'footer-5' ) ){
			echo '<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">';
				dynamic_sidebar( 'footer-5' );
			echo '</div>';
		}
		
		?>
</div>
