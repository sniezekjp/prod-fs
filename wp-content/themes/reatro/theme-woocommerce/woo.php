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


if ( ! class_exists( 'Twoot_Woo' ) ) {
/**
 * Woo Class
 *
 * Contains the main functions for Woocommerce
 *
 * @class Twoot_Woo
 * @version	1.0.0
 * @since 1.0.0
 * @package	ThemeWoot
 * @author ThemeWoot Team 
 */
class Twoot_Woo {


	/**
	 * 
	 *  Add theme support
	 */
	function init() {
		
		// Add woocommerce support
		add_action( 'after_setup_theme', array($this, 'support'));

		// Register my own styles, remove woocommerce stylesheet
		if( twoot_get_checked_func( 'woocommerce_version', '2.1' ) ) {
			add_filter( 'woocommerce_enqueue_styles', '__return_false' );
		}else{
			define('WOOCOMMERCE_USE_CSS', false);
		}

		// Ajax Mini Cart
		add_filter('add_to_cart_fragments', array($this, 'mini_cart_fragment'));

		// Responsive Ajax Mini Cart
		add_filter('add_to_cart_fragments', array($this, 'responsive_mini_cart_fragment'));

		// Widget Ajax Cart
		add_filter('add_to_cart_fragments', array($this, 'widget_cart_fragment'));

		// Hooks
		$this->hooks();

		// Widgets
		add_action( 'widgets_init', array( $this, 'widgets' ) );

		// Scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts'), 30 );

	}



	/**
	 * 
	 *  Add scripts
	 */
	function scripts() {

		// Remove Script
		wp_dequeue_script('prettyPhoto');
		wp_dequeue_script('prettyPhoto-init');
		wp_dequeue_script('woocommerce_prettyPhoto_css');

	}



	/**
	 * 
	 *  Add theme support
	 */
	function support() {    
		add_theme_support( 'woocommerce' );

		register_sidebar( array (
			'name' => esc_attr__('Shop', 'Twoot'),
			'id' => 'shop-widget-area',
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="title">',
			'after_title' => '</h3>'
		));
	}



	/**
	 * 
	 *  Handle cart in header fragment for ajax add to cart
	 */
	function mini_cart_fragment($fragments) {
		global $woocommerce;

		$url = $this->shop_urls();

		$item_counts = $woocommerce->cart->cart_contents_count;
		$item_unit = $item_counts<2? esc_attr__('item', 'Twoot'):esc_attr__('items', 'Twoot');
		$total_text = get_option('js_prices_include_tax')=='yes'? esc_attr__('Total', 'Twoot'):esc_attr__('Subtotal', 'Twoot');

		$fragments['#woo-mini-cart'] = '<div id="woo-mini-cart">';
		$fragments['#woo-mini-cart'] .= '<div class="shopping-cart">';
		$fragments['#woo-mini-cart'] .= '<a href="'.$url['cart'].'">'.esc_attr__('Cart:', 'Twoot');
		$fragments['#woo-mini-cart'] .= '<span class="cart-total"><em class="pay-counts">'.$woocommerce->cart->get_cart_total().'</em>&#8211;<em class="item-counts">'.$item_counts.'</em>'.$item_unit.'</span>';
		$fragments['#woo-mini-cart'] .= '</a>';
		$fragments['#woo-mini-cart'] .= '</div>';
		$fragments['#woo-mini-cart'] .= '<ul class="cart-list clearfix">';

		if (sizeof($woocommerce->cart->cart_contents)>0) {

			foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) {
				$_product = $cart_item['data'];
				if ($_product->exists() && $cart_item['quantity']>0)
				{
					$fragments['#woo-mini-cart'] .= '<li class="cart-item clearfix">';
					$fragments['#woo-mini-cart'] .= '<div class="item-img"><a href="'.get_permalink($cart_item['product_id']).'">'.$_product->get_image().'</a></div>';
					$fragments['#woo-mini-cart'] .= '<div class="item-info">';
					$fragments['#woo-mini-cart'] .= '<a href="'.get_permalink($cart_item['product_id']).'" class="title">'.apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product).'</a>';
					$fragments['#woo-mini-cart'] .= '<span class="quantity">' .esc_attr__('Quantity:', 'Twoot').' '.$cart_item['quantity'].'</span>';
					$fragments['#woo-mini-cart'] .= '<span class="price">' .woocommerce_price($_product->get_price()).'</span>';
					$fragments['#woo-mini-cart'] .= '<span class="remove">'.apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><i class="twoot-icon-cancel-circled-outline"></i></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_attr__('Remove this item', 'Twoot') ), $cart_item_key ).'</span>';
					$fragments['#woo-mini-cart'] .= '</div>';
					$fragments['#woo-mini-cart'] .= '</li>';
				}
			}

			$fragments['#woo-mini-cart'] .= '<li class="total"><strong>'.$total_text.': </strong>'.$woocommerce->cart->get_cart_total();'</li>';
			$fragments['#woo-mini-cart'] .= '<li class="buttons">';
			$fragments['#woo-mini-cart'] .= '<a href="'.$url['cart'].'" class="button button-dark button-medium">'.esc_attr__('View Cart', 'Twoot').'</a>';
			$fragments['#woo-mini-cart'] .= '<a href="'.$url['checkout'].'" class="button button-dark button-medium checkout">'.esc_attr__('Checkout', 'Twoot').'</a>';
			$fragments['#woo-mini-cart'] .= '</li>';

		}

		$fragments['#woo-mini-cart'] .= '</ul>';
		$fragments['#woo-mini-cart'] .= '</div>';

		return $fragments;
	}



	/**
	 * 
	 *  Handle responsive cart in header fragment for ajax add to cart
	 */
	 function responsive_mini_cart_fragment($fragments) {
		global $woocommerce;

		$url = $this->shop_urls();

		$fragments['a.responsive-mini-cart'] = '<a href="'.$url['cart'].'" class="responsive-mini-cart"><i class="twoot-icon-bag"></i><em class="item-counts">'.$woocommerce->cart->cart_contents_count.'</em></a>';

		return $fragments;
	 }



	 /**
	 * 
	 *  Handle cart in header fragment for ajax add to cart
	 */
	 function widget_cart_fragment($fragments) {
		global $woocommerce;

		$url = $this->shop_urls();

		$total_text = get_option('js_prices_include_tax')=='yes'? esc_attr__('Total', 'Twoot'):esc_attr__('Subtotal', 'Twoot');

		$fragments['#widget-woo-cart'] = '<ul id="widget-woo-cart" class="cart-list clearfix">';

		if (sizeof($woocommerce->cart->cart_contents)>0) {

			foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) {
				$_product = $cart_item['data'];
				if ($_product->exists() && $cart_item['quantity']>0)
				{
					$fragments['#widget-woo-cart'] .= '<li class="cart-item clearfix">';
					$fragments['#widget-woo-cart'] .= '<div class="item-img"><a href="'.get_permalink($cart_item['product_id']).'">'.$_product->get_image().'</a></div>';
					$fragments['#widget-woo-cart'] .= '<div class="item-info">';
					$fragments['#widget-woo-cart'] .= '<a href="'.get_permalink($cart_item['product_id']).'" class="title">'.apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product).'</a>';
					$fragments['#widget-woo-cart'] .= '<span class="quantity">' .esc_attr__('Quantity:', 'Twoot').' '.$cart_item['quantity'].'</span>';
					$fragments['#widget-woo-cart'] .= '<span class="price">' .woocommerce_price($_product->get_price()).'</span>';
					$fragments['#widget-woo-cart'] .= '</div>';
					$fragments['#widget-woo-cart'] .= '</li>';
				}
			}

			$fragments['#widget-woo-cart'] .= '<li class="total"><strong>'.$total_text.': </strong>'.$woocommerce->cart->get_cart_total().'</li>';
			$fragments['#widget-woo-cart'] .= '<li class="buttons">';
			$fragments['#widget-woo-cart'] .= '<a href="'.$url['cart'].'" class="button button-dark button-medium">'.esc_attr__('View Cart', 'Twoot').'</a>';
			$fragments['#widget-woo-cart'] .= '<a href="'.$url['checkout'].'" class="button button-dark button-medium checkout">'.esc_attr__('Checkout', 'Twoot').'</a>';
			$fragments['#widget-woo-cart'] .= '</li>';

		}

		$fragments['#widget-woo-cart'] .= '</ul>';

		return $fragments;
	}



	/**
	 * 
	 *   helper function that collects all the necessary urls for the shop navigation
	 */
	function shop_urls() {
		global $woocommerce;
		$tag = get_option('permalink_structure')==false? '&':'?';
		
		$url['cart']				= $woocommerce->cart->get_cart_url();
		$url['checkout']			= $woocommerce->cart->get_checkout_url();
		$url['account_overview'] 	= get_permalink(get_option('woocommerce_myaccount_page_id'));
		$url['account_edit_adress']	= $url['account_overview'].$tag.get_option('woocommerce_myaccount_edit_address_endpoint');
		$url['account_view_order']	= $url['account_overview'].$tag.get_option('woocommerce_myaccount_view_order_endpoint');
		$url['account_change_pw'] 	= $url['account_overview'].$tag.get_option('woocommerce_myaccount_edit_account_endpoint');
		$url['logout'] 				= wp_logout_url(home_url('/'));
		$url['register'] 			= $url['account_overview'];

		return $url;
	}


	/**
	 * 
	 *   The hooks
	 */
	 function hooks() {

		// Remove
		remove_action( 'wp_footer', 'woocommerce_demo_store' );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
		remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
		remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
		remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
		remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
		remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
		remove_filter( 'woocommerce_before_shop_loop', 'woocommerce_result_count',20 );
		remove_filter( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering',30 );

		// Added
		add_action( 'woocommerce_before_main_content', array($this, 'woo_before_main_content'), 10);
		add_action( 'woocommerce_before_main_content', array($this, 'woo_page_title'), 10);
		add_action( 'woocommerce_after_main_content', array($this, 'woo_after_main_content'), 10);
		add_action( 'woocommerce_before_shop_loop_item_title', array($this, 'woo_loop_product_thumbnail'), 10 );
		add_action( 'woocommerce_after_shop_loop', array($this, 'woo_pagination'), 10);
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_rating', 10 );
		add_filter( 'woocommerce_show_page_title', array($this, 'woo_show_page_title' ) );
		add_filter( 'loop_shop_columns', array($this, 'woo_loop_columns') );
		add_filter( 'loop_shop_per_page', array($this, 'woo_product_count' ) );
	 }


	/**
	 * 
	 *   Before main content
	 */
	 function woo_before_main_content() {
		if(is_page( woocommerce_get_page_id( 'shop' ) ) || is_post_type_archive( 'product' )) {
			$layout=twoot_get_frontend_func('meta', 'layout', woocommerce_get_page_id( 'shop' ));
			$widget = twoot_get_frontend_func('meta', 'sidebar', woocommerce_get_page_id( 'shop' ))==false? 'page':twoot_get_frontend_func('meta', 'sidebar', woocommerce_get_page_id( 'shop' ));
		}elseif(is_tax(array( 'product_cat', 'product_tag' ))){
			$layout=twoot_get_frontend_func('opt', 'opt', 'archive_layout');
			$widget = 'shop';
		}else{
			$layout='full';
		}
		$class=$layout!='full'? 'column eight':'twelve';

		echo '<div class="site-content container pt pb clearfix">';
		if($layout=='left') { 
			echo twoot_generator('sidebar', $widget, $layout);
		}
		echo '<article id="primary-wrapper" class="'.$class.'">';
		echo '<div class="inner">';
	 }

	 
	 /**
	 * 
	 *   After main content
	 */
	 function woo_after_main_content() {

		if(is_page( woocommerce_get_page_id( 'shop' ) ) || is_post_type_archive( 'product' )) {
			$layout=twoot_get_frontend_func('meta', 'layout', woocommerce_get_page_id( 'shop' ));
			$widget = twoot_get_frontend_func('meta', 'sidebar', woocommerce_get_page_id( 'shop' ))==false? 'page':twoot_get_frontend_func('meta', 'sidebar', woocommerce_get_page_id( 'shop' ));
		}elseif(is_tax(array( 'product_cat', 'product_tag' ))){
			$layout=twoot_get_frontend_func('opt', 'opt', 'archive_layout');
			$widget = 'shop';
		}else{
			$layout='full';
		}

		echo '</div>';
		echo '</article>';
		if($layout=='right') { 
			echo twoot_generator('sidebar', $widget, $layout);
		}
		echo '</div>';
	 }


	/**
	 * 
	 *   Disable default page title
	 */
	 function woo_show_page_title() {
		return false;
	 }


	/**
	 * 
	 *   Rebuild page title
	 */
	 function woo_page_title() {

		if( ! is_singular('product') ) {

			echo '<header class="site-page-header has-line clearfix">';
			echo '<div class="entry-page-header">';
			
			if ( is_post_type_archive( 'product' ) || is_page( woocommerce_get_page_id( 'shop' ) ) ) {

				$title = twoot_get_frontend_func('meta', 'page_title', woocommerce_get_page_id( 'shop' ));

				echo '<h1 class="entry-title">';
				if ($title) {
					echo $title;
				} else {
					woocommerce_page_title();
				}
				echo '</h1>';

			} elseif ( is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) {

				echo '<h1 class="entry-title">';
				woocommerce_page_title();
				echo '</h1>';

			}

			echo '<div class="entry-desc">';
			woocommerce_result_count();
			echo '</div>';

			echo '</div>';

			if( empty(get_post( woocommerce_get_page_id( 'shop' ) )->post_content) && ( is_post_type_archive( 'product' ) || is_page( woocommerce_get_page_id( 'shop' ) ) ) ) {

				echo '<div class="catalog-ordering">';
				woocommerce_catalog_ordering();
				echo '</div>';

			} elseif ( is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) {

				echo '<div class="catalog-ordering">';
				woocommerce_catalog_ordering();
				echo '</div>';

			}
			
			echo '</header>';

		}
	 }


	 /**
	 * 
	 *   Set the loop column
	 */
	 function woo_loop_columns() {
		if( is_page( woocommerce_get_page_id( 'shop' ) ) || is_post_type_archive( 'product' ) ) { 
			$shop_overview_column = twoot_get_frontend_func('opt', 'opt', 'shop_column'); 
		} else {  
			$shop_overview_column = twoot_get_frontend_func('opt', 'opt', 'archive_column');  
		}

		return $shop_overview_column;
	 }


	 /**
	 * 
	 *   Set the shop overview product count
	 */
	 function woo_product_count() {
		if( is_page( woocommerce_get_page_id( 'shop' ) ) || is_post_type_archive( 'product' ) ) { 
			$shop_overview_products = twoot_get_frontend_func('opt', 'opt', 'shop_counts'); 
		} else {  
			$shop_overview_products = twoot_get_frontend_func('opt', 'opt', 'archive_counts');  
		}

		return $shop_overview_products;
	 }


	/**
	 * 
	 *   Replace WooCommerce Default Pagination with Get Pagination
	 */
	 function woo_pagination() {
		echo twoot_generator('pagination');
	}


	/**
	 * 
	 *   Product thumbnail for loop
	 */
	function woo_loop_product_thumbnail() {
		if ( has_post_thumbnail() ) {
			echo '<figure class="featured-image img-preload img-hover">';
			echo '<a href="'.get_permalink().'">';
			the_post_thumbnail('shop_catalog');
			echo '<div class="overlay"></div>';
			echo '</a>';
			woocommerce_template_loop_add_to_cart();
			woocommerce_show_product_loop_sale_flash();
			echo '</figure>';
		}
	}


	/**
	 * 
	 *   The widgets
	 */
	 function widgets() {
		 include_once( TWOOT_PATH . '/theme-woocommerce/widgets/class-wc-widget-best-sellers.php' );
		 include_once( TWOOT_PATH . '/theme-woocommerce/widgets/class-wc-widget-featured-products.php' );
		 include_once( TWOOT_PATH . '/theme-woocommerce/widgets/class-wc-widget-onsale.php' );
		 include_once( TWOOT_PATH . '/theme-woocommerce/widgets/class-wc-widget-random-products.php' );
		 include_once( TWOOT_PATH . '/theme-woocommerce/widgets/class-wc-widget-recently-viewed.php' );
		 include_once( TWOOT_PATH . '/theme-woocommerce/widgets/class-wc-widget-recent-products.php' );
		 include_once( TWOOT_PATH . '/theme-woocommerce/widgets/class-wc-widget-top-rated-products.php' );
		 include_once( TWOOT_PATH . '/theme-woocommerce/widgets/class-wc-widget-cart.php' );

		 // Remove the default widgets
		 unregister_widget('WC_Widget_Best_Sellers');
		 unregister_widget('WC_Widget_Featured_Products');
		 unregister_widget('WC_Widget_Onsale');
		 unregister_widget('WC_Widget_Random_Products');
		 unregister_widget('WC_Widget_Recently_Viewed');
		 unregister_widget('WC_Widget_Recent_Products');
		 unregister_widget('WC_Widget_Top_Rated_Products');
		 unregister_widget('WC_Widget_Cart');

		 // Add the new widgets
		 register_widget('Twoot_Widget_Best_Sellers');
		 register_widget('Twoot_Widget_Featured_Products');
		 register_widget('Twoot_Widget_Onsale');
		 register_widget('Twoot_Widget_Random_Products');
		 register_widget('Twoot_Widget_Recently_Viewed');
		 register_widget('Twoot_Widget_Recent_Products');
		 register_widget('Twoot_Widget_Top_Rated_Products');
		 register_widget('Twoot_Widget_Cart');
	 }
}
}
?>