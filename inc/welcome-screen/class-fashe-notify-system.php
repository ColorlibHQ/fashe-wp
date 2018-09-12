<?php

if ( ! class_exists( 'Fashe_Notify_System' ) ) {
	/**
	 * Class Fashe_Notify_System
	 */
	class Fashe_Notify_System extends Epsilon_Notify_System {
		/**
		 * @param $ver
		 *
		 * @return mixed
		 */
		public static function fashe_version_check( $ver ) {
			$fashe = wp_get_theme();

			return version_compare( $fashe['Version'], $ver, '>=' );
		}

		/**
		 * @return bool
		 */
		public static function fashe_is_not_static_page() {
			return 'page' == get_option( 'show_on_front' ) ? true : false;
		}


		/**
		 * @return bool
		 */
		public static function fashe_has_content() {
			$option = get_option( 'fashe_imported_demo', false );
			if ( $option ) {
				return true;
			};

			return false;
		}

		/**
		 * @return bool|mixed
		 */
		public static function fashe_check_import_req() {
			$needs = array(
				'has_content' => self::fashe_has_content(),
				'has_plugin'  => self::fashe_has_plugin( 'fashe-companion' ),
			);

			if ( $needs['has_content'] ) {
				return true;
			}

			if ( $needs['has_plugin'] ) {
				return false;
			}

			return true;
		}

		/**
		 * @return bool
		 */
		public static function fashe_check_plugin_is_installed( $slug ) {
			$slug2 = $slug;
			if ( 'wordpress-seo' === $slug ) {
				$slug2 = 'wp-seo';
			}

			$path = WPMU_PLUGIN_DIR . '/' . $slug . '/' . $slug2 . '.php';
			if ( ! file_exists( $path ) ) {
				$path = WP_PLUGIN_DIR . '/' . $slug . '/' . $slug2 . '.php';

				if ( ! file_exists( $path ) ) {
					$path = false;
				}
			}

			if ( file_exists( $path ) ) {
				return true;
			}

			return false;
		}

		/**
		 * @return bool
		 */
		public static function fashe_check_plugin_is_active( $slug ) {
			$slug2 = $slug;
			if ( 'wordpress-seo' === $slug ) {
				$slug2 = 'wp-seo';
			}

			$path = WPMU_PLUGIN_DIR . '/' . $slug . '/' . $slug2 . '.php';
			if ( ! file_exists( $path ) ) {
				$path = WP_PLUGIN_DIR . '/' . $slug . '/' . $slug2 . '.php';
				if ( ! file_exists( $path ) ) {
					$path = false;
				}
			}

			if ( file_exists( $path ) ) {
				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

				return is_plugin_active( $slug . '/' . $slug2 . '.php' );
			}
		}

		public static function fashe_has_plugin( $slug = null ) {

			$check = array(
				'installed' => self::check_plugin_is_installed( $slug ),
				'active'    => self::check_plugin_is_active( $slug ),
			);

			if ( ! $check['installed'] || ! $check['active'] ) {
				return false;
			}

			return true;
		}

		public static function fashe_companion_title() {
			$installed = self::check_plugin_is_installed( 'fashe-companion' );
			if ( ! $installed ) {
				return esc_html__( 'Install: Fashe Companion Plugin', 'fashe' );
			}

			$active = self::check_plugin_is_active( 'fashe-companion' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Activate: Fashe Companion Plugin', 'fashe' );
			}

			return esc_html__( 'Install: Fashe Companion Plugin', 'fashe' );
		}

		public static function fashe_elementor_title() {
			$installed = self::check_plugin_is_installed( 'elementor' );
			if ( ! $installed ) {
				return esc_html__( 'Install: Elementor Page Builder Plugin', 'fashe' );
			}

			$active = self::check_plugin_is_active( 'elementor' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Activate: Elementor Page Builder Plugin', 'fashe' );
			}

			return esc_html__( 'Install: Elementor Page Builder Plugin', 'fashe' );
		}

		public static function fashe_weglot_title() {
			$installed = self::check_plugin_is_installed( 'weglot' );
			if ( ! $installed ) {
				return esc_html__( 'Install: Weglot Translate Plugin', 'fashe' );
			}

			$active = self::check_plugin_is_active( 'wordpress-seo' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Activate: Weglot Translate Plugin', 'fashe' );
			}

			return esc_html__( 'Install: Weglot Translate Plugin', 'fashe' );
		}

		public static function fashe_woocommerce_title() {
			$installed = self::check_plugin_is_installed( 'woocommerce' );
			if ( ! $installed ) {
				return esc_html__( 'Install: WooCommerce', 'fashe' );
			}

			$active = self::check_plugin_is_active( 'woocommerce' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Activate: WooCommerce', 'fashe' );
			}

			return esc_html__( 'Install: WooCommerce', 'fashe' );
		}

		public static function fashe_cf7_title() {
			$installed = self::check_plugin_is_installed( 'contac-form-7' );
			if ( ! $installed ) {
				return esc_html__( 'Install: Contact Form 7', 'fashe' );
			}

			$active = self::check_plugin_is_active( 'contac-form-7' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Activate: Contact Form 7', 'fashe' );
			}

			return esc_html__( 'Install: Contact Form 7', 'fashe' );
		}

		public static function fashe_oneclick_title() {
			$installed = self::check_plugin_is_installed( 'one-click-demo-import' );
			if ( ! $installed ) {
				return esc_html__( 'Install: One Click Demo Import', 'fashe' );
			}

			$active = self::check_plugin_is_active( 'one-click-demo-import' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Activate: One Click Demo Import', 'fashe' );
			}

			return esc_html__( 'Install: One Click Demo Import', 'fashe' );
		}

		/**
		 * @return string
		 */
		public static function fashe_companion_description() {
			$installed = self::check_plugin_is_installed( 'fashe-companion' );

			if ( ! $installed ) {
				return esc_html__( 'Please install Fashe Companion plugin.', 'fashe' );
			}

			$active = self::check_plugin_is_active( 'fashe-companion' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Please activate Fashe Companion plugin.', 'fashe' );
			}

			return esc_html__( 'Please install Fashe Companion plugin.', 'fashe' );
		}

		/**
		 * @return string
		 */
		public static function fashe_woocommerce_description() {
			$installed = self::check_plugin_is_installed( 'woocommerce' );

			if ( ! $installed ) {
				return esc_html__( 'Please install WooCommerce. Note that you won\'t be able to use the shop without it.', 'fashe' );
			}

			$active = self::check_plugin_is_active( 'woocommerce' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Please activate WooCommerce. Note that you won\'t be able to use the shop without it.', 'fashe' );
			}

			return esc_html__( 'Please install WooCommerce. Note that you won\'t be able to use the shop without it.', 'fashe' );
		}

		public static function fashe_cf7_description() {
			$installed = self::check_plugin_is_installed( 'contac-form-7' );

			if ( ! $installed ) {
				return esc_html__( 'Please install Contact Form 7. Note that you won\'t be able to use Contact Form without it.', 'fashe' );
			}

			$active = self::check_plugin_is_active( 'contac-form-7' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Please activate Contact Form 7. Note that you won\'t be able to use Contact Form without it.', 'fashe' );
			}

			return esc_html__( 'Please install Contact Form 7. Note that you won\'t be able to use Contact Form without it.', 'fashe' );
		}

		public static function fashe_elementor_description() {
			$installed = self::check_plugin_is_installed( 'elementor' );
			if ( ! $installed ) {
				return esc_html__( 'Please install Elementor page builder plugin.', 'fashe' );
			}

			$active = self::check_plugin_is_active( 'elementor' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Please activate Elementor page builder plugin.', 'fashe' );
			}

			return esc_html__( 'Please install Elementor page builder plugin.', 'fashe' );

		}

		public static function fashe_weglot_description() {
			$installed = self::check_plugin_is_installed( 'weglot' );
			if ( ! $installed ) {
				return esc_html__( 'Please install Weglot Translate plugin.', 'fashe' );
			}

			$active = self::check_plugin_is_active( 'weglot' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Please activate Weglot Translate plugin.', 'fashe' );
			}

			return esc_html__( 'Please install Weglot Translate plugin.', 'fashe' );

		}

		public static function fashe_oneclick_description() {
			$installed = self::check_plugin_is_installed( 'one-click-demo-import' );
			if ( ! $installed ) {
				return esc_html__( 'Please install One Click Demo Import plugin to import demo data.', 'fashe' );
			}

			$active = self::check_plugin_is_active( 'one-click-demo-import' );
			if ( $installed && ! $active ) {
				return esc_html__( 'Please activate One Click Demo Import plugin to import demo data.', 'fashe' );
			}

			return esc_html__( 'Please install One Click Demo Import plugin to import demo data.', 'fashe' );

		}

		/**
		 * @return bool
		 */
		public static function fashe_is_not_template_front_page() {
			$page_id = get_option( 'page_on_front' );

			return get_page_template_slug( $page_id ) == 'page-templates/frontpage-template.php' ? true : false;
		}
	}
}// End if().
