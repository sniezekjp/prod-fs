<?php
/**
 * Checkout login form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

global $woocommerce;
if ( is_user_logged_in() ) return;
?>

<div class="checkout-customer-login">
<h3><?php _e( 'Returning customer', 'Twoot' ); ?></h3>
<div class="tip"><?php echo $message; ?></div>


<form method="post" class="checkout-login">
	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<p class="form-row form-row-wide">
		<label for="username"><?php _e( 'Username or email address', 'Twoot' ); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="username" id="username" />
	</p>

	<p class="form-row form-row-wide">
		<label for="password"><?php _e( 'Password', 'Twoot' ); ?> <span class="required">*</span></label>
		<input class="input-text" type="password" name="password" id="password" />
	</p>

	<?php do_action( 'woocommerce_login_form' ); ?>

	<p class="form-row">
		<?php wp_nonce_field( 'woocommerce-login' ); ?>
		<input type="submit" class="button_checkout_login button" name="login" value="<?php _e( 'Login', 'Twoot' ); ?>" /> 
		<a class="lost_password" href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'Twoot' ); ?></a>
		<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
	</p>

	<?php do_action( 'woocommerce_login_form_end' ); ?>
</form>

</div>

<div class="checkout-customer-create">
<h3><?php _e( 'Create an Account', 'Twoot' ); ?></h3>
<div class="tip"><?php _e('If you are a new customer please proceed to the next step!', 'Twoot'); ?></div>
<a href="<?php echo $next_step; ?>" class="button button-dark button-medium"><?php _e('Continue', 'Twoot'); ?></a>
</div>