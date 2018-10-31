<!-- header fixed -->
<div class="wrap_header fixed-header2 trans-0-4">
	<?php

	// Header Logo
	echo fashe_theme_logo( 'logo' );
	?>
	<!-- Menu -->
	<div class="wrap_menu">
		<nav class="menu">
		<?php
		if ( has_nav_menu( 'primary-menu' ) ) {
			$args = array(
				'theme_location' => 'primary-menu',
				'container'      => '',
				'depth'          => 2,
				'menu_class'     => 'main_menu',
				'fallback_cb'    => 'fashe_bootstrap_navwalker::fallback',
				'walker'         => new fashe_bootstrap_navwalker(),
			);
			wp_nav_menu( $args );
		}
		?>
		</nav>
	</div>

	<!-- Header Icon -->
	<div class="header-icons">
		<?php
		// Header login Icon
		$login_url = fashe_opt( 'fashe_login_url' );
		$cart     = fashe_opt( 'fashe-cart-toggle-settings' );

		if ( $login_url ) :
			?>
		<a href="<?php echo esc_url( $login_url ); ?>" class="header-wrapicon1 dis-block">
			<img src="<?php echo esc_url( FASHE_DIR_ASSETS_URI ); ?>img/icons/icon-header-01.png" class="header-icon1" alt="<?php esc_html_e( 'ICON', 'fashe' ); ?>">
		</a>
			<?php
		endif;
		if ( $cart && $login_url ) {
			echo '<span class="linedivide1"></span>';
		}
		// Cart
		if ( $cart ) {
			fashe_cart_count();
		}
		?>
	</div>
</div>

<!-- top noti -->
<?php
$promotext      = fashe_opt( 'fashe_header_promo_text', __( '20% off everything!', 'fashe' ) );
$promoanchor    = fashe_opt( 'fashe_header_promoanchor_text', __( 'Shop Now', 'fashe' ) );
$promoanchorurl = fashe_opt( 'fashe_header_promoanchor_url', '#' );

if ( $promotext ) :
	?>
<div class="flex-c-m size22 promo-bar bg0 s-text21 pos-relative">
	<?php
	if ( $promotext ) {
		echo wp_kses_post( $promotext );
	}
	//
	if ( $promoanchor && $promoanchorurl ) {
		echo '<a href="' . esc_html( $promoanchorurl ) . '" class="s-text22 hov6 p-l-5">' . esc_html( $promoanchor ) . '</a>';
	}
	?>
	<button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">
		<i class="fa fa-remove fs-13" aria-hidden="true"></i>
	</button>
</div>
	<?php
endif;
?>

