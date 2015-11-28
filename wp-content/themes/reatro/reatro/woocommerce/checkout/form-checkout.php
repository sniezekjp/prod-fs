<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


// redirect to checkout step
if (!isset($_GET['checkout_step'])) {
	if (is_user_logged_in()) {
		$url = add_query_arg( array ( 'checkout_step' => 2 ) );
	} else {
		$url = add_query_arg( array ( 'checkout_step' => 1 ) );
	}
	wp_redirect( $url );
	exit;
} else {
	if ($_GET['checkout_step'] == 1 && is_user_logged_in()) {
		wp_redirect( add_query_arg( array ( 'checkout_step' => 2 )  ) );
	}
}

global $woocommerce;

wc_print_notices();

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'Twoot' ) );
	return;
}

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>


<div class="woocommerce-checkout-step clearfix outer">

	<?php if ($_GET['checkout_step'] == 1 && !is_user_logged_in()) : ?>

		<div class="entry-checkout column seven">
		<div class="inner">

			<div class="checkout-customer">
				<?php
					woocommerce_get_template('checkout/form-login.php', array(
						'message'  => __( 'If you have shopped with us before, please enter your details in the boxes below.', 'Twoot' ),
						'next_step' => add_query_arg( array ( 'checkout_step' => 2 ) ),
						'redirect' => get_permalink(woocommerce_get_page_id('checkout'))
					));
				?>
			</div>

		</div>
		</div>

		<div class="entry-purchase-summary sidebar-right column five">
		<div class="inner">
			<?php
				woocommerce_get_template('checkout/form-purchase-summary.php');
			?>
		</div>
		</div>

	<?php endif; ?>


	<?php if ($_GET['checkout_step'] == 2) : ?>

		<form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>">

			<div class="entry-checkout column seven">
			<div class="inner">
				<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

					<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

						<?php do_action( 'woocommerce_checkout_billing' ); ?>

						<?php do_action( 'woocommerce_checkout_shipping' ); ?>

					<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

				<?php endif; ?>
			</div>
			</div>

			<div class="entry-purchase-summary sidebar-right column five">
			<div class="inner">
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>
			</div>

		</form>

	<?php endif; ?>

</div>