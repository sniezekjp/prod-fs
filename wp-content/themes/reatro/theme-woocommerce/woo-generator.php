<?php
/**
 * @package WordPress
 * @subpackage ThemeWoot
 * @author ThemeWoot Team 
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */


if ( ! class_exists( 'Twoot_Woo_Generator' ) ) {
/**
 * Woo Class
 *
 * Contains the main functions for Woocommerce
 *
 * @class Twoot_Woo_Generator
 * @version	1.0.0
 * @since 1.0.0
 * @package	ThemeWoot
 * @author ThemeWoot Team 
 */
class Twoot_Woo_Generator {


	/**
	 * 
	 *  Woo User Menu
	 */
	 function user_menu() {
		$_Twoot_Woo=new Twoot_Woo();
		$url=$_Twoot_Woo->shop_urls();

		$user_data = get_userdata(get_current_user_id());
		$avatar = get_option ( 'show_avatars' )? '<span class="avatar">'.get_avatar(get_current_user_id(), 20).'</span>':'';
		$tag = get_option('permalink_structure')==false? '&':'?';
		
		$html = '<nav id="woo-user-menu">';
		$html .= '<ul class="sf-menu clearfix">';

		if ( is_user_logged_in() ) {
			$html .= '<li class="my-account"><a href="'.$url['account_overview'].'">'.$avatar.esc_attr__('Howdy, ', 'Twoot').$user_data->display_name.'</a>';
			$html .= '<ul>';
			$html .= '<li class="account-change-pw"><a href="'.$url['account_change_pw'].'">'.esc_attr__('Change Password', 'Twoot').'</a></li>';
			$html .= '<li class="account-edit-adress"><a href="'.$url['account_edit_adress'].'">'.esc_attr__('Edit Address', 'Twoot').'</a></li>';
			$html .= '<li class="account-view-order"><a href="'.$url['account_view_order'].'">'.esc_attr__('View Order', 'Twoot').'</a></li>';
			$html .= '<li class="cart"><a href="'.$url['cart'].'">'.esc_attr__('Shopping Cart', 'Twoot').'</a></li>';
			$html .= '<li class="checkout"><a href="'.$url['checkout'].'">'.esc_attr__('Checkout', 'Twoot').'</a></li>';
			$html .= '</ul>';
			$html .= '</li>';
			$html .= '<li class="logout last"><a href="'.$url['logout'].'">'.esc_attr__('Sign Out', 'Twoot').'</a></li>';
		} else {
			if( get_option('users_can_register') && get_option('woocommerce_enable_myaccount_registration')=='yes' ) {
				$html .= '<li class="register"><a href="'.$url['register'].$tag.'user_account=register">'.esc_attr__('Create Account', 'Twoot').'</a></li>';
			}		
			$html .= '<li class="login last"><a href="'.$url['account_overview'].$tag.'user_account=login">'.esc_attr__('Sign In', 'Twoot').'</a></li>';
		}

		$html .= '</ul>';
		$html .= '</nav>';

		return $html;
	}



	/**
	 * 
	 *  Woo Mini Cart
	 */
	 function mini_cart() {
		global $woocommerce;

		$_Twoot_Woo=new Twoot_Woo();
		$url=$_Twoot_Woo->shop_urls();

		$item_counts = $woocommerce->cart->cart_contents_count;
		$item_unit = $item_counts<2? esc_attr__('item', 'Twoot'):esc_attr__('items', 'Twoot');
		$total_text = get_option('js_prices_include_tax')=='yes'? esc_attr__('Total', 'Twoot'):esc_attr__('Subtotal', 'Twoot');

		$html = '<div id="woo-mini-cart">';
		$html .= '<div class="shopping-cart">';
		$html .= '<a href="'.$url['cart'].'">'.esc_attr__('Cart:', 'Twoot');
		$html .= '<span class="cart-total"><em class="pay-counts">'.$woocommerce->cart->get_cart_total().'</em>&#8211;<em class="item-counts">'.$item_counts.'</em>'.$item_unit.'</span>';
		$html .= '</a>';
		$html .= '</div>';
		$html .= '<ul class="cart-list clearfix">';

		if (sizeof($woocommerce->cart->cart_contents)>0) {

			foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) {
				$_product = $cart_item['data'];
				if ($_product->exists() && $cart_item['quantity']>0)
				{
					$html .= '<li class="cart-item clearfix">';
					$html .= '<div class="item-img"><a href="'.get_permalink($cart_item['product_id']).'">'.$_product->get_image().'</a></div>';
					$html .= '<div class="item-info">';
					$html .= '<a href="'.get_permalink($cart_item['product_id']).'" class="title">'.apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product).'</a>';
					$html .= '<span class="quantity">' .esc_attr__('Quantity:', 'Twoot').' '.$cart_item['quantity'].'</span>';
					$html .= '<span class="price">' .woocommerce_price($_product->get_price()).'</span>';
					$html .= '<span class="remove">'.apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><i class="twoot-icon-cancel-circled-outline"></i></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_attr__('Remove this item', 'Twoot') ), $cart_item_key ).'</span>';
					$html .= '</div>';
					$html .= '</li>';
				}
			}

			$html .= '<li class="total"><strong>'.$total_text.': </strong>'.$woocommerce->cart->get_cart_total();'</li>';
			$html .= '<li class="buttons">';
			$html .= '<a href="'.$url['cart'].'" class="button button-dark button-medium">'.esc_attr__('View Cart', 'Twoot').'</a>';
			$html .= '<a href="'.$url['checkout'].'" class="button button-dark button-medium checkout">'.esc_attr__('Checkout', 'Twoot').'</a>';
			$html .= '</li>';

		} else {
			$html .= '<li class="empty">'.esc_attr__('No products in the cart.', 'Twoot').'</li>';
		}

		$html .= '</ul>';
		$html .= '</div>';

		return $html;
	}



	/**
	 * 
	 *  Woo Responsive  Mini Cart
	 */
	 function responsive_mini_cart() {
		global $woocommerce;

		$_Twoot_Woo=new Twoot_Woo();
		$url=$_Twoot_Woo->shop_urls();

		$html = '<a href="'.$url['cart'].'" class="responsive-mini-cart"><i class="twoot-icon-shop"></i><em class="item-counts">'.$woocommerce->cart->cart_contents_count.'</em></a>';

		return $html;
	}
}


/*
* Get woo generator
* 
*/
function twoot_woo_generator($function) {
	global $_Twoot_Woo_Generator;
	if($_Twoot_Woo_Generator==null){
		$_Twoot_Woo_Generator = new Twoot_Woo_Generator;
	}
	$args = array_slice( func_get_args(), 1 );
	return call_user_func_array(array( &$_Twoot_Woo_Generator, $function ), $args );
}

}
?>