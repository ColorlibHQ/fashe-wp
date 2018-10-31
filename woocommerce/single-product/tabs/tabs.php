<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<?php
	$i = 0;
	foreach ( $tabs as $key => $tab ) :
		$active = ' bo7';
		if ( $i == 0 ) {
			$active = ' active-dropdown-content bo6';
		}

		?>
	<div class="wrap-dropdown-content p-t-15 p-b-14<?php echo esc_attr( $active ); ?>">
		<h5 class="<?php echo esc_attr( $key ); ?>_tab js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4" id="dropdown-title-<?php echo esc_attr( $key ); ?>">
			<?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?>
			<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
			<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
		</h5>

		<div class="dropdown-content dis-none p-t-15 p-b-23" id="dropdown-<?php echo esc_attr( $key ); ?>">

			<?php
			if ( isset( $tab['callback'] ) ) {
				call_user_func( $tab['callback'], $key, $tab ); }
			?>

		</div>
	</div>
		<?php
		$i++;
	endforeach;
	?>


<?php endif; ?>
