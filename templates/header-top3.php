<!-- Header -->
<header class="header3">
	<!-- Header desktop -->
	<div class="container-menu-header-v3">
		<div class="wrap_header3 p-t-74">
			<?php 
			// Header Logo3
			echo fashe_theme_logo('logo3');
			?>

			<!-- Header Icon -->
			<div class="header-icons3 p-t-38 p-b-60 p-l-8">
				<?php 
				// Header login Icon
				$loginUrl = fashe_opt( 'fashe_login_url' );
				$cart = fashe_opt( 'fashe-cart-toggle-settings' );
				
				if( $loginUrl ):
				?>
				<a href="<?php echo esc_url( $loginUrl ); ?>" class="header-wrapicon1 dis-block">
					<img src="<?php echo esc_url( FASHE_DIR_ASSETS_URI ); ?>img/icons/icon-header-01.png" class="header-icon1" alt="<?php esc_html_e( 'ICON', 'fashe' ); ?>">
				</a>
				<?php 
				endif;
				if( $cart && $loginUrl ){
					echo '<span class="linedivide1"></span>';
				}
				// Cart
				if( $cart ){
					fashe_cart_count();
				}
				?>
			</div>
			<div class="wrap_menu">
				<nav class="menu">
				<?php 
				if( has_nav_menu( 'primary-menu' ) ){
				$args = array(
					'theme_location' => 'primary-menu',
					'container' 	 => '',
					'depth'			 => 2,
					'menu_class'     => 'main_menu',
					'fallback_cb'    => 'fashe_bootstrap_navwalker::fallback',
					'walker'    	 => new fashe_bootstrap_navwalker(),
				);  
				wp_nav_menu( $args );
				}
				?>
				</nav>
			</div>
		</div>

		<div class="bottombar flex-col-c p-b-65">
			<?php 
			$socialMenu = fashe_opt('fashe-headersocial-toggle-settings', true );
			// Social Media
			if( $socialMenu ){
				if( has_nav_menu('social-menu') ){
					echo '<div class="bottombar-social t-center p-b-8">';
					$args = array(
						'theme_location' => 'social-menu',
						'container' => '',
						'depth'          => 1,
						'fallback_cb'    => 'fashe_social_navwalker::fallback',
						'walker'    	 => new fashe_social_navwalker(),
					);  
					wp_nav_menu( $args );
					echo '</div>';
				}
			}
			//
			$headerTranslate = fashe_opt('fashe-headerTranslate-toggle-settings');
			if( $headerTranslate ):
			?>

			<div class="bottombar-child2 p-r-20">
				<div id="weglot_here"></div> 
			</div>
			<?php 
			endif;
			?>
		</div>
	</div>

	<!-- Header Mobile -->
	<div class="wrap_header_mobile">
		<?php 
		// Logo moblie
		echo fashe_theme_logo('logo-mobile');
		?>

		<div class="btn-show-menu">
			<!-- Header Icon mobile -->
			<div class="header-icons-mobile">
				<?php 
				if( $loginUrl ):
				?>
				<a href="<?php echo esc_url( $loginUrl ); ?>" class="header-wrapicon1 dis-block">
					<img src="<?php echo esc_url( FASHE_DIR_ASSETS_URI ) ?>img/icons/icon-header-01.png" class="header-icon1" alt="<?php esc_html_e( 'ICON', 'fashe' ); ?>">
				</a>
				<?php
				endif; 
				// Divider
				if( $cart && $loginUrl ){
					echo '<span class="linedivide1"></span>';
				}
				?>
				<span class="linedivide2"></span>

				<?php 
				if( $cart ){
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
				// Header Top Text
				$text = fashe_opt('fashe_header_top_text');
				//  Header Translate
				$headerTranslate = fashe_opt('fashe-headerTranslate-toggle-settings');
				// Email
				$email = fashe_opt( 'fashe_header_top_email' );
				//
				if( $text ):
				?>
				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<span class="topbar-child1"><?php echo esc_html( $text ); ?></span>
				</li>
				<?php 
				endif;
				//
				if( $headerTranslate || $email ):
				?>

				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<div class="topbar-child2-mobile">
						<?php 
						if( $email ):
						?>
						<span class="topbar-email"><?php echo esc_html( $email ); ?></span>
						<?php 
						endif;
						//
						if( $headerTranslate ):
						?>
						<div id="weglot_here"></div> 
						<?php 
						endif;
						?>
					</div>
				</li>
				<?php 
				endif;
				// Social Media
				if( $socialMenu ):
				?>
				<li class="item-topbar-mobile p-l-10">
					<?php 
					
						if( has_nav_menu('social-menu') ){
							echo '<div class="topbar-social-mobile">';
							$args = array(
								'theme_location' => 'social-menu',
								'container' => '',
								'depth'          => 1,
								'fallback_cb'    => 'fashe_social_navwalker::fallback',
								'walker'    	 => new fashe_social_navwalker(),
							);  
							wp_nav_menu( $args );
							echo '</div>';
						}
					?>
				</li>
				<?php 
				endif;
				?>
			</ul>
			<?php 
			if( has_nav_menu( 'primary-menu' ) ){
				$args = array(
					'theme_location' => 'primary-menu',
					'container' 	 => '',
					'depth'			 => 2,
					'menu_class'     => 'main-menu mobile-main-menu',
					'fallback_cb'    => 'fashe_mobile_bootstrap_navwalker::fallback',
					'walker'    	 => new fashe_mobile_bootstrap_navwalker(),
				);  
				wp_nav_menu( $args );
			}
			?>

		</nav>
	</div>
</header>