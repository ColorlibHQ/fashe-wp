<header class="header1">
<div class="container-menu-header">
	<div class="topbar">
		<?php 
		// Social Media
		if( fashe_opt('fashe-headersocial-toggle-settings') ){
			if( has_nav_menu('social-menu') ){	
				$args = array(
					'theme_location' => 'social-menu',
					'container' => '',
					'menu_class'     => 'topbar-social',
					'depth'          => 1,
					'fallback_cb'    => 'fashe_social_navwalker::fallback',
					'walker'    	 => new fashe_social_navwalker(),
				);  
				wp_nav_menu( $args );
			}
		}
		// Header Top Text
		$text = fashe_opt('fashe_header_top_text');
		if( $text ){
			echo '<span class="topbar-child1">'.esc_html( $text ).'</span>';
		}
		
		?>
		<div class="topbar-child2">
			<?php 
			// Email
			$email = fashe_opt( 'fashe_header_top_email' );
			if( $email ){
				echo '<span class="topbar-email">'.esc_html( $email ).'</span>';
			}
			//  Header Translate
			$headerTranslate = fashe_opt('fashe-headerTranslate-toggle-settings');
			if( $headerTranslate ):
			?>
			<div id="weglot_here"></div> 
			<?php 
			endif;
			?>
		</div>
	</div>

	<div class="wrap_header">
		<?php 
		// Header Logo
		echo fashe_theme_logo('logo');
		?>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
			<?php 
			if( has_nav_menu( 'primary-menu' ) ){
				$args = array(
					'theme_location' => 'primary-menu',
					'container' => '',
					'depth'          => 2,
					'menu_class'     => 'main_menu',
					'fallback_cb'    => 'fashe_bootstrap_navwalker::fallback',
					'walker'    	 => new fashe_bootstrap_navwalker(),
				);  
				wp_nav_menu( $args );
			}
			?>
			</nav>
		</div>

		<div class="header-icons">
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
	</div>
</div>

<!-- Header Mobile -->
<div class="wrap_header_mobile">
	<?php 
	// Logo moblie
	echo fashe_theme_logo('logo-mobile');
	?>

	<!-- Button show menu -->
	<div class="btn-show-menu">
		<!-- Header Icon mobile -->
		<div class="header-icons-mobile">
			<?php 
			if( $loginUrl ):
			?>
			<a href="#" class="header-wrapicon1 dis-block">
				<img src="<?php echo esc_url( FASHE_DIR_ASSETS_URI ); ?>img/icons/icon-header-01.png" class="header-icon1" alt="ICON">
			</a>
			<?php 
			endif;
			// Divider
			if( $cart && $loginUrl ){
				echo '<span class="linedivide2"></span>';
			}
			// Cart Icon
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
			if( $text ):
			?>
			<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
				<span class="topbar-child1">
					<?php echo esc_html( $text ); ?>
				</span>
			</li>
			<?php 
			endif;
			
			//Header Translate and  Email
			if( $email || $headerTranslate ):
			?>
			<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
				<div class="topbar-child2-mobile">
					<?php 
					// Mobile Menu Email
					if( $email ){
						echo '<span class="topbar-email">'.esc_html( $email ).'</span>';
					}
					// Header Translate
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
			// Mobile social menu
			if( fashe_opt('fashe-headersocial-toggle-settings') ){
				if( has_nav_menu('social-menu') ){	
				
					$args = array(
						'theme_location' => 'social-menu',
						'container' => '',
						'depth'          => 1,
						'menu_class'     => 'topbar-social-mobile',
						'fallback_cb'    => 'fashe_social_navwalker::fallback',
						'walker'    	 => new fashe_social_navwalker(),
					);  
					echo '<li class="item-topbar-mobile p-l-10">';
					wp_nav_menu( $args );
					echo '</li>';
				}
			}
			
			?>
		</ul>
		<?php
		if( has_nav_menu('primary-menu') ){
			$args = array(
				'theme_location' => 'primary-menu',
				'container'		 => '',
				'depth'          => 2,
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