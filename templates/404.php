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


?>

	<div id="f0f" class="pd--100-0">
		<div class="container">
			<div class="row">
				<div class="f0f--content text-center col-md-12">
					<div class="inner-fof">
						<div class="inner-child-fof">
							<?php
							$error_text = esc_html__( 'Ooops 404 Error !', 'fashe' );
							if ( fashe_opt( 'fashe_fof_text_one' ) ) {
								$error_text = fashe_opt( 'fashe_fof_text_one' );
							}
							//
							echo '<h1 class="h1 m-b-30">' . esc_html( $error_text ) . '</h1>';
							//

							// Wrong text block
							$wrong_text = wp_kses_post( __( 'Either something went wrong or the page dosen&rsquo;t exist anymore.', 'fashe' ) );
							$goto_text  = esc_html__( 'Go to', 'fashe' );

							if ( fashe_opt( 'fashe_fof_text_two' ) ) {
								$wrong_text = fashe_opt( 'fashe_fof_text_two' );
							}

							$anchor = fashe_anchor_tag(
								array(
									'url'  => esc_url( site_url( '/' ) ),
									'text' => esc_html__( 'Home page', 'fashe' ),
								)
							);

							echo fashe_paragraph_tag(
								array(
									'text' => sprintf( '%s %s %s', esc_html( $wrong_text ), esc_html( $goto_text ), wp_kses_post( $anchor ) ),
								)
							);

							// Search Form
							get_search_form();
							?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
