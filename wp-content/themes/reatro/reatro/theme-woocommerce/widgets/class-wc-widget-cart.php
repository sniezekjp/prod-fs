<?php
/**
 * Shopping Cart Widget
 *
 * Displays shopping cart widget
 *
 * @author 		WooThemes
 * @category 	Widgets
 * @package 	WooCommerce/Widgets
 * @version 	2.0.0
 * @extends 	WP_Widget
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Twoot_Widget_Cart extends WP_Widget {

	public $widget_cssclass;
	public $widget_description;
	public $widget_id;
	public $widget_name;

	//Constructor
	public function __construct() {

		/* Widget variable settings. */
		$this->widget_cssclass 		= 'woocommerce widget_shopping_cart';
		$this->widget_description 	= __( "Display the user's Cart in the sidebar.", 'woocommerce' );
		$this->widget_id            = 'shopping_cart';
		$this->widget_name 			= __( 'WooCommerce Cart', 'woocommerce' );

		$widget_ops = array( 
			'classname'   => $this->widget_cssclass, 
			'description' => $this->widget_description 
		);

		parent::__construct( $this->widget_id, $this->widget_name, $widget_ops );
	}



	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 * @access public
	 * @param array $args
	 * @param array $instance
	 * @return void
	 */
	function widget( $args, $instance ) {
		global $woocommerce;

		extract( $args );

		if ( is_cart() || is_checkout() ) return;

		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __( 'Cart', 'woocommerce' ) : $instance['title'], $instance, $this->id_base );
		$hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;

		if ( $hide_if_empty ) {
			echo '<div class="hide_cart_widget_if_empty">';
		}

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;

		$_Twoot_Woo=new Twoot_Woo();
		$url=$_Twoot_Woo->shop_urls();

		$total_text = get_option('js_prices_include_tax')=='yes'? esc_attr__('Total', 'woocommerce'):esc_attr__('Subtotal', 'woocommerce');

		echo '<ul id="widget-woo-cart" class="cart-list clearfix">';

		if (sizeof($woocommerce->cart->cart_contents)>0) {

			foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) {
				$_product = $cart_item['data'];
				if ($_product->exists() && $cart_item['quantity']>0)
				{
					echo '<li class="cart-item clearfix">';
					echo '<div class="item-img"><a href="'.get_permalink($cart_item['product_id']).'">'.$_product->get_image().'</a></div>';
					echo '<div class="item-info">';
					echo '<a href="'.get_permalink($cart_item['product_id']).'" class="title">'.apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product).'</a>';
					echo '<span class="quantity">' .esc_attr__('Quantity:', 'woocommerce').' '.$cart_item['quantity'].'</span>';
					echo '<span class="price">' .woocommerce_price($_product->get_price()).'</span>';
					echo '</div>';
					echo '</li>';
				}
			}

			echo '<li class="total"><strong>'.$total_text.': </strong>'.$woocommerce->cart->get_cart_total().'</li>';
			echo '<li class="buttons">';
			echo '<a href="'.$url['cart'].'" class="button button-dark button-medium">'.esc_attr__('View Cart', 'woocommerce').'</a>';
			echo '<a href="'.$url['checkout'].'" class="button button-dark button-medium checkout">'.esc_attr__('Checkout', 'woocommerce').'</a>';
			echo '</li>';

		} else {
			echo '<li class="empty">'.esc_attr__('No products in the cart.', 'woocommerce').'</li>';
		}

		echo '</ul>';

		echo $after_widget;

		if ( $hide_if_empty ) {
			echo '</div>';
		}
	}


	/**
	 * update function.
	 *
	 * @see WP_Widget->update
	 * @access public
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array
	 */
	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags( stripslashes( $new_instance['title'] ) );
		$instance['hide_if_empty'] = empty( $new_instance['hide_if_empty'] ) ? 0 : 1;
		return $instance;
	}


	/**
	 * form function.
	 *
	 * @see WP_Widget->form
	 * @access public
	 * @param array $instance
	 * @return void
	 */
	function form( $instance ) {
		$hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'woocommerce' ) ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php if (isset ( $instance['title'])) {echo esc_attr( $instance['title'] );} ?>" /></p>

		<p><input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id('hide_if_empty') ); ?>" name="<?php echo esc_attr( $this->get_field_name('hide_if_empty') ); ?>"<?php checked( $hide_if_empty ); ?> />
		<label for="<?php echo $this->get_field_id('hide_if_empty'); ?>"><?php _e( 'Hide if cart is empty', 'woocommerce' ); ?></label></p>
		<?php
	}

}