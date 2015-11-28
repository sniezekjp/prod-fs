<?php
/**
 * Review order form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<?php if ( ! is_ajax() ) : ?><div id="order_review"><?php endif; ?>

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
			<div class="cart-subtotal row">
				<strong><?php _e( 'Cart Subtotal', 'Twoot' ); ?></strong>
				<?php echo WC()->cart->get_cart_subtotal(); ?>
			</div>

			<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<div class="discount row coupon-<?php echo esc_attr( $code ); ?>">
				<strong><?php wc_cart_totals_coupon_label( $coupon ); ?></strong>
				<?php wc_cart_totals_coupon_html( $coupon ); ?>
			</div>
			<?php endforeach; ?>

			<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

				<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

				<div class="shipping">
					<?php wc_cart_totals_shipping_html(); ?>
				</div>

				<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

			<?php endif; ?>

			<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
				<div class="fee row">
					<strong><?php echo esc_html( $fee->name ); ?></strong>
					<?php wc_cart_totals_fee_html( $fee ); ?>
				</div>
			<?php endforeach; ?>

			<?php if ( WC()->cart->tax_display_cart === 'excl' ) : ?>
				<?php if ( get_option( 'woocommerce_tax_total_display' ) === 'itemized' ) : ?>
					<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
						<div class="row tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
							<strong><?php echo esc_html( $tax->label ); ?></strong>
							<?php echo wp_kses_post( $tax->formatted_amount ); ?>
						</div>
					<?php endforeach; ?>
				<?php else : ?>
					<div class="row tax-total">
						<strong><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></strong>
						<?php echo wc_price( WC()->cart->get_taxes_total() ); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

			<div class="row total">
				<strong><?php _e( 'Order Total', 'Twoot' ); ?></strong>
				<?php echo WC()->cart->get_total(); ?>
			</div>

			<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
			<?php
		}

		do_action( 'woocommerce_review_order_after_cart_contents' );
	?>
	</div>

	<?php echo woocommerce_checkout_payment(); ?>

</div>
