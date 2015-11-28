<?php
/**
 * Cart totals
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="cart_totals <?php if ( WC()->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h2><?php _e( 'Cart Totals:', 'Twoot' ); ?></h2>

	<ul>
		<li class="cart-subtotal">
			<strong><?php _e( 'Cart Subtotal', 'Twoot' ); ?></strong>
			<span><?php wc_cart_totals_subtotal_html(); ?></span>
		</li>

		<?php foreach ( WC()->cart->get_coupons( 'cart' ) as $code => $coupon ) : ?>
		<li class="cart-discount coupon-<?php echo esc_attr( $code ); ?>">
			<strong><?php _e( 'Coupon:', 'Twoot' ); ?> <?php echo esc_html( $code ); ?></strong>
			<span><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
		</li>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<li class="cart-totals">
				<?php wc_cart_totals_shipping_html(); ?>
			</li>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
		<li class="fee">
			<strong><?php echo esc_html( $fee->name ); ?></strong>
			<span><?php wc_cart_totals_fee_html( $fee ); ?></span>
		</li>
		<?php endforeach; ?>


		<?php if ( WC()->cart->tax_display_cart == 'excl' ) : ?>
			<?php if ( get_option( 'woocommerce_tax_total_display' ) == 'itemized' ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
					<li class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
						<strong><?php echo esc_html( $tax->label ); ?></strong>
						<span><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
					</li>
				<?php endforeach; ?>
			<?php else : ?>
				<li class="tax-total">
					<strong><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></strong>
					<span><?php echo wc_price( WC()->cart->get_taxes_total() ); ?></span>
				</li>
			<?php endif; ?>
		<?php endif; ?>


		<?php foreach ( WC()->cart->get_coupons( 'order' ) as $code => $coupon ) : ?>
			<li class="order-discount coupon-<?php echo esc_attr( $code ); ?>">
				<strong><?php _e( 'Coupon:', 'Twoot' ); ?> <?php echo esc_html( $code ); ?></strong>
				<span><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
			</li>
		<?php endforeach; ?>


		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<li class="order-total">
			<strong><?php _e( 'Order Total', 'Twoot' ); ?></strong>
			<span><?php wc_cart_totals_order_total_html(); ?></span>
		</li>

		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>


	</ul>

	<?php if ( WC()->cart->get_cart_tax() ) : ?>
		<p><small><?php

			$estimated_text = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
				? sprintf( ' ' . __( ' (taxes estimated for %s)', 'Twoot' ), WC()->countries->estimated_for_prefix() . __( WC()->countries->countries[ WC()->countries->get_base_country() ], 'Twoot' ) )
				: '';

			printf( __( 'Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'Twoot' ), $estimated_text );

		?></small></p>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>