<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

wc_print_notices();
?>

<?php do_action( 'woocommerce_before_cart' ); ?>
<div class="woocommerce-cart-wrap outer clearfix">

	<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">
	<div class="woocommerce-cart-table column seven">
		<div class="inner">
		<?php do_action( 'woocommerce_before_cart_table' ); ?>
		<table class="shop_table cart" cellspacing="0">
			<thead>
				<tr>
					<th class="product-thumbnail">&nbsp;</th>
					<th class="product-name"><?php _e( 'Product', 'Twoot' ); ?></th>
					<th class="product-quantity"><?php _e( 'Quantity', 'Twoot' ); ?></th>
					<th class="product-subtotal"><?php _e( 'Total', 'Twoot' ); ?></th>
					<th class="product-remove">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>
			<?php
			if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product     = $cart_item['data'];
					$product_id   = $cart_item['product_id'];
					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) {
						?>
						<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

							<!-- The thumbnail -->
							<td class="product-thumbnail">
								<?php
									$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

									if ( ! $_product->is_visible() )
										echo $thumbnail;
									else
										printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
								?>
							</td>

							<!-- Product Name -->
							<td class="product-info">
								<?php
									echo '<div class="product-name">';
									if ( ! $_product->is_visible() )
										echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
									else
										echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );
									echo '</div>';

									echo '<div class="product-price">';
									echo '<strong>'.__( 'Price:', 'Twoot' ).'</strong>';
									echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
									echo '</div>';
					

									// Meta data
									echo WC()->cart->get_item_data( $cart_item );

									// Backorder notification
									if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
										echo '<p class="backorder_notification">' . __( 'Available on backorder', 'Twoot' ) . '</p>';
								?>
							</td>


							<!-- Quantity inputs -->
							<td class="product-quantity">
								<?php
									if ( $_product->is_sold_individually() ) {
										$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
									} else {
										$product_quantity = woocommerce_quantity_input( array(
											'input_name'  => "cart[{$cart_item_key}][qty]",
											'input_value' => $cart_item['quantity'],
											'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
										), $_product, false );
									}

									echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
								?>
							</td>

							<!-- Product subtotal -->
							<td class="product-subtotal">
								<?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
								?>
							</td>

							<!-- Remove from cart link -->
							<td class="product-remove">
								<?php
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><i class="twoot-icon-cancel-circled-outline"></i></a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'Twoot' ) ), $cart_item_key );
								?>
							</td>
						</tr>
						<?php
					}
				}
			}
			?>
			<?php do_action( 'woocommerce_cart_contents' ); ?>
			</tbody>
		</table>
		<?php do_action( 'woocommerce_after_cart_table' ); ?>

		</div>
	</div>

	<div class="woocommerce-cart-table sidebar-right column five">
	<div class="inner">

		<?php if ( WC()->cart->coupons_enabled() ) { ?>
			<div class="coupon">

				<h3><?php _e( 'Coupon:', 'Twoot' ); ?></h3> 
				<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php _e( 'Coupon code', 'Twoot' ); ?>" /><input type="submit" class="button" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'Twoot' ); ?>" />

				<?php do_action('woocommerce_cart_coupon'); ?>
			</div>
		<?php } ?>

		<?php woocommerce_cart_totals(); ?>

		<input type="submit" class="button" name="update_cart" value="<?php _e( 'Update Cart', 'Twoot' ); ?>" /> 
		<?php do_action( 'woocommerce_cart_actions' ); ?>
		<?php wp_nonce_field( 'woocommerce-cart' ); ?>

		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>

		<div class="cart-collaterals">
			<?php woocommerce_shipping_calculator(); ?>
		</div>

	</div>
	</div>
	</form>

</div>


<?php do_action( 'woocommerce_after_cart' ); ?>