<!-- Header -->
<header class="header2">
	<!-- Header desktop -->
	<div class="container-menu-header-v2 p-t-26">
		<div class="topbar2">
			<?php
			// Social Media
			if ( fashe_opt( 'fashe-headersocial-toggle-settings', true ) ) {
				if ( has_nav_menu( 'social-menu' ) ) {
					$args = array(
						'theme_location' => 'social-menu',
						'container'      => '',
						'menu_class'     => 'topbar-social',
						'depth'          => 1,
						'fallback_cb'    => 'fashe_social_navwalker::fallback',
						'walker'         => new fashe_social_navwalker(),
					);
					wp_nav_menu( $args );
				}
			}
			// Header Logo
			echo fashe_theme_logo( 'logo2' );
			?>

			<div class="topbar-child2">
				<?php
				// Email
				$email = fashe_opt( 'fashe_header_top_email', 'fashe@example.com' );

				if ( $email ) {
					echo '<span class="topbar-email">' . esc_html( $email ) . '</span>';
				}
				//  Header Translate
				$header_translate = fashe_opt( 'fashe-headerTranslate-toggle-settings' );
				if ( $header_translate ) :
					?>
				<div id="weglot_here"></div>
					<?php
				endif;
				// Header login Icon
				$login_url = fashe_opt( 'fashe_login_url' );
				$cart     = fashe_opt( 'fashe-cart-toggle-settings' );

				if ( $login_url ) :
					?>

				<a href="<?php echo esc_url( $login_url ); ?>" class="header-wrapicon1 dis-block m-l-30">
					<img src="<?php echo esc_url( FASHE_DIR_ASSETS_URI ); ?>img/icons/icon-header-01.png" class="header-icon1" alt="<?php esc_html_e( 'ICON', 'fashe' ); ?>">
				</a>
					<?php
				endif;
				if ( $cart && $login_url ) {
					echo '<span class="linedivide1"></span>';
				}
				// Cart
				if ( $cart ) {
					fashe_cart_count( 'm-l-13 m-r-13' );
				}
				?>
			</div>
		</div>

		<div class="wrap_header">
			<!-- Menu -->
			<div class="wrap_menu">
				<nav class="menu">
					<?php
					if ( has_nav_menu( 'primary-menu' ) ) {
						$args = array(
							'theme_location' => 'primary-menu',
							'container'      => '',
							'depth'          => 2,
							'menu_class'     => 'main_menu',
							'fallback_cb'    => 'fashe_bootstrap_navwalker::fallback',
							'walker'         => new fashe_bootstrap_navwalker(),
						);
						wp_nav_menu( $args );
					}
					?>
				</nav>
			</div>

			<!-- Header Icon -->
			<div class="header-icons"></div>
		</div>
	</div>

	<!-- Header Mobile -->
	<div class="wrap_header_mobile">
		<?php
		// Logo moblie
		echo fashe_theme_logo( 'logo-mobile' );
		?>

		<!-- Button show menu -->
		<div class="btn-show-menu">
			<!-- Header Icon mobile -->
			<div class="header-icons-mobile">
				<?php
				if ( $login_url ) :
					?>
				<a href="<?php echo esc_url( $login_url ); ?>" class="header-wrapicon1 dis-block">
					<img src="<?php echo esc_url( FASHE_DIR_ASSETS_URI ); ?>img/icons/icon-header-01.png" class="header-icon1" alt="<?php esc_html_e( 'ICON', 'fashe' ); ?>">
				</a>
					<?php
				endif;
				// Divider
				if ( $cart && $login_url ) {
					echo '<span class="linedivide2"></span>';
				}
				// Cart Icon
				if ( $cart ) {
					fashe_cart_count();
				}
				?>
			</div>

			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>
	</div>

	<!-- Menu Mobile -->
	<div class="wrap-side-menu" >
		<nav class="side-menu">
			<ul class="main-menu">
				<?php

				$text = fashe_opt( 'fashe_header_top_text', __( 'Free shipping for standard order over $100', 'fashe' ) );

				if ( $text ) :
					?>
				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<span class="topbar-child1">
						<?php echo esc_html( $text ); ?>
					</span>
				</li>
					<?php
				endif;

				//Header Translate and  Email
				if ( $email || $header_translate ) :
					?>
				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<div class="topbar-child2-mobile">
						<?php
						// Mobile Menu Email
						if ( $email ) {
							echo '<span class="topbar-email">' . esc_html( $email ) . '</span>';
						}
						// Header Translate
						if ( $header_translate ) :
							?>
						<div id="weglot_here"></div>
							<?php
						endif;
						?>
					</div>
				</li>
					<?php
				endif;
				// Mobile social menu
				if ( fashe_opt( 'fashe-headersocial-toggle-settings' ) ) {
					if ( has_nav_menu( 'social-menu' ) ) {

						$args = array(
							'theme_location' => 'social-menu',
							'container'      => '',
							'depth'          => 1,
							'menu_class'     => 'topbar-social-mobile',
							'fallback_cb'    => 'fashe_social_navwalker::fallback',
							'walker'         => new fashe_social_navwalker(),
						);
						echo '<li class="item-topbar-mobile p-l-10">';
						wp_nav_menu( $args );
						echo '</li>';
					}
				}

				?>
			</ul>
			<?php
			if ( has_nav_menu( 'primary-menu' ) ) {
				$args = array(
					'theme_location' => 'primary-menu',
					'container'      => '',
					'depth'          => 2,
					'menu_class'     => 'main-menu mobile-main-menu',
					'fallback_cb'    => 'fashe_mobile_bootstrap_navwalker::fallback',
					'walker'         => new fashe_mobile_bootstrap_navwalker(),
				);
				wp_nav_menu( $args );
			}
			?>
		</nav>
	</div>

</header>
