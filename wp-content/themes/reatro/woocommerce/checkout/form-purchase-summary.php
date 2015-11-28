<?php
/**
 * Checkout login form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

global $woocommerce;
?>

<div class="purchase-summary">
<h2><?php _e( 'Purchase Summary', 'Twoot' ); ?></h2>

<?php
	do_action( 'woocommerce_review_order_before_cart_contents' );

	if (sizeof(WC()->cart->get_cart())>0) {

		echo '<ul>';

		foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
			$_product = $cart_item['data'];

			if ($_product->exists() && $cart_item['quantity']>0) {
				echo '<li class="product-item clearfix">';
				echo '<div class="product-img">'.$_product->get_image().'</div>';
				echo '<div class="product-info">';
				echo '<h3 class="product-title">'.apply_filters( 'woocommerce_checkout_product_title', $_product->get_title(), $_product ).'</h3>';
				echo apply_filters( 'woocommerce_checkout_item_quantity', '<div class="product-quantity"><strong>'.esc_attr__('Qty:', 'Twoot').'</strong>' . $cart_item['quantity'] . '</div>', $cart_item, $cart_item_key );
				echo '<div class="product-price"><strong>'.esc_attr__('Price:', 'Twoot').'</strong>' .woocommerce_price($_product->get_price()).'</div>';
				if(WC()->cart->get_item_data( $cart_item )) { echo '<div class="product-variation">'.WC()->cart->get_item_data( $cart_item ).'</div>'; }
				echo '<div class="product-total"><strong>'.esc_attr__('Total:', 'Twoot').'</strong>' .apply_filters( 'woocommerce_checkout_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ).'</div>';
				echo '</div>';
				echo '</li>';
			}
		}

		echo '</ul>';

		?>
		<div class="row total"><strong><?php _e( 'Cart Subtotal', 'Twoot' ); ?></strong><?php echo WC()->cart->get_cart_subtotal(); ?></div>

		<?php
	}

	do_action( 'woocommerce_review_order_after_cart_contents' );
?>
</div>