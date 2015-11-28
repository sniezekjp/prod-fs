<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

wc_print_notices(); ?>

<div class="myaccount_user mt-40">
	<?php
	printf(
		__( 'Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>).', 'Twoot' ) . ' ',
		$current_user->display_name,
		wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )
	);

	printf( __( 'From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="%s">edit your password and account details</a>.', 'Twoot' ),
		wc_customer_edit_account_url()
	);
	?>
</div>

<?php do_action( 'woocommerce_before_my_account' ); ?>

<div class="mt-40">
	<?php woocommerce_get_template( 'myaccount/my-downloads.php' ); ?>
</div>

<div class="mt-40">
	<?php woocommerce_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>
</div>

<div class="mt-40">
<?php woocommerce_get_template( 'myaccount/my-address.php' ); ?>
</div>

<?php do_action( 'woocommerce_after_my_account' ); ?>