<?php
/**
 * Checkout billing information form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>


<?php if ( ! is_user_logged_in() && $checkout->enable_signup ) : ?>

<div class="create-new-account">

	<?php if ( $checkout->enable_guest_checkout ) : ?>

		<h3 class="create-account">
			<label for="createaccount" class="checkbox"><?php _e( 'Create an account?', 'Twoot' ); ?></label>
			<input class="input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true) ?> type="checkbox" name="createaccount" value="1" /> 
		</h3>

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

	<?php if ( ! empty( $checkout->checkout_fields['account'] ) ) : ?>

		<div class="create-new-account create-account">

		    <?php if ( ! $checkout->enable_guest_checkout ) : ?>
				<h3><?php _e( 'Create an account', 'Twoot' ); ?></h3>
			<?php endif; ?>

			<p><?php _e( 'Create an account by entering the information below. If you are a returning customer please login at the top of the page.', 'Twoot' ); ?></p>

			<?php foreach ($checkout->checkout_fields['account'] as $key => $field) : ?>

				<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

			<?php endforeach; ?>

		</div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>

</div>

<?php endif; ?>



<div class="billing-form">

<?php if ( WC()->cart->ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

	<h3><?php _e( 'Billing &amp; Shipping', 'Twoot' ); ?></h3>

<?php else : ?>

	<h3><?php _e( 'Billing Address', 'Twoot' ); ?></h3>

<?php endif; ?>

<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

<?php foreach ( $checkout->checkout_fields['billing'] as $key => $field ) : ?>

	<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

<?php endforeach; ?>

<?php do_action('woocommerce_after_checkout_billing_form', $checkout ); ?>

</div